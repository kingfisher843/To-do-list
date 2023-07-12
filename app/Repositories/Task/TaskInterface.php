<?php
namespace App\Repositories\Task;

use App\Models\Task;

interface TaskInterface {

    public function getAll();

    public function find($id);

    public function store(Task $task, $user);

    public function update(Task $task, $newTaskData);

    public function destroy($id);
}
