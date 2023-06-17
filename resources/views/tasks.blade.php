



<x-layout>
  <br>
  <!--NEW TASK BUTTON-->
  <form action="/tasks/new" class="text-center">
    <button type="submit" class="col-4 col-md-1 btn btn-warning text-center rounded-pill">+</button>
  </form>
  <br>

   

    <tbody>
      <!--LIST OF TASKS-->
      @foreach ($tasks as $task)
      <table class="table border-left rounded border-success bg-white">
        <tr>
          <!--CHECKBOX-->
          <div class="form-check">
            <form action="{{url('check/'.$task->id)}}" method="POST">
              @csrf
              @method('PATCH')
              <td rowspan="2" class="col-2 col-md-1 text-center align-middle">
                <button class="btn btn-primary btn-square-md btn-sq-responsive" type="submit" id="checkbox" name="checkbox">
                  {{$task->completed ?? 0}}
                </button>
              </td>
            </form>
          </div>
        
        
          <!--TASK NAME-->  
          <td class="col-xs-6 col-md-8"><h4>  {{ $task->name }}</h4></td>
          <!--DELETE-->
          <td class="text-center align-middle"><h5> 
            <form action="{{url('delete/'.$task->id)}}" id="delete-form.{{$task->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger w-100" type="submit" form="delete-form.{{$task->id}}">Delete <i class="bi bi-trash3"></i></button>
            </form>  
          </h5></td>
        </tr>
        <tr>
          <!--DESCRIPTION-->  
          <td>
            <h6 class="text-muted">{{ $task->description }}</h6>
          </td>
          <!--EDIT-->
          <td>
            <form action="{{url('edit/'.$task->id)}}" method="GET" id="edit-form-{{$task->id}}">
              <button class="btn btn-primary w-100" type="submit">Edit</button>
            </form>
          </td>  
        </tr>    
      </tbody>
    </table>
      @endforeach

</x-layout>
