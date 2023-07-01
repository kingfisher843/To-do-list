<?php

namespace App\Repostories\Task;

interface TaskInterface {

    public function show(Request $request);

    public function find($id);

    public function create(array $taskData);

    public function update($id, array $newTaskData);

    public function delete($id);
}