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
* Show tasks list
*/
Route::get('/', function() {
  $tasks = Task::orderBy('created_at', 'asc')->get();

  return view('tasks', ['tasks' => $tasks]);
});


/**
* Add new task
*/
use App\Http\Controllers\newtaskController;
Route::post('/newtask', [newtaskController::class, 'createTask']);

/**
* Delete task
*/
Route::delete('/delete/{task}', function (Task $task) {

});
