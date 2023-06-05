<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;

class TaskController extends Controller
{
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
    $task->save();

    return redirect('/');
  
   }
}