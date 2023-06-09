



<x-layout>
  <!--NEW TASK BUTTON-->

  <form action="/tasks/new">
    <button type="submit" >Add new Task</button>
  </form>
  <br>
  <table class="table table-sm table-bordered">
    <thead>
      <tr>
        <th>Active tasks</th>
        <th>&nbsp;</th>
      </tr>
        
    </thead> 

    <tbody>
      <!--LIST OF TASKS-->
      @foreach ($tasks as $task)
        
        <tr>
          <td rowspan="2"><input type="checkbox" id="checkbox">
          <!--TASK NAME-->  
          <td><h3>  {{ $task->name }}</h3></td>
          <!--DELETE-->
          <td><h5> 
            <form action="{{url('delete/'.$task->id)}}" id="delete-form" method="POST">
              @csrf
              @method('DELETE')
              <button form="delete-form">Delete</button>
            </form>  
          </h5></td>
        </tr>
        <tr>
          <!--EDIT-->
            <!--description-->  
          <td>
            <h5>{{ $task->description }}</h5>
          </td>
          <td>
            <form action="{{url('edit/'.$task->id)}}" method="GET">
              <button type="submit">Edit</button>
            </form>
          </td>  
        </tr>    
      @endforeach
    </tbody>
  </table>
</x-layout>
