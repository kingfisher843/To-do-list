<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
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

            $user = Auth::user();

            $user->generateToken();

            $request->session()->regenerate();

        if ($prefix == 'api'){

            return response()->json([
                'data' => $user->toArray(),
            ]);
            
        }
            return redirect()->intended('/tasks');

        } else {
            return back()->withInput()->withErrors([
                'error' => 'The username or password is incorrect, please try again'
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
