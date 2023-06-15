<x-layout>
    <br>
    <table class="table table-bordered border-primary bg-light col-md-4 rounded">
        <tr>
            <td>
                <form method="POST" action="{{url('/login')}}" id="sign-in" name="sign-up">
                    @csrf  
                    <label for="username" class="form-label"><h6>Username:</h6></label>
                    <input type="text" name="username" class="form-control" placeholder="username or e-mail address">
                    <label for="password" class="form-label"><h6>Password:</h6></label>
                    <input type="password" name="password" class="form-control">
                    <br>
                    <p class="text-center"><button class="btn btn-warning text-center rounded">Create an account</button></p>

                    <a href="/register">Don't have an account already? Go on and make one!</a>
                </form>
            </td>
        </tr>    
    </table>
    
</x-layout>