  <x-layout>
   <br>
       <div class="panel">
         @include('common.errors')
       </div>
       
          
           <h3>Hi <b>{{$user->username}}</b>! Here to change something?</h3><br/>
            
            <!-- Username -->
            <div class="row text-center col-sm-6">
                  <form method="POST" action="" id="edit_username">
                     @csrf  
                     @method('PATCH')
                     <label for="username">Username:</label>
                     <div class="col-sm-3 input-group mb-3">
                        <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}" aria-describedby="button-addon1">
                        <button class="btn btn-dark text-center" id="button-addon1">Save</button>
                     </div>
                  </form>
            </div>
            <!-- E-mail -->
            <div class="row text-center col-sm-6">
               <div class="col-sm-3 text-secondary text-center">
                  
               </div> 
                  <form method="POST" action="" id="edit_email">
                     @csrf  
                     @method('PATCH')
                     <label for="username">E-mail:</label>
                     <div class="col-sm-3 input-group mb-3">
                        <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}" aria-describedby="button-addon2">
                        <button class="btn btn-dark text-center" id="button-addon2">Save</button>
                     </div>
                  </form>
            </div>
            <!-- Password -->
            <div class="row text-center col-sm-6">
               <div class="col-sm-3 text-secondary text-center">
                  
               </div> 
                  <form method="POST" action="" id="edit_password">
                     @csrf  
                     @method('PATCH')
                     <label for="username">Password:</label>
                     <div class="col-sm-3 input-group mb-3">
                        <input type="text" name="email" id="email" class="form-control" aria-describedby="button-addon3" placeholder="change your password - just make it complicated!">
                        <button class="btn btn-dark text-center" id="button-addon3">Save</button>
                     </div>
                  </form>
            </div>

            <form method="GET" action="/logout">
               <button class="btn btn-warning">Log out</button>
            </form>
            <br>
            <form method="POST" action="">
               <button class="btn btn-danger">Delete Account</button>
            </form>
           
         Completed tasks: {{$user->completed_tasks}}<br>
       </x-layout>