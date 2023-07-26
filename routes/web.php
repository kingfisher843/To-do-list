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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;



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



Route::resources([
    'tasks' => TaskController::class,
]);


/**
 * User profile
 */
Route::get('/profile', [UserController::class, 'show']);
Route::patch('profile/{property}', [UserController::class, 'update']);


/**
 * Test routes for production purposes
 */
use App\Http\Resources\UserResource;
 
