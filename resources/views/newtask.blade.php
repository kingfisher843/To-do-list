
<x-layout>

<div class="panel">
  @include('common.errors')
</div>
  <div class="content">

    <!-- New task form-->
    <form method="POST" action="{{url('/tasks/new')}}" id="newtask" name="newtask">
      @csrf  
          <label for="name">Task:</label>
          <input type="text" name="name" id="name">
          <br>
       
          <label for="description">Description (optional)</label>
          <textarea name="description" id="description"></textarea>
          <br>
          <button type="submit" form="newtask">Done!</button>
          
    </form>

  </div>

</x-layout>
