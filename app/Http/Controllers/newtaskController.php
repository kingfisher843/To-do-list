<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Task;


class newtaskController extends Controller
{
  
  /**
  * @param Request $request
  * @return redirect ('/') (after handling the request)
  */
  public function createTask(Request $request): RedirectResponse
  {
    
    $task = new Task;
    $task->name = $request->input('name');
    $task->description = $request->input('description');
    $task->save();

    return redirect('/');
  
   }
}
