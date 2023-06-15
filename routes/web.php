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
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;



/**
 * Auth
 */
Route::get('/', [UserController::class, 'create']);
Route::post('/', [UserController::class, 'save']);
/**
* Display tasks
*/

Route::get('/tasks', [TaskController::class, 'show']);

/**
* Add new task
*/

Route::get('/tasks/new', [TaskController::class, 'create']);
Route::post('/tasks/new', [TaskController::class, 'save']);

/**
 * Edit task
 */
Route::get('/edit/{task}', [TaskController::class, 'edit']);
Route::patch('/edit/{task}', [TaskController::class, 'patch']);
/**
 * Checkbox functionality
 */
Route::patch('/check/{task}', [TaskController::class, 'check']);
/**
* Delete task
*/
Route::delete('/delete/{task}', [TaskController::class, 'destroy']);
