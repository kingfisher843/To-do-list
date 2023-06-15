<x-layout>
    <br>
    <table class="table table-bordered border-primary bg-light col-md-4 rounded">
        <tr>
            <td>
                <form method="POST" action="{{url('/')}}" id="sign-in" name="sign-up">
                    @csrf  
                    <label for="username" class="form-label"><h5>Username:</h5></label>
                    <input type="text" name="username" class="form-control">
                    <br>

                    <label for="password" class="form-label"><h5>Password:</h5></label>
                    <input type="password" name="password" class="form-control">
                    <br>
                    <label for="password2" class="form-label"><h5>Repeat password:</h5></label>
                    <input type="password" name="password2" class="form-control">
                    <br>

                    <p class="text-center"><button class="btn btn-warning text-center rounded">Create an account</button></p>
                </form>
            </td>
        </tr>    
    </table>
    
</x-layout>