<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Models\User;

class ShowTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:show 
    {user_id=0 : The ID of user. If no ID is provided, shows all tasks in database}';

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

        $headers = ["id", "name", "description", "status"];
        $data = [];
        

        if (!$userId){
            $tasks = Task::orderBy('created_at', 'asc')->get();
            $user = false;
        } else {
            $tasks = Task::where('user_id', $userId)->get();
            $user = User::find($userId);
        }

        if(count($tasks)){
            
            foreach ($tasks as $task){
            
               $taskData = [
                "id" => $task->id,
                "name" => $task->name,
                "description" => $task->description,
                "status" => ""
               ];

               if ($task->completed){
                $taskData ["status"] = '<fg=gray>COMPLETED</>';
               } else {
                $taskData ["status"] = '<fg=green>ACTIVE</>';
               }

               $data [] = $taskData;
            }
            
            
            if ($user){
            $this->info($user->username . "'s tasks:");
            }
            $this->table($headers, $data);
        
        } else {
            $this->error('Tasks not found');
        }
    }
}
