<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {}

    //shows profile
    public function show($id)
    {
        $user = $this->userService->find($id);
        
        return view('user.profile', ['user' => $user]);
        
    }
}
