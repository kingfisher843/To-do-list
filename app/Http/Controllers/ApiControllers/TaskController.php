<?php

namespace App\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function __construct(protected TaskService $taskService, protected TaskRepository $taskRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $request = request();
        $tasks = $this->taskService->show($user, $request);

        return new TaskResource($tasks);
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
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return response()->json([
            'name' => $task->name,
            'description' => $task->description
        ]);        
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
