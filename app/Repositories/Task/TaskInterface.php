<?php
namespace App\Repositories\Task;

use App\Models\Task;

interface TaskInterface {

    public function getAll();

    public function find($id);

    public function store(Task $task, $user);

    public function update($id, array $newTaskData);

    public function destroy($id);
}
