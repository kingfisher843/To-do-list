



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
  @foreach ($tasks as $task)
  <div class="task">
  <h3> <input type="checkbox" id="checkbox">
    <label for="checkbox">{{ $task->name }}</h3></label>
  <h5 style="color:gray">{{ $task->description }}</h5>
  </div>
  @endforeach
</x-layout>
