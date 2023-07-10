<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Task;
use App\Services\TaskService;
use App\Services\UserService;

class createTask extends Command
{

    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-task as:{userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create new task for given user id';

    /**
     * Execute the console command.
     */
    public function handle(TaskService $taskService, $userId)
    {
        $this->taskService = $taskService;

        $user = User::find($userId);
        if(!$user){
            $this->error('User not found.');
        } else {
        $name = $this->ask('Name of the task');
        $description = $this->ask('Description (optional)');
        $taskData = ["name" => $name, "description" => $description];
        $this->taskService->store($taskData, $user);
        }
    }
}