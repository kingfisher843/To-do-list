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
use Illuminate\Http\RedirectResponse;
/**
* Display tasks
*/

Route::get('/{slug?}', function(string $slug ="asc")
{
  $tasks = Task::orderBy('created_at', $slug)->get();

  return view('tasks', ['tasks' => $tasks]);
});


/**
* Add new task
*/
use App\Http\Controllers\TaskController;

Route::get('/tasks/new', [TaskController::class, 'create']);
Route::post('/tasks/new', [TaskController::class, 'save']);



/**
* Delete task
*/
Route::delete('/delete/{task}', function (Task $task) {

});
