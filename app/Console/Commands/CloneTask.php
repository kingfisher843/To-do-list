<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Task;
use App\Repositories\Task\TaskRepository;

class CloneTask extends Command
{

    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:clone
    {task_id : The ID of user} {user_id? : owner of cloned task (original owner if empty)}';

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

        $taskId = $this->argument('task_id');
        $userId = $this->argument('user_id');

        $task = Task::findOrFail($taskId);

        $clone = new Task;

        $clone->name = $task->name;
        $clone->description = $task->description;
        $clone->completed = 0;

        if ($userId){
            $user = User::findOrFail($userId);
            $clone->user_id = $user->id;
        } else {
            $clone->user_id = $task->user_id;
        }
        if ($clone->save()){
            $this->info('Task cloned successfully.');
            $this->info('Id of the owner: ' . $clone->user_id);
        }

    }
}
