<?php

namespace App\Repostories\Task;

interface TaskInterface {

    public function getAll();

    public function find($id);

    public function store(array $taskData);

    public function update($id, array $newTaskData);

    public function delete($id);
}