<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Task;
use App\Services\TaskService;

class createTask extends Command
{

    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-task as:{username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create new task as specific user';

    /**
     * Execute the console command.
     */
    public function handle(TaskService $taskService)
    {
        $this->taskService = $taskService;
        
        $username = $this->argument('username');
        $user = User::where('username', $username);
        $name = $this->ask('Name of the task');
        $description = $this->ask('Description (optional)');
        $taskData = ["name" => $name, "description" => $description];
        $this->taskService->store($taskData, $user);
    }
}