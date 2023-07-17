<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function show(): View
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->intended('/tasks');

        } else {

            return back()->withErrors([
                'error' => 'The email or password is incorrect, please try again'
            ]);
        }
    }
    public function destroy()
    {
        Session::flush();
        Auth::logout();
    
        return redirect('/');
    }
}
