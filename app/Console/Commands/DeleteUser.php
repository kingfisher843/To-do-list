<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;


class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete
    {user_id : the id of user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete given user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->argument('user_id');

        if ($user = User::find($userId)){

            if ($sure = $this->confirm('Do you really want to delete user') . $user->username . '?') {
            
                $user->delete();
                $this->info('User successfully deleted.');
            
            }

        } else {
            $this->error('User doesn\'t exist.');
        }
    }
}