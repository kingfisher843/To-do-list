<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
        
    }

    //shows profile of user
    public function show()
    {
        $user = Auth::user();
        
        return view('profile', ['user' => $user]);
        
    }
}
