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
    protected $signature = 'task:update 
    {taskId : The ID of user} 
    {title : new title} 
    {description? : description of the task} 
    {--preserve=true : whether the title and descriptions should preserve old values on empty arguments}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update given task with new data';

    protected $taskRepository;

    /**
     * Execute the console command.
     */
    public function handle(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;

        $taskId = $this->argument('taskId');
        $name = $this->argument('title');
        $description = $this->argument('description');
        $preserve = filter_var($this->option('preserve'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

            if ($task = Task::find($taskId)){

            if(!$name && $preserve == true){
                $name = $task->name;
                dd('preserved name');
            }
            if(!$description && $preserve == true){
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