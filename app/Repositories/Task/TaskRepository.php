<?php

namespace App\Repositories\Task;

use App\Repositories\Task\TaskInterface;
use App\Models\Task;


class TaskRepository implements TaskInterface
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getAll()
    {
        return $this->task
        ->get();
    }

    public function find($id)
    {
        return $this->task->find($id);
    }

    public function store(array $taskData)
    {
        $newTask = $this->task->create($taskData);
        return $newTask;
    }

    public function update($id, array $newTaskData, $user)
    {
        $task = $this->task->find($id);
        $task->name = $newTaskData["name"];
        $task->description = $newTaskData["description"];
        $task->user_id = $user->id;
        $task->save();
        return $task;
    }

    public function destroy($id)
    {
        return $this->task->find($id)->delete();
    }
}