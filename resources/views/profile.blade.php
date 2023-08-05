  <x-layout>

      <div class="panel">
          @include('common.errors')
      </div>


      <h3>Hi <b>{{ $user->username }}</b>! Here to change something?</h3><br />


      <div class="row">

          <!-- Username -->
          <div class="col-sm-5">
              <form method="POST" action="{{ url('users/' . $user->id) }}" id="update_username"
                  onsubmit="confirm ('Are you sure you want to change your username?');">
                  @csrf
                  @method('put')
                  <label class="font-italic" for="username">Username:</label>

                  <div class="col-sm-3 input-group mb-3">
                      <input type="text" name="username" id="username" class="form-control"
                          value="{{ $user->username }}" aria-describedby="button-addon1">
                      <button type="submit" class="btn btn-dark text-center" id="button-addon1">Save</button>
                  </div>
              </form>
              @if (isset($username_success))
                      <div class="alert alert-success">
                          {{ $username_success }}
                      </div>
                  @elseif(isset($username_error))
                      <div class="alert alert-danger">
                          {{ $username_error }}
                      </div>
                  @endif
          </div>

          <!--COMPLETED TASkS-->
          <div class="col-sm-6 text-center">
              <h1 class="text-success"><b>{{ $user->completed_tasks }}</b></h1>
              Tasks completed
          </div>

      </div>
      <br>
      <div class="row">
          <!-- E-mail -->
          <div class="col-sm-5">
              <div class="alert alert-info">
                  As for now, you can't change your email, because e-mail notification is yet to be implemented.
              </div>
              <form class="text-secondary" method="POST" action="#" id="update_email">
                  @csrf
                  @method('PATCH')
                  <label for='email'>E-mail:</label>

                  <div class='col-sm-3 input-group mb-3'>
                      <input type="email" name="email" id="email" class="form-control"
                          placeholder="{{ $user->email }}" aria-describedby="button-addon2" readonly>
                      <button class="btn btn-secondary text-center" id="button-addon2" disabled>Save</button>
                  </div>
              </form>
          </div>

          <!--Logout button-->
          <div class="col-sm-6 text-center">
              <button class="btn btn-warning m-3" form="logout">Log out</button>
          </div>

      </div>

      <div class="row text-center">

          <!-- Password -->
          <div class="col-sm-5">
              <form method="POST" action="{{ url('users/' . $user->id) }}" id="update_password"
                  onsubmit="confirm ('Do you really want to change password?');" autocomplete="off">
                  @csrf
                  @method('PATCH')
                  <label for="password">Password:</label>
                  <div class="col-sm-3 input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Old password:</span>
                      </div>
                      <input type="password" name="old_password" class="form-control" aria-describedby="button-addon1"
                          autocomplete="off" autofill="off" required>
                  </div>
                  <div class="col-sm-3 input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">New password:</span>
                      </div>
                      <input type="password" name="password" class="form-control"
                          placeholder="you can change password - just make it good!" aria-describedby="button-addon3"
                          required>
                      <button class="btn btn-dark text-center" id="button-addon3">Save</button>
                  </div>
                  @if (isset($password_success))
                      <div class="alert alert-success">
                          {{ $password_success }}
                      </div>
                  @elseif(isset($password_error))
                      <div class="alert alert-danger">
                          {{ $password_error }}
                      </div>
                  @endif
              </form>

          </div>

          <!--DELETE BUTTON-->
          <div class="col-sm-6 text-center">
              <button class="btn btn-danger">Delete Account</button>
          </div>

      </div>


      <br>
      <form method="GET" action="/logout" id="logout"></form>
      <form method="POST" action="{{ url('users/' . $user->id) }}" id="delete"></form>
      <div>
          @include('common.errors')
      </div>

      <div class="border">
         @if(isset($clients))
         Your clients:
            @foreach($clients as $client => $token)
               <li>{{$client}}: {{$token}}
            @endforeach
         @endif
         
  </x-layout>
