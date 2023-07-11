<x-layout>
    <br>
        <!--REGISTRATION-->
        <div class="col-md-4">
            <h4 class="text-center">Join us now!</h4>
            <table class="table table-bordered border-primary bg-light rounded">
                <tr>
                    <td>
                        <form method="POST" action="{{url('/register')}}" id="sign-in" name="sign-up">
                            @csrf  
                            <label for="username" class="form-label"><h6>Username:</h6></label>
                            <input type="text" name="username" class="form-control" placeholder="username" value="{{ old('username') }}">
                                <br>
                            <label for="email" class="form-label"><h6>E-mail:</h6></label>
                            <input type="email" name="email" class="form-control" placeholder="e-mail address" value="{{ old('email') }}">
                                <br>
                            <label for="password" class="form-label"><h6>Password:</h6></label>
                            <input type="password" name="password" class="form-control" placeholder="password (8-20 characters)">
                                <br>
                            <p class="text-center"><button class="btn btn-warning text-center rounded">Create an account</button></p>

                            <a href="/login">Already registered? Sign in to catch up with your progress!</a>
                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </td>
                </tr>    
            </table>
        </div>
</x-layout>