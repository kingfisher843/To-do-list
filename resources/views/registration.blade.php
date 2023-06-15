<x-layout>
    <br>
    <h4 class="col-md-4">Registration</h4>
    <table class="table table-bordered border-primary bg-light col-md-4 rounded">
        <tr>
            <td>
                
                <form method="POST" action="{{url('/register')}}" id="sign-in" name="sign-up">
                    @csrf  
                    <label for="username" class="form-label"><h6>Username:</h6></label>
                    <input type="text" name="username" class="form-control" placeholder="username">
                    <br>
                    <label for="email" class="form-label"><h6>E-mail:</h6></label>
                    <input type="email" name="email" class="form-control" placeholder="e-mail address">
                    <br>
                    <label for="password" class="form-label"><h6>Password:</h6></label>
                    <input type="password" name="password" class="form-control" placeholder="password (8-20 characters)">
                    <br>
                    <p class="text-center"><button class="btn btn-warning text-center rounded">Create an account</button></p>

                    <a href="/login">Already registered? Sign in to catch up with your progress!</a>
                </form>
            </td>
        </tr>    
    </table>
    
</x-layout>