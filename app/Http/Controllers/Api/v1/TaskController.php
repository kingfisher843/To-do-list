<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Filters\v1\TaskFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\TaskResource;
use App\Http\Resources\v1\TaskCollection;
use App\Repositories\Task\TaskRepository;
use App\Http\Requests\v1\StoreTaskRequest;

class TaskController extends Controller
{
    public function __construct(protected TaskService $taskService, protected TaskRepository $taskRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new TaskFilter();

        $queryResponse = $filter->transform($request); //'column' (param), 'operator', 'value'

            
        $tasks = Task::where($queryResponse)->paginate();

        return new TaskCollection($tasks->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        return new TaskResource(Task::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task->delete();
    }
}
