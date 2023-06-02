
<x-layout>

<div class="panel">
  @include('common.errors')
</div>
  <div class="content">

    <!-- New task form-->
    <form method="POST" action="/newtask" id="newtask" name="newtask">
        @csrf
        @method('post');
          <label for="name">Task:</label>
          <input type="text" name="name" id="name">
          <br/>
       
          <label for="description">Optional description:</label>
          <input type="text" name="description" id="description">
          <br/>
          
          <input type="submit" name="submit" id="submit" value="Done!">
    </form>
  </div>

</x-layout>
