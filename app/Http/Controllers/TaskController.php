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
  public function __construct(protected TaskService $taskService){

  }
  public function show(Request $request, User $user)
  {
    if (Auth::check()) {
     $tasks = $this->taskService->show($request, $user);
      
      return view('tasks', [
        'tasks' => $tasks
        ]);

    }
      return view('login', [
        "message" => "Please log in first!"
      ]);
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
  
    $this->taskService->store($request);
   
    return redirect('/tasks');

  }
    return redirect('/')->with('message', 'Please log in first!');
  
}
  
  public function edit($id): View
  {
    $task = $this->taskService->find($id);
    return view('edit', [
      'task' => $task
    ]);
  }

  public function update(Task $task, Request $request)
  {
    $this->taskService->update($request);
    return redirect('/tasks');
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
    $this->taskService->delete();
    return redirect('/tasks')->with('success', 'Task deleted.');
  }
}
