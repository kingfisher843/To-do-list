<?php

namespace App\Repositories\Task;

interface TaskInterface {

    public function getAll();

    public function userTasks($user_id);

    public function find($id);

    public function store(array $taskData);

    public function update($id, array $newTaskData);

    public function delete($id);
}
