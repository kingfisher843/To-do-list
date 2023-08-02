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
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;



/**
 * Register
 */
Route::redirect('/', '/users/create');


/**
 * Login & logout (Session)
 */
Route::get('/login', [SessionController::class, 'show']);
Route::post('/login', [SessionController::class, 'login']);
Route::get('/logout', [SessionController::class, 'destroy']);



Route::resources([
    'tasks' => TaskController::class,
    'users' => UserController::class,
]);
 
//create tokens for user
Route::get('/setup', function () {

    $credentials = [
        'email' => 'sloter.admin@gmail.com',
        'password' => 'password',
    ];
    
    if (Auth::attempt($credentials)){

        $user = new \App\Models\User();
        
        $user->username = "Admin";
        $user->email = $credentials['email'];
        $user->password = $credentials['password'];

        $user->save();

        if (Auth::attempt($credentials)){
            $user = Auth::user();

            $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
            $updateToken = $user->createToken('update-token', ['create', 'update']);
            $baseToken = $user->createToken(['base-token']);
        
            return [
                'admin' => $adminToken->plainTextToken,
                'update' => $updateToken->plainTextToken,
                'base' => $baseToken->plainTextToken,                
            ];
        }
    }
    
     
});
