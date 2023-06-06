



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
  <div id="task">

    <table> 
      <tr id="name">
        <td rowspan="2" style="width:10%"><h3><input type="checkbox" id="checkbox"></h3></td>
        <td><h3><label for="checkbox">{{ $task->name }}</h3></label></td>
      </tr>
      <tr id="desc">
        
        <td><h5 style="color:gray">{{ $task->description }}</h5></td>
      </tr>
  </table>
  </div>

  @endforeach
</x-layout>
