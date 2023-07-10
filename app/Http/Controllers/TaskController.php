<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Services\TaskService;
use App\Repositories\Task\TaskRepository;

class TaskController extends Controller
{
  public function __construct(protected TaskService $taskService, protected TaskRepository $taskRepository){
  }

  public function show()
  {

    if (Auth::check()) {
      $user = Auth::user();
      $request = request();
      $tasks = $this->taskService->show($user, $request);
      
      
        
      return view('tasks', [
        'tasks' => $tasks,
        'user' => $user
        ]);
      }
  
      return view('login', [
        "message" => "Please log in first!"
      ]);
  }

  public function create(Request $request): View
  {
    if (Auth::check()) {
    return view('newtask');
    }
  }

  /**
  * @param Request $request
  * @return redirect ('/tasks') (after handling the request)
  */
  public function store(TaskRequest $request): RedirectResponse
  {
    if (Auth::check()) {
      $taskData = $request->all();
      $user = Auth::user();
      $this->taskService->store($taskData, $user);
      
      return redirect('/tasks');
    }
    return redirect('/')->with('message', 'Please log in first!'); 
  }
  
  public function edit($id): View
  {
    $task = $this->taskService->find($id);
    return view('edit', [
      'task' => $task
    ]);
  }

  public function update(Task $task, TaskRequest $request)
  {
    $user = Auth::user();
    $newTaskData = $request->all();
    $this->taskService->update($task->id, $newTaskData, $user);

    return redirect('/tasks');
  }

  public function check(Task $task, Request $request)
  {
    if ($task->completed){
      $task->completed = 0;
    } else {
      $task->completed = 1;
    }
    $task->save();
    return redirect('/tasks');
  }

  public function destroy(Task $task)
  {   
    $this->taskService->destroy($task->id);
    return redirect('/tasks')->with('success', 'Task deleted.');
  }
}
