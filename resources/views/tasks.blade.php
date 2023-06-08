



<x-layout>
  <!--NEW TASK BUTTON-->

  <form action="/tasks/new">
    <input type="submit" value="New Task">
  </form>
  <br>

  <!--SORTING TOOL-->


  <!--LIST OF TASKS-->
  <br/><br/>
  @foreach ($tasks as $task)
    <div class="row">
      <div class="col-md 3">
        <input type="checkbox" id="checkbox">
      </div>
      <div class="col-md 6">
        <h3>{{ $task->name }}</h3>
        <hr>
      </div>
      <div class="col-md 3">
        <form action="{{url('delete/'.$task->id)}}" id="delete-form" method="POST">
          @csrf
          @method('DELETE')
          <button form="delete-form">Delete</button>
        </form>  
      </div>
    </div>
    
    
    <!--task name-->
    


    <!--description-->  
    <div id="description">
      <h5>{{ $task->description }}</h5>
    </div>

    <!--DELETE-->
 
      
    
      
    <!--EDIT-->
    <div id="edit">
      <form action="{{url('edit/'.$task->id)}}" method="GET">
        <button type="submit">Edit</button>
      </form>
    </div>
  </div>
  @endforeach

</x-layout>
