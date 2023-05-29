
<x-layout>

<div class="panel">
  @include('common.errors')
</div>
  <div class="content">

    <!-- New task form-->
    <form method="post" action ="/newtask" id="newtask">
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
            <button form="newtask" type="Submit"><img src="{{URL('/images/checkme.svg')}}"></img>
          </div>
        </form>
  </div>

</x-layout>
