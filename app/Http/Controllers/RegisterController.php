<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Task;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('registration');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:20',
            'email' => 'required|email',
            'password' => 'required|min:8|max:20',
          ]);
        $userData = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];
          $user = User::create($userData);
          auth()->login($user);
           return redirect('/tasks');
           
    }
}
