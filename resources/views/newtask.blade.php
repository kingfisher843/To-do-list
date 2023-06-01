
<x-layout>

<div class="panel">
  @include('common.errors')
</div>
  <div class="content">

    <!-- New task form-->
    <form method="POST" action="{{ url('newtask') }}" id="newtask" name="newtask">
        @csrf
        <div class="form-block">
          <label for="name">Task:</label>
          <input type="text" name="name" id="name">
          <br/>
        </div>
        <div class="form-block">
          <label for="description">Description (optional):</label>
          <input type="text" name="description" id="description">
        </div>
        <div class="form-submit">
          <button type="submit"><img src="{{URL('/images/checkme.svg')}}"></button>
        </div>
    </form>
  </div>

</x-layout>
