<x-layout>
    <div class="col-md-4">
        <h4 class="text-center">Sign in</h4>
        <table class="table table-bordered border-secondary bg-light rounded">
            <tr>
                <td>
                    <form method="POST" action="{{url('/login')}}" id="sign-in" name="sign-up">
                        @csrf  
                        <label for="username" class="form-label"><h6>Username:</h6></label>
                        <input type="text" name="username" class="form-control" placeholder="username or e-mail address" value="{{ old('username') }}"><br>
                        <label for="password" class="form-label"><h6>Password:</h6></label>
                        <input type="password" name="password" class="form-control" placeholder="password">
                        <br>
                        <p class="text-center"><button class="btn btn-warning text-center rounded">Log in</button></p>

                        <a href="/register">Don't have an account yet? Go on and make one!</a>
                    </form>
                </td>
            </tr>    
        </table>
    </div>
    <div class="panel">
        @include('common.errors')
      </div>
</x-layout>