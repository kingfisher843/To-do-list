<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
  
  public function show()
  {
    if (Auth::check()) {
   $tasks = Task::orderBy('created_at', "asc")->get();
    return view('tasks', ['tasks' => $tasks]);
    } else {
      return redirect('/');
    }
  }

  public function create(Request $request): View
  {
    return view('newtask');
  }

  /**
  * @param Request $request
  * @return redirect ('/tasks') (after handling the request)
  */
  public function save(Request $request): RedirectResponse
  {
    $validated = $request->validate([
      'name' => 'required|max:50',
      'description' => 'max:100'
    ]);
    $user = Auth::user();
    $task = new Task;
    $task->name = $request->input('name'); 
    $task->user_id = $user->id;   
    $task->description = $request->input('description');
    $task->touch();
   

    return redirect('/tasks');

  }
  
  public function edit($id): View
  {
    return view('edit', [
      'task' => Task::findOrFail($id)
    ]);
  }

  public function patch(Task $task, Request $request)
  {
    $task->name = $request->input('name');    
    $task->description = $request->input('description');
    $task->save();
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
    $task->delete();
    return redirect('/tasks')->with('success', 'Task deleted.');
  }
}
