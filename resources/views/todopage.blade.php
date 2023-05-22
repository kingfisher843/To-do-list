
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="to-do" content="Simple app for storing and updating your own to-do list.">

  <title>To-do</title>
  <link href="css/app.css" type="stylesheet">
</head>

<body>
  <div id="logo">
  <h1>To-do list</h1>
  </div>
  <div id="content">

    <form id="filter" action="" method="post">
      <label for="orders">Sort by:</label>
      <select name="orders" id="orders">
        <option value="latest">the latest</option>
        <option value="oldest">the oldest</option>
        <option value="high_pr">the highest priority</option>
        <option value="low_pr">the lowest priority</option>
      </select>
    </form>

    <form id="new-task" action = "Http/Controllers/todoController.php" method="post">
      <label><h3>Create new task</h3></label>
      <br/>Name:
      <input id="name" type="text" value="name of your task...">
      <br/>Description:<br/>
      <textarea id="desc" rows="4" cols="50">If you want, write a short description here...
      </textarea>
      <br/>Set priority (1 is lowest, 5 is highest):
      <input id="prio1" name="priority" type="radio">1</input>
      <input id="prio2" name="priority" type="radio">2</input>
      <input id="prio3" name="priority" type="radio">3</input>
      <input id="prio4" name="priority" type="radio">4</input>
      <input id="prio5" name="priority" type="radio">5</input>
      <br>
      <input id="submit" type="submit" value="Create the task">
    </form>





    <!--list of tasks should display here-->

  </div id="content">
</body>
