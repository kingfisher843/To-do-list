



<x-layout>

   <div class="user-data text-center">
      <h1>{{$user->username}}</h1> <small><a href="#">Change username</a></small><br>

      Email: {{$user->email}}<br>

      <a href="#">Change password</a><br>

      Completed tasks: {{$user->completed_tasks}}<br>

   </div>
   
</x-layout>
  