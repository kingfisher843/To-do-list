<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Models\Task;
use Illuminate\Http\Request;

/**
* Show the task list
*/
Route::get('/', function() {
  $tasks = Task::orderBy('created_at', 'asc')->get();

  return view('tasks', ['tasks' => $tasks]);
});


/**
* Add new task
*/
Route::post('/new-task', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'name' => 'required|max:50',
    'description' => 'required|max:100',
  ]);
  if ($validator->fails()) {
    return redirect('/')
        ->withInput()
        ->withErrors($validator);
  }
  $task = new Task;
  $task->name = $request->name;
  $task->description = $request->description;
  $task->save();

  return redirect('/');
});

/**
* Delete task/s
*/
Route::delete('/delete/{task}', function (Task $task) {

});
