<x-layout>

    <div class="panel">
      @include('common.errors')
    </div>
      <div class="content">
    
        <!-- New task form-->
        <form onsubmit="return confirm ('Do you really want to save changes?');" method="POST" action="{{url('edit/'.$task->id)}}" id="newtask" name="newtask">
          @csrf  
          @method('PATCH')
              <label for="name">Task:</label><br>
              <input type="text" name="name" id="name" value = "{{$task->name}}" required>
              <br>
           
              <label for="description">Description (optional):</label><br>
              <textarea name="description" id="description">{{$task->description}}</textarea>
              <br>
              <button type="submit" form="newtask">Save</button>
              
        </form>
    
      </div>
    
    </x-layout>
    