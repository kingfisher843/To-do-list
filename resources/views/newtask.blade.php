
<x-layout>

<div class="panel">
  @include('common.errors')
</div>
  <div class="content">
  <br>
    <!-- New task form-->
    <form method="POST" action="{{url('/tasks')}}" id="newtask" name="newtask">
      @csrf  
          <label for="name" class="form-label"><h5>Task:</h5></label>
          <input type="text" name="name" id="name" class="form-control" placeholder="e.g. clean this mess from your desk">
          <br>
       
          <label for="description" class="form-label"><h5>Description (optional)</h5></label><br>
          <textarea rows="3" id="description" name="description" class="form-control" placeholder="place for some description or your next flash story!"></textarea>
          <br>
          <button class="col-md-1 btn btn-primary text-center rounded">Done!</button>
          
    </form>

  </div>

</x-layout>
