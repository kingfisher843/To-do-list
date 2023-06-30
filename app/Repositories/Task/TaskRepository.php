<?php

namespace App\Repositories\User;

use App\Repositories\TaskInterface as TaskInterface;
use App\Task;

class TaskRepository implements TaskInterface
{
    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getAll(): Collection
    {
        return $this->task->getAll();
    }

    public function find($id): Task
    {
        return $this->task->find($id);
    }

    public function store(array $taskData): Task
    {
        return $this->task->store($taskData);
    }

    public function update($id, array $newTaskData): Task
    {
        return $this->task->update($newTaskData);
    }

    public function delete($id)
    {
        return $this->task->delete($id);
    }
}