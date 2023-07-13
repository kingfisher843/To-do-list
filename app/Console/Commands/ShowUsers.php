<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ShowUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:show {user_id?* : id of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userIds = $this->argument('user_id');

        if(!$userIds){
            $users = User::orderBy('id', 'asc')->get();
        } else {
            $users = User::find($userIds);
        }

        $headers = ["id", "username", "email"];

        $data = [];

        foreach ($users as $user){
            
                $userData = [
                    "id" =>$user->id,
                    "username" => $user->username,
                    "email" => $user->email,
                ];
                $data [] = $userData;
        }
        $this->table($headers, $data);
    }
        
}

