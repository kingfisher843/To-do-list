  <x-layout>
   <br><br><br><br>
       <div class="panel">
         @include('common.errors')
       </div>
       
          
           <h3>Hi <b>{{$user->username}}</b>! Here to change something?</h3><br/>
            
            <!-- Username -->
            <div class="row text-center">
               <div class="col-sm-6">
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
               <div class="col-sm-6 text-center">
                  <h1 class = "text-success"><b>{{$user->completed_tasks}}</b></h1>
                  Tasks completed
               </div>
            </div>
            
            <!-- E-mail -->
            <div class="row text-center">
               <div class="col-sm-6">
                  <form method="POST" action="" id="edit_email">
                     @csrf  
                     @method('PATCH')
                     <label for="email">E-mail:</label>
                     <div class="col-sm-3 input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" aria-describedby="button-addon2">
                        <button class="btn btn-dark text-center" id="button-addon2">Save</button>
                     </div>
                  </form>
               </div>
               <div class="col-sm-6 text-center">
                  <form method="GET" action="/logout">
                     <button class="btn btn-warning m-3">Log out</button>
                  </form>
               </div>
            </div>
            <!-- Password -->
            <div class="row text-center">
               <div class="col-sm-6">
                  <form method="POST" action="" id="edit_password">
                     @csrf  
                     @method('PATCH')
                     <label for="password">Password:</label>
                     <div class="col-sm-3 input-group mb-3">
                        <input type="text" name="password" id="password" class="form-control" placeholder="you can change password - just make it good!" aria-describedby="button-addon3">
                        <button class="btn btn-dark text-center" id="button-addon3">Save</button>
                     </div>
                  </form>
               </div>
               <div class="col-sm-6 text-center">
                  <form method="POST" action="">
                     <button class="btn btn-danger">Delete Account</button>
                  </form>
               </div>
            </div>

            
            <br>
            
       </x-layout>