
<x-layout>

<div class="panel">
  @include('common.errors')
</div>
  <div class="content">

    <!-- New task form-->
    <form action = "{{ url('/new-task') }}" method="POST" id-="new-task-form">
      {{ crsf_field() }}
      <div class="form-block">
        <label for="new-task">Task:</label>
        <input type="text" name="name" id="new-task">
        <br/>
      </div>
      <div class="form-block">
        <label for="description">Description (optional):</label>
        <input type="text" name="description" id="description">
      </div>
      <div class="form-submit">
        <button form="new-task-form" type="Submit"><img src="{{URL('/images/checkme.svg')}}"></img>
    </form>


</x-layout>
