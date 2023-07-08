<?php

namespace App\Services;
use App\Repositories\Task\TaskRepository;
use App\Models\Task;

class TaskService
{
  protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
      $this->taskRepository = $taskRepository;
    }

    public function show($user, $request = 0)
    {
      $user_tasks = $this->taskRepository->getAll()->where("user_id", $user->id);

      if ($request){
        if ($sorter_var = $request['sorter_var']){
          if ($sorter_var == "latest"){
            $user_tasks = $user_tasks->orderBy("created_at", "desc");
          } elseif ($sorter_var == "alphabetically"){
            $user_tasks = $user_tasks->orderBy("name", "asc");
          }
        } 

        if ($filter_var = $request['filter_var']){
          if ($filter_var == "active"){
              $user_tasks = $user_tasks->where("completed", "0");
          } elseif ($filter_var == "completed"){
              $user_tasks = $user_tasks->where("completed", "1");
          }
        }
      } 
      return $user_tasks;
    }

    public function find($id)
    {
      return $this->taskRepository->find($id);
    }
  
    public function store($taskData, $user)
    {
      $task = $this->taskRepository->store($taskData, $user);
      $task->user_id = $user->id;
      $task->completed = 0;
      $task->save();
    }
    
    public function update($id, array $newTaskData, $user)
    {
      $task = $this->taskRepository->update($id, $newTaskData, $user);
      $task->user_id = $user->id;
      return $task;
    }

    public function check($id)
    {
      $task = $this->taskRepository->find($id);

      if ($task->completed){
        $task->completed = 0;
      } else {
        $task->completed = 1;
      }
      $task->save();
      return $task;
    }

    public function destroy($id)
    {  
      $this->taskRepository->destroy($id);
    }
  }
