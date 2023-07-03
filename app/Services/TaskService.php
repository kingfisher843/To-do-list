<?php

namespace App\Services;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;

class TaskService
{
    public function __construct(protected TaskRepository $task){
  
    }
    public function show(Request $request, User $user)
    {
      $user_tasks = $this->task->belongsTo($user);

        if ($sorter_var = $request->input('sorter_var')){
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
        }
        return $user_tasks;
    }

    public function find($id)
    {
        return $this->task->find($id);
    }
  
    /**
    * @param Request $request
    * @return Task $newTask
    */
    public function create(Request $request)
    {
      $taskData = $request->all();
      return $this->task;
    }
    
    public function update($id, array $newTaskData): View
    {
      $task = $this->tasks->find($id);
      $task->name = $request->input('name'); 
      $task->user_id = $user->id;   
      $task->description = $request->input('description');
      $task->completed = "0";
      $task->save();
        return $task;
    }

    public function check($id)
    {
      $task = $this->tasks->find($id);

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
      $task = $this->tasks->find($id);
      $task->delete();
    }
  }
