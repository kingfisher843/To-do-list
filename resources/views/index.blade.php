<x-layout>
    <br>
    <form method="POST" action="{{url('/')}}" id="sign-in" name="sign-up">
        @csrf  
            <label for="username" class="form-label"><h5>Username:</h5></label>
            <input type="text" name="username" id="username" class="form-control">
            <br>

            <label for="password" class="form-label"><h5>Password:</h5></label>
            <input type="password" name="password" id="password" class="form-control">
            <br>
            <button class="col-md-1 btn btn-warning text-center rounded">Log in</button>
            
      </form>


</x-layout>