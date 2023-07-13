<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {username} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user with given credentials';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $username = $this->argument('username');
        $email = $this->argument('email');
        $password = $this->argument('password');

        $credentials = [$username, $email, $password];

        $validator = Validator::make([
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ], [
            'username' => 'required|min:4|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:20',
        ]);
        if ($validator->fails()) {
            $this->error('Cannot create a user. See error messages below:');
        
            foreach ($validator->errors()->all() as $error) {
                $this->line($error);
            }
        } else {
        $user = new User;
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
            if ($user->save()){
                $this->info('User created');
            }
        }
    }
}