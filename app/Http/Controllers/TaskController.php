<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Filter;
use App\Services\TaskService;

class TaskController extends Controller
{
  public function __construct(protected TaskRepository $task, TaskService $taskService){

  }
  public function show(Request $request, User $user)
  {
    if (Auth::check()) {
     $tasks = $taskService->show();
      
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
  public function store(Request $request): RedirectResponse
  {
    if (Auth::check()) {
  
    $task->store($request);
   
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
