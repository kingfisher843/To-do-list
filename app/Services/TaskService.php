<?php

namespace App\Services;
use App\Repositories\Task\TaskRepository;
use App\Repositories\Filter\FilterRepository;
use App\Models\Task;
use App\Models\Filter;
use App\Models\User;

class TaskService
{
  protected $taskRepository;

    public function __construct(TaskRepository $taskRepository, FilterRepository $filterRepository)
    {
      $this->taskRepository = $taskRepository;
      $this->filterRepository = $filterRepository;
    }

    public function show($user, $request = 0)
    {
      $user_tasks = $this->taskRepository->getAll()->where("user_id", $user->id);

      $filter = Filter::where("user_id", $user->id)->first();

      if($filter && $request){
      
          $this->filterRepository->update($filter, $request);

      } elseif($request) {

        $filter = new Filter;
        if($request["show"])
        {
          $filter->show = $request["show"];
        }
        if($request["order"]){
          $filter->order = $request["order"];
        }
        $this->filterRepository->store($filter, $user);
        $filter->save();
      }
        if(isset($filter)){
          //which tasks will be displayed ($filter->show)
          switch($filter->show){
            case 'active':
              $user_tasks = $user_tasks->where("completed", "0");
            break;
            case 'completed':
              $user_tasks = $user_tasks->where("completed", "1");
              break;
          }

          //in what order tasks will be displayed ($filter->order)
          switch($filter->order){
            case 'latest':
              $user_tasks = $user_tasks->sortByDesc("created_at");
              break;
            case 'alphabetically':
              $user_tasks = $user_tasks->sortBy("name");
            break;
            default:
            $user_tasks = $user_tasks->sortBy("created_at");
            break;
          }
        }  
      return $user_tasks;
    }

    public function find($id)
    {
      return $this->taskRepository->find($id);
    }
  
    public function store($taskData, $user)
    {
      $task = new Task;
      $task->name = $taskData["name"];
      $task->description = $taskData["description"];
      $this->taskRepository->store($task, $user);
    }
    
    public function update($id, array $newTaskData, $user)
    {
      $task = $this->taskRepository->find($id);
      $task = $this->taskRepository->update($task, $newTaskData);
      $task->user_id = $user->id;
      return $task;
    }

    public function check($id, User $user)
    {
      $task = Task::findOrFail($id);

      if ($task->completed){
        $task->completed = 0;
        $user->completed_tasks -= 1;
      } else {
        $task->completed = 1;
        $user->completed_tasks += 1;
      }
      
      $task->save();
      $user->save();
      
      return $task;
    }

    public function destroy($id)
    {  
      $this->taskRepository->destroy($id);
    }
  }
