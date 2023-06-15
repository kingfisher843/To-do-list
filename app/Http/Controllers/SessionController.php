<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Task;
use App\Models\User;

class SessionController extends Controller
{
    public function create(): View
    {
        return view('login');
    }
    public function store()
    {

    }
}
