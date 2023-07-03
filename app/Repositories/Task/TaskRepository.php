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
        return $this->task->all();
    }

    public function belongsTo($user): Collection
    {
        return $this->task->where('user_id', $user->id)->get();
    }

    public function find($id): Task
    {
        return $this->task->find($id);
    }

    public function create(array $taskData): Task
    {
        return $this->task->create($taskData);
    }

    public function update($id, array $newTaskData): Task
    {
        return $this->task->find($id)->update($newTaskData);
    }

    public function delete($id)
    {
        return $this->task->delete($id);
    }
}