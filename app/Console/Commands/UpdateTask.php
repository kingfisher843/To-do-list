<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Task;
use App\Repositories\Task\TaskRepository;

class UpdateTask extends Command
{

    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:update {taskId} {title} {description?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update given task with new data. To preserve old title, use empty string as argument';

    protected $taskRepository;

    /**
     * Execute the console command.
     */
    public function handle(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;

        $taskId = $this->argument('taskId');

        if ($task = Task::find($taskId)){

            if(!$name = $this->argument('title')){
                $name = $task->name;
            }
            if(!$description = $this->argument('description')){
                $description = $task->description;
            }

            $contents = ["name" => $name, "description" => $description];
            if ($success = $this->taskRepository->update($task, $contents)){
                $this->info('Task updated successfully.');
            } else {
                $this->error('Something went wrong!');
            }
    
        } else {
            $this->error('No such user in database.');
        }       
    }
}