<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;



class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registration');
    }

    /**
     * Store a newly created resource in storage. (POST '/users')
     */
    public function store(UserRequest $request)
    {
        $userData = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'completed_tasks' => 0,
        ];

        $user = User::create($userData);
        Auth::login($user);

        return redirect('/tasks')->with('welcome', 'Oh sweet! Looks like we have new user!');   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        
            return view('profile', ['user' => $user]);

            return redirect('/');
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('profile', [
            'user' => $user
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, Request $request)
    {
            
            $newUserData = $request->all();

            $this->userService->update($user, $newUserData);
            
            $user->save();
            $user = Auth::user()->fresh();

            return view('profile', ['user' => $user]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->delete($id);
        return redirect ('/');
    }
}
