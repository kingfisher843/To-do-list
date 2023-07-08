<?php

namespace App\Repositories\Task;

interface TaskInterface {

    public function getAll();

    public function find($id);

    public function store(array $taskData, $user);

    public function update($id, array $newTaskData);

    public function destroy($id);
}
