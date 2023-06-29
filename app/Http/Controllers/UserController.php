<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserInterface as UserInterface;
class UserController extends Controller
{
    function __construct(UserInterface $user)
    {
        $this->user = $user;
    }
}
