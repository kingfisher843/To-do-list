<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserInterface as UserInterface;
class UserController extends Controller
{
    public function __construct(protected UserRepository $users)
    {}

    //shows profile
    public function show($id){
        $user = $this->users->find($id);
        return view('user.profile', ['user' => $user]);
        
    }
}
