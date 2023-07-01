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

    public function show(): Collection
    {
        return $this->task->show();
    }

    public function completed(): Collection
    {
        return $this->task->completed();
    }

    public function incompleted(): Collection
    {
        return $this->task->incompleted();
    }

    public function latest(Collection $tasks_collected): Collection
    {
        return $this->task->latest($tasks_collected);
    }

    public function oldest(Collection $tasks_collected): Collection
    {
        return $this->task->oldest($tasks_collected);
    }

    public function alphabetically(Collection $tasks_collected): Collection
    {
        return $this->task->alphabetically($tasks_collected);
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