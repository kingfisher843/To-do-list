<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Register
 */
Route::redirect('/', '/register');

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'store']);

/**
 * Login & logout (Session)
 */
Route::get('/login', [SessionController::class, 'show']);
Route::post('/login', [SessionController::class, 'login']);
Route::get('/logout', [SessionController::class, 'destroy']);




/**
* Display tasks
*/
Route::get('/tasks', [TaskController::class, 'show']);

/**
* Add new task
*/
Route::get('/tasks/new', [TaskController::class, 'create']);
Route::post('/tasks/new', [TaskController::class, 'store']);

/**
 * Edit task
 */
Route::get('/edit/{task}', [TaskController::class, 'edit']);
Route::patch('/edit/{task}', [TaskController::class, 'update']);

/**
 * Checkbox functionality
 */
Route::patch('/check/{task}', [TaskController::class, 'check']);

/**
* Delete task
*/
Route::delete('/delete/{task}', [TaskController::class, 'destroy']);

/**
 * User profile
 */
Route::get('/profile', [UserController::class, 'show']);
Route::patch('profile/{property}', [UserController::class, 'update']);