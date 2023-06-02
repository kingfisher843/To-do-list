
<x-layout>

<div class="panel">
  @include('common.errors')
</div>
  <div class="content">

    <!-- New task form-->
    <form method="post" action="{{ url('newtask') }}" id="newtask" name="newtask">
        @csrf
        @method('post')
        <div class="form-block">
          <label for="name">Task:</label>
          <input type="text" name="name" id="name">
          <br/>
        </div>
        <div class="form-block">
          <label for="description">Optional description:</label>
          <input type="text" name="description" id="description">
        </div>
        <div class="form-submit">
          <input type="submit" name="submit" id="submit">
        </div>
    </form>
  </div>

</x-layout>
