<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class newtaskController extends Controller
{
  /**
  * @param Request $request
  * @return redirect ('/');
  */
  public function createTask(Request $request)
   {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:50',
    ]);
    if ($validator->fails()) {
      return redirect('/')
          ->withInput();
          ->withErrors($validator);
    }
    $task = new Task;
    $task->name = $request->name;
    $task->description = $request->description;
    $task->save();

    return redirect('/');
  }
}
