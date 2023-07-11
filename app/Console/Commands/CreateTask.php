<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Task;
use App\Repositories\Task\TaskRepository;

class CreateTask extends Command
{

    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:create {userId} {title} {description}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create new task for given user id';

    protected $taskRepository;

    /**
     * Execute the console command.
     */
    public function handle(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;

        $userId = $this->argument('userId');
        $user = User::findOrFail($userId);

        if(!$user){
            $this->error('User not found.');

        } else {

            $name = $this->argument('title');
            $description = $this->argument('description');

            $task = new Task;
            $task->name = $name;
            $task->description = $description;
            $success = $this->taskRepository->store($task, $user);
        }

        if ($success){

            $this->info('The task was created successfully.');
        }
    }
}