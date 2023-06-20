



<x-layout>
  <br>
  <!--NEW TASK BUTTON-->
  <form action="/tasks/new" class="text-center">
    <button type="submit" class="col-2 col-md-1 btn btn-warning text-center rounded-pill">+</button>
  </form>
  <br>
   

    <tbody>
      <!--LIST OF TASKS-->
      @foreach ($tasks as $task)
      
      
      @if ($task->completed == "1")
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

      <table class="table border-left rounded bg-white">
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
          <td class="col-xs-6 col-md-8"><h4 class="{{ $checkboxText ?? 'text-dark' }}"> {{ $task->name }}</h4></td>
          <!--EDIT-->
          <td>
            <form action="{{url('edit/'.$task->id)}}" method="GET" id="edit-form-{{$task->id}}">
              <button class="btn btn-dark w-100" type="submit"><i class="bi bi-pencil-square"></i></button>
            </form>
          </td>  
          
        </tr>
        <tr>
          <!--DESCRIPTION-->  
          <td>
            <h6 class="text-muted">{{ $task->description }}</h6>
          </td>
          <!--DELETE-->
          <td class="text-center align-middle"><h5> 
            <form action="{{url('delete/'.$task->id)}}" id="delete-form.{{$task->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger w-100" type="submit" form="delete-form.{{$task->id}}"><i class="bi bi-trash3"></i></button>
            </form>  
          </h5></td>
        </tr>    
      </tbody>
    </table>
      @endforeach
</x-layout>
