<x-layout>
<br>
    <div class="panel">
      @include('common.errors')
    </div>
      <div class="content">
    
        <!-- New task form-->
        <form onsubmit="return confirm ('Do you really want to save changes?');" method="POST" action="{{url('edit/'.$task->id)}}" id="edit">
          @csrf  
          @method('PATCH')
              <label for="name" class="form-label">Task:</label><br>
              <input type="text" id="name" class="form-control" value = "{{$task->name}}" required>
              <br>
           
              <label for="description" class="form-label">Description (optional):</label><br>
              <textarea name="description" id="description" class="form-control">{{$task->description}}</textarea>
              <br>
              <button class="col-md-1 btn btn-primary text-center rounded">Save</button>
              
        </form>
    
      </div>
    
    </x-layout>