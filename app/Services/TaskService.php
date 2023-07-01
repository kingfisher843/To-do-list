<?php

namespace App\Services;


class TaskService
{
    public function __construct(protected TaskRepository $tasks){
  
    }
    public function show(Request $request, User $user)
    {
        $tasks = Task::where("user_id", $user->id);
  
        if ($sorter_var = $request->input('sorter_var')){
          if ($sorter_var == "latest"){
            $tasks = $tasks->orderBy("created_at", "desc");
          } elseif ($sorter_var == "alphabetically"){
            $tasks = $tasks->orderBy("name", "asc");
        }
        } 
        if ($filter_var = $request->input('filter_var')){
          if ($filter_var == "active"){
            $tasks = $tasks->where("completed", "0");
          } elseif ($filter_var == "completed"){
            $tasks = $tasks->where("completed", "1");
          }
        }
        $tasks = $tasks->get();
        
        return $tasks;
    }

    public function find($id)
    {
        $task = Task::findOrFail($id);

        return $task;
    }
  
    /**
    * @param Request $request
    * @return redirect ('/tasks') (after handling the request)
    */
    public function create(Request $request, User $user): RedirectResponse
    {
      if (Auth::check()) {
      $validated = $request->validate([
        'name' => 'required|max:30',
        'description' => 'nullable|max:200',
        'completed' => 'numeric|min:0|max:1|nullable'
      ]);

      $task = new Task;
      $task->name = $request->input('name'); 
      $task->user_id = $user->id;   
      $task->description = $request->input('description');
      $task->completed = "0";
      $task->save();
     
  
      return redirect('/tasks');
  
    } else {
      return redirect('/')->with('message', 'Please log in first!');
    }
  }
    
    public function update($id, array $newTaskData): View
    {
        $task = Task::findOrFail($id);
        $task->update($newTaskData);
        return $task;
    }

    public function check(Task $task)
    {
      if ($task->completed){
        $task->completed = 0;
      } else {
        $task->completed = 1;
      }
      $task->save();
      return $task;
    }
    public function destroy(Task $task)
    {   
      $task->delete();
    }
  }
