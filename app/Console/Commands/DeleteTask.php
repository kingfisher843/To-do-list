<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;


class DeleteTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "task:delete 
    {task_id* : id or array of id's of tasks to delete}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete task by id';

    /**
     * Execute the console command.
     */
    public function handle()
    {   
        $taskIds = $this->argument("task_id");
       // dd($taskIds);
        foreach ($taskIds as $key => $id){
            $id = intval($id);
           // dd($id);
            if ($task = Task::find($id)){
                $task->delete();
                $this->info('Task '. $id .' was successfully deleted.');
            } else {
                $this->error('There is no task with id = '. $id);
            }
        } 
    }
}
