<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;

class TaskController extends Controller
{
  
  public function show(): View
  {
   $tasks = Task::orderBy('created_at', "asc")->get();
    return view('tasks', ['tasks' => $tasks]);
  }

  public function create(Request $request): View
  {
    return view('newtask');
  }

  /**
  * @param Request $request
  * @return redirect ('/') (after handling the request)
  */
  public function save(Request $request): RedirectResponse
  {
    
    $task = new Task;
    $task->name = $request->input('name');    
    $task->description = $request->input('description');
    $task->touch();
   

    return redirect('/');

  }
  
  public function edit($id): View
  {
    return view('edit', [
      'task' => Task::findOrFail($id)
    ]);
  }

  public function patch($id, Request $request)
  {
    $task = Task::findOrFail($id);
    $task->name = $request->input('name');    
    $task->description = $request->input('description');
    $task->save();
    return redirect('/');
  }

  public function destroy(Task $task)
  {   
    $task->delete();
    return redirect('/')->with('success', 'Task deleted.');
  }
}
