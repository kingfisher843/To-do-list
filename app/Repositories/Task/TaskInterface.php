<?php

namespace App\Repostories\Task;

interface TaskInterface {

    public function getAll();

    public function find($id);

    public function delete($id);

    public function create(array $taskData);

    public function update($id, array $newTaskData);
}