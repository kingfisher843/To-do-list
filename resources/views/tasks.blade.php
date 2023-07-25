<x-layout>

  <!--NEW TASK BUTTON-->
  <form action="/tasks/new" class="text-center">
    <button type="submit" class="hovercol-4 col-sm-3 col-md-2 col-lg-2 col-xl-1 btn btn-success text-center rounded-pill">New task</button>
  </form>
  <br>
  @if($hasTasks)
  <div class="row mt-1">
    <div class="col-md-3 text-center">
    <!--FILTER TOOL-->
      Show tasks:<br>
      <form action="/tasks" method="GET">
        <div class="btn-group" role="group">
          <button type="submit" class="btn btn-secondary" name="show" value="all">All</button>
          <button type="sumbit" class="btn btn-secondary" name="show" value="active">Active</button>
          <button type="submit" class="btn btn-secondary" name="show" value="completed">Completed</button>
        </div>
      </form>  
    </div>
    <div class="col-md-3 text-center">
      Sorted by:<br>
      <form action="/tasks" method="GET">
      <div class="btn-group" role="group">
        <button type="submit" class="btn btn-secondary" name="order" value="latest">Latest</button>
        <button type="submit" class="btn btn-secondary" name="order" value="oldest">Oldest</button>
        <button type="submit" class="btn btn-secondary" name="order" value="alphabetically">Alphabetically</button>
      </div>
      </form>
    </div>
  </div>
    <br>
  <div class="overflow-auto">
    <!--LIST OF TASKS-->
    @foreach ($tasks as $task)
      
      
      @if($task->completed == "1")
        @php
          $checkboxClass = "bi-check-square-fill";
          $checkboxBg = "bg-secondary";
          $checkboxText = "text-muted";
        @endphp
      @else 
        @php
          $checkboxClass = "bi-square";
          $checkboxBg = "bg-primary";
          $checkboxText = "text-dark";
        @endphp
      @endif
      <!--TASK-->
      <table class="table rounded bg-white border">
        <tr>
          <!--CHECKBOX-->
          <div class="form-check">
            <form action="{{url('check/'.$task->id)}}" method="POST">
              @csrf
              @method('PATCH')
              <td rowspan="2" class="col-2 col-md-1 text-center align-middle {{ $checkboxBg ?? 'bg-primary' }}">
               
                <button class="btn check-me btn-square-md btn-sq-responsive" type="submit" id="checkbox" name="checkbox">
                  <h2><i class="{{ $checkboxClass ?? 'bi-square' }}"></i></h2>
                </button>
              </td>
            </form>
          </div>
        
        
          <!--TASK NAME-->  
          <td class="col-8 col-md-9"><h4 class="{{ $checkboxText ?? 'text-dark' }}"> {{ $task->name }}</h4></td>
          <!--EDIT-->
          <td rowspan="2" class="col-1 text-center align-middle">
            <form action="{{url('edit/'.$task->id)}}" method="GET" id="edit-form-{{$task->id}}">
              <button class="btn btn-dark w-100 d-inline" type="submit"><i class="bi bi-pencil-square"></i></button>
            </form>  
          </td>
          <!--DELETE-->
          <td rowspan="2" class="col-1 text-center align-middle">
            <form class="d-inline" action="{{url('delete/'.$task->id)}}" id="delete-form.{{$task->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger w-100 d-inline" type="submit" form="delete-form.{{$task->id}}"><i class="bi bi-trash3"></i></button>
            </form>
          </td>
        </td>
        </tr>
        <tr>
          <!--DESCRIPTION-->  
          <td>
            <h6 class="text-muted">{{ $task->description }}</h6>
          </td>  
        </tr>    
      </table>
    @endforeach

  </div>
  @else
    <div class="p-3 text-center text-light bg-info border border-light rounded">
      It seems pretty empty! Maybe you should create new task?
      You can do that very simply by clicking this green button above!
    </div>
  @endif
</x-layout>
