<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Task\TaskRepository;


class TaskController extends Controller
{
    public function __construct(protected TaskService $taskService, protected TaskRepository $taskRepository)
    {
        $this->middleware('auth');  
    }
    /**
     * Display a listing of the resource (GET '/tasks')
     */
    public function index()
    {
        $user = Auth::user();

        $request = request();
        $tasks = $this->taskService->show($user, $request);
        $hasTasks = Task::where('user_id', $user->id);

        return view('tasks', [
            'tasks' => $tasks,
            'user' => $user,                
            'hasTasks' => $hasTasks,
        ]);
    }

    /**
     * Show the form for creating a new resource. (GET '/tasks/create')
     */
    public function create(Request $request): View
    {
        return view('newtask');
    }

    /**
     * Store a newly created resource in storage. (POST '/tasks')
     */
    public function store(TaskRequest $request): RedirectResponse
    {
 
        $taskData = $request->all();
        $user = Auth::user();

        $task = $this->taskService->store($taskData, $user);
            
        return redirect('/tasks');
   
    }

    /**
     * Display the specified resource. (GET '/tasks/{task})
     */
    public function show(string $id)
    {
        return redirect('tasks');
    }

    /**
     * Show the form for editing the specified resource. (GET 'tasks/{task}/edit')
     */
    public function edit(string $id): View
    {
        $task = $this->taskService->find($id);
        return view('edit', [
        'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage. (PUT/PATCH '/tasks/{task}')
     */
    public function update(Task $task, TaskRequest $request)
    {
        $user = Auth::user();
        $newTaskData = $request->all();

        if(isset($newTaskData["checkbox"])){
            $this->taskService->check($task->id, $user);
        } else {
            $this->taskService->update($task->id, $newTaskData, $user);
        }

        return redirect('/tasks');
    }
  

    /**
     * Remove the specified resource from storage. (DELETE '/tasks/task')
     */
    public function destroy(Task $task)
    {   
        $this->taskService->destroy($task->id);

        return redirect('/tasks')->with('success', 'Task deleted.');
    }
}
