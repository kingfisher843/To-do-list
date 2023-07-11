<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class ShowTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:show {user_id=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'shows tasks of given user or all tasks if no user id is provided';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->argument("user_id");

        if (!$userId){
            $tasks = Task::orderBy('created_at', 'asc')->get();
        } else {
            $tasks = Task::where('user_id', $userId)->get();
        }
        if(count($tasks)){

            foreach ($tasks as $task){
                $this->line($task->name . "(id=" . $task->id . ")");
                $this->line('<fg=gray>'.$task->description.'</>');
            }
        
        } else {
            $this->error('Tasks not found');
        }
    }
}
