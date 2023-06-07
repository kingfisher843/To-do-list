



<x-layout>
  <!--NEW TASK BUTTON-->
  <form action="/tasks/new">
    <input type="submit" value="New Task">
  </form>
  <br>
  <!--FILTER TOOL-->
  Sort by: 
  <select name="filter">
    <option value="asc"> oldest </option>
    <option value="desc"> latest </option>
  </select>
  
  <!--LIST OF TASKS-->
  <br/><br/>
  @foreach ($tasks as $task)
    {{$task->id}}
  <div id="task-table">
    <!--EACH TASK IS A TABLE-->
    <table> 
      <tr>
        <td id="checkbox-place" rowspan="2"><h3><input type="checkbox" id="checkbox"></h3></td>
        <td><span id="task-name"><h3><label for="checkbox">{{ $task->name }}</h3></label></span></td>
        <td>

          <form action="{{url('delete/'.$task->id)}}" id="delete-form" method="POST">
            @csrf
            @method('DELETE')
            <button form="delete-form">Delete</button>
          </form>

      </tr>

      <tr id="desc">
        <td><h5 style="color:gray">{{ $task->description }}</h5></td>
        <td><!--EDIT TASK-->
          <button>Edit</button></td>
      </tr>

  </table>
  </div>

  @endforeach
</x-layout>
