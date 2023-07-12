<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class CompleteTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:complete 
    {taskId : The ID of task} 
    {completed=1 : Binary indicating whether task should be completed (1) or not (0)}';

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
        $taskId = $this->argument('taskId');
        $completed = $this->argument('completed');

        if ($task = Task::find($taskId)){

            if($completed == 0 || $completed == 1){
                $task->completed = $completed;
                $labels = ["active (incomplete)", "completed"];
                $this->info('Task is now labeled as ' . $labels[$completed]);

                $task->save();
            } else {
                $this->error('Argument \'completed\' can be either 0 or 1.');
            }
            
            
            

        } else {
            $this->error('Task not found.');
        }
    }
}
