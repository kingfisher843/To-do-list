<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
        
    }

    //shows profile of user
    public function show()
    {
        if(Auth::check()){
        $user = Auth::user();
        
        return view('profile', ['user' => $user]);
        } else {
            return redirect('/');
        }
    }

    public function update($property, Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            
            Artisan::call('user:update', [
                'user_id' => $user->id,
                'property' => $property,
                'value' => $request->input('value'),
            ]);
            
        $user = Auth::user()->fresh();

            return view('profile', ['user' => $user]);
        } else {
          return redirect('/');
        }
    }
}
