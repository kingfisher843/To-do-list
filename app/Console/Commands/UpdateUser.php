<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update 
    {user_id : The ID of user} 
    {property : property to be updated} 
    {value : new value of property}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change username or password of user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->argument('user_id');
        $property = $this->argument('property');
        $value = $this->argument('value');

        if ($user = User::find($userId)){
            
        

        switch($property){
            case 'username':
                $validator = Validator::make([
                    'username' => $value,
                ], [
                    'username' => 'required|min:4|max:20|unique:users'
                ]);
                $user->username = $value;
                $user->save();
                break;
            case 'password':
                $validator = Validator::make([
                    'password' => $value,
                ], [
                    'password' => 'required|min:8|max:20'
                ]);
                $user->password = $value;
                $user->save();
                break;
            default:
            $this->error('Invalid property ' . $property . '. "username" or "password" expected.');
        }
        
            if ($validator->fails()) {
                $this->error('Cannot update the user. See error messages below:');
            
                foreach ($validator->errors()->all() as $error) {
                    $this->line($error);
                }
            }        
        }
    }
}