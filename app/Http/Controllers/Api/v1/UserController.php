<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\v1\UserResource;
use App\Http\Resources\v1\UserCollection;
use App\Filters\v1\UserFilter;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new UserFilter();
        $queryResponse = $filter->transform($request); //'column' (param), 'operator', 'value'
            
        $includeTasks = $request->query('includeTasks');

        $users = User::where($queryResponse);

        if($includeTasks){
            $users = $users->with('tasks');
        }

        

        return new UserCollection($users->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}