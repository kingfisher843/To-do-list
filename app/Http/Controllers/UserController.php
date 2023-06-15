<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Task;
use App\Models\User;

class UserController extends Controller
{
    public function create(): View
    {
        return view('registration');
    }

    public function login(Request $request)
    {
        $user = User::findOrFail('username');
        if (!isset($user)){
            return redirect('/');
        }
        $password = password_hash($request->password, PASSWORD_DEFAULT);
        if ($request->password === $user->password){
            $_SESSION["log-in"] = true;
            return redirect('/tasks');
        }
    }
}
