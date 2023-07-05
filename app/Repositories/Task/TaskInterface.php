<?php

namespace App\Repositories\Task;

interface TaskInterface {

    public function getAll();

    public function find($id);

    public function store(array $taskData);

    public function update($id, array $newTaskData, $user);

    public function destroy($id);
}
