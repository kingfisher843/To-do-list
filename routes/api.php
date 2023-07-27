<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\ApiControllers\TaskController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Resources\TaskResource;
use App\Http\Resources\UserResource;
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
Route::prefix('api')->group(function () {
    Route::apiResources([
        'tasks' => 'TaskController',
        'users' => 'UserController'
    ]);
    
    /**
     * Login & logout (Session)
     */
    Route::get('/login', [SessionController::class, 'show']);
    Route::post('/login', [SessionController::class, 'login']);
    Route::get('/logout', [SessionController::class, 'destroy']);
    
});
