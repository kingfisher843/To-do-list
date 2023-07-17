<!doctype html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title> {{ $title ?? 'TaskMe' }} </title>
  </head>

  <body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

      <a class="navbar-brand" href="#">
        <h3>Task<span class="text-success">Me<button class="btn check-me"><i class="bi-square"></i></button></span></h3></a>

      <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
      <li class="nav-item">
        <a class="navbar-text" href="#">{{$welcome ?? "Simple App for all your tasks!"}}</a><br>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        @if( auth()->check() )
          <li class="nav-item">
            <form action="/profile" method="GET">
            <button class="btn btn-link nav-link">Hi {{ auth()->user()->username }}!</button>
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tasks">Tasks</a>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Log Out</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="/login">Log In</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
          </li>
          @endif
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#"><i class="bi bi-gear-fill"></i></a>
          </li>
        </ul>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-bs-toggle="button" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>

    <div class="container bg-white" id="content">

        {{ $slot }}

    </div>

    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>    <script>$('.check-me').click(function() {
      $(this).find('i').toggleClass('bi-square bi-check-square-fill');
  });
    </script>
  </body>
</html>
