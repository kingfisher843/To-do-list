<?php

namespace App\Repositories\User;

use App\Repositories\TaskInterface as TaskInterface;
use App\Task;

class TaskRepository implements TaskInterface
{
    public $task;

    public function __construct(Task $task){
        $this->task = $task;
    }
    public function getAll()
    {
        return $this->task->getAll();
    }
    public function find($id)
    {
        return $this->user->findTask($id);
    }
    public function delete($id)
    {
        return $this->user->deleteTask($id);
    }
    public function create(array $taskData){
        
    }

    public function update($id, array $newTaskData)
    {

    }

}