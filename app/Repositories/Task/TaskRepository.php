<?php

namespace App\Repositories\Task;

use App\Repositories\Task\TaskInterface;


class TaskRepository implements TaskInterface
{
    public $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function getAll()
    {
        return $this->task->all();
    }

    public function userTasks($user_id)
    {
        return $this->task->where('user_id', $user_id);
    }

    public function find($id)
    {
        return $this->task->find($id);
    }

    public function store(array $taskData)
    {
        $this->task->create($taskData);
        //$this->task->completed = 0;
        return $this->task;
    }

    public function update($id, array $newTaskData)
    {
        return $this->task->find($id)->update($newTaskData);
    }

    public function delete($id)
    {
        return $this->task->delete($id);
    }
}