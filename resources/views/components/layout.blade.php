<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="to-do" content="Simple app for storing and updating your own to-do list.">

  <title> {{ $title ?? 'To-do' }} </title>

</head>

<body>
  <div id="logo">
  <h1>To-do list</h1>
  </div>
  <nav class="navbar navbar-default">
    <!-- Navbar Contents -->
</nav>
  <div id="content">
{{ $slot }}



  </div id="content">
</body>
</html>
