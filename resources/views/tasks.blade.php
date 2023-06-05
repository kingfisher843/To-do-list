



<x-layout>
  <form action="{{url("/tasks/new")}}">
    <input type="submit" value="New Task">
  </form>

  <!--LIST OF TASKS-->
  @foreach ($tasks as $task)
  <h2>{{ $task->name }}</h2>
  <h5>{{ $task->description }}</h5>
  @endforeach
</x-layout>
