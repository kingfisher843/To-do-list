



<x-layout>
  <!--NEW TASK BUTTON-->

  <form action="/tasks/new">
    <input type="submit" value="New Task">
  </form>
  <br>

  <!--FILTER TOOL-->

  <label for="filter-tool">Sort by:</label>

  <form id="filter-tool" action="/" method="POST">
  <select name="filter">
    <option value="old"> oldest </option>
    <option value="new"> latest </option>
    <option value="update">recently updated</option> 
  </select>
  </form>

  <!--LIST OF TASKS-->

  <br/><br/>
  @foreach ($tasks as $task)
    {{$task->updated_at}}
  <div id="task-table">
    <!--EACH TASK IS A TABLE-->
    <table> 
      <tr>
        <td id="checkbox-place" rowspan="2"><h3><input type="checkbox" id="checkbox"></h3></td>
        <td>
          <span id="task-name"><h3><label for="checkbox">{{ $task->name }}</h3></label></span>
          <hr>
        </td>
        <td>
          <!--DELETE-->
          <form action="{{url('delete/'.$task->id)}}" id="delete-form" method="POST">
            @csrf
            @method('DELETE')
            <button form="delete-form">Delete</button>
          </form>

      </tr>

      <tr id="desc">
        <td><h5 style="color:gray">{{ $task->description }}</h5></td>
        <td>
          <form action="{{url('edit/'.$task->id)}}" method="GET">
          <button type="submit">Edit</button></td>
          </form>
      </tr>

  </table>
  </div>

  @endforeach

</x-layout>
