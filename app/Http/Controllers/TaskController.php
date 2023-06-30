<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Filter;

class TaskController extends Controller
{
  public function __construct(protected TaskRepository $tasks){

  }
  public function show(Request $request)
  {
    if (Auth::check()) {
      $user = Auth::user();
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
      
      return view('tasks', [
        'tasks' => $tasks
        ]);
    } else {
      return view('login', [
        "message" => "Please log in first!"
      ]);
    }
  }

  public function create(Request $request): View
  {
    if (Auth::check()) {
    return view('newtask');
    }
  }

  /**
  * @param Request $request
  * @return redirect ('/tasks') (after handling the request)
  */
  public function save(Request $request): RedirectResponse
  {
    if (Auth::check()) {
    $validated = $request->validate([
      'name' => 'required|max:30',
      'description' => 'nullable|max:200',
      'completed' => 'numeric|min:0|max:1|nullable'
    ]);
    $user = Auth::user();
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
  
  public function edit($id): View
  {
    return view('edit', [
      'task' => Task::findOrFail($id)
    ]);
  }

  public function patch(Task $task, Request $request)
  {
    if (Auth::check()) {
    $validated = $request->validate([
      'name' => 'required|max:30',
      'description' => 'max:200',
      'completed' => 'numeric|min:0|max:1|nullable'
    ]);
    $task->name = $request->input('name');    
    $task->description = $request->input('description');
    $task->save();
    return redirect('/tasks');
  } else {

  }
  }
  public function check(Task $task, Request $request)
  {
    if ($task->completed){
      $task->completed = 0;
    } else {
      $task->completed = 1;
    }
    $task->save();
    return redirect('/tasks');
  }
  public function destroy(Task $task)
  {   
    $task->delete();
    return redirect('/tasks')->with('success', 'Task deleted.');
  }
}
