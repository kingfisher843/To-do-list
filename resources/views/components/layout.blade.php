<!doctype html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}"/>
    <title> {{ $title ?? 'TaskMe' }} </title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <h3>Task<span class="text-success">Me<button class="btn check-me"></span><span class="text-success"><i class="bi-square"></i></button></span></h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">{{$welcome ?? "Simple App for all your tasks"}}</a>
            </li>
          </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            @if(auth()->check())
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{url('users/'. auth()->user()->id)}}"><b>Hi {{ auth()->user()->username }}!</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/tasks">Tasks</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Log out</a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-weight-bold" href="{{url('users/'. auth()->user()->id)}}"><i class="bi bi-gear-fill"></i></a>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="/users/create">Join TaskMe!</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/login">Log in</a>
              </li>
            @endif
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    

    <div class="container bg-white" id="content">
      <br><br><br><br>
        {{ $slot }}
      <br><br><br><br>
    </div>

    <!--FOOTER-->
    <footer class="bg-dark text-center text-lg-start text-white fixed-bottom">

      <div class="container p-4">
      
        <div class="row mt-4">
      
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            
          </div>

        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>    
    <script>$('.check-me').click(function() {
      $(this).find('i').toggleClass('bi-square bi-check-square-fill');
      });
    </script>
  </body>
</html>
