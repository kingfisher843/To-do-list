<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="to-do" content="Simple app for storing and updating your own to-do list.">
  <script src="https://kit.fontawesome.com/aa3d89304e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" />
  <title> {{ $title ?? 'To-do' }} </title>

</head>

<body>
  <div id="logo">
  <h1>To-do list</h1>
  </div>
  
  <nav class="navbar navbar-default">
    <!-- Navbar Contents -->
</nav>
<br>
  <div id="content">
{{ $slot }}
  </div>

</body>
</html>
