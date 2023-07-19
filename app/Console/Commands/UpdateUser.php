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
    protected $description = 'Change username, email, or password of user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $userId = $this->argument('user_id');
            $property = $this->argument('property');
            $value = $this->argument('value');

            if ($user = User::find($userId)){
                
            

            switch($property)
            {
                case 'username':
                    $validator = Validator::make([
                        'username' => $value,
                    ], [
                        'username' => 'required|min:4|max:20|unique:users'
                    ]);

                    if($validator->fails()){
                        throw new \Exception('Invalid username');
                    } else {
                        $user->username = $value;
                        $user->save();
                    }
                    break;

                case 'email':
                    $validator = Validator::make([
                        'email' => $value,
                    ], [
                        'email' => 'required|email|unique:users'
                    ]);

                    if($validator->fails()){
                        throw new \Exception('Invalid e-mail');
                    } else {
                        $user->email = $value;
                        $user->save();
                    }
                    break;   

                case 'password':
                    $validator = Validator::make([
                        'password' => $value,
                    ], [
                        'password' => 'required|min:8|max:20'
                    ]);
                    
                    if($validator->fails()){
                        throw new \Exception('Invalid password');
                    } else {
                        $user->password = $value;
                        $user->save();
                    }
                    break;
                    
                default:
                throw new \Exception('Invalid property ' . $property . '. "username", "email" or "password" expected.');
                return;
            }

            } else {
                throw new \Exception('User not found.');
            }
        } catch(\Exception $e) {
            $this->error($e->getMessage());
            return;
        }
        $this->info('Success!');
    }
}