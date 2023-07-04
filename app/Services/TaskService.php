<?php

namespace App\Services;
use App\Repositories\Task\TaskRepository;


class TaskService
{
    public function __construct(protected TaskRepository $taskRepository){
  
    }
    public function show($request = "0", $user)
    {
      $user_tasks = $this->taskRepository->userTasks($user->id);

      /*  if ($sorter_var = $request->input('sorter_var')){
          if ($sorter_var == "latest"){
            $user_tasks = $user_tasks->orderBy("created_at", "desc");
          } elseif ($sorter_var == "alphabetically"){
            $user_tasks = $user_tasks->orderBy("name", "asc");
        }
        } 
        if ($filter_var = $request->input('filter_var')){
          if ($filter_var == "active"){
            $user_tasks = $user_tasks->where("completed", "0");
          } elseif ($filter_var == "completed"){
            $user_tasks = $user_tasks->where("completed", "1");
          }
        }*/
        return $user_tasks;
    }

    public function find($id)
    {
        return $this->taskRepository->find($id);
    }
  
    /**
    * @param Request $request
    * @return Task $newTask
    */
    public function create(Request $request)
    {
      return $this->taskRepository->create($taskData);
    }
    
    public function update($id, array $newTaskData)
    {
      $task = $this->taskRepository->update($id);
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
      $task->delete();
    }
  }
