<!DOCTYPE html>
<html>
<head>
	<title>dashboard</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dash.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add.php">add</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="show.php">show</a>
      </li>
     
    </ul>
  </div>
</nav>
<body>
<form class="form-horizontal" action=""  method="POST">
<fieldset>

<legend>Add Form</legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">name</label>  
  <div class="col-md-4">
  <input id="textinput" name="name" type="text" placeholder="full name" class="form-control input-md">
 
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">insert age</label>  
  <div class="col-md-4">
  <input id="textinput" name="age" type="text" placeholder="age" class="form-control input-md">
   
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Select status</label>
  <div class="col-md-4">
    <select id="selectbasic" name="somker" class="form-control">
      <option value="0">somker</option>
      <option value=1>nonsomker</option>
    </select>
  </div>
</div>

<div class="form-group">
  <div class="col-md-4">
    <button id="singlebutton" name="Add" class="btn btn-primary">Add</button>
  </div>
</div>

</fieldset>
</form>
<?php 
require 'db.php'; 
$db= DB::getInstance(); 
if(isset($_POST['Add']))
{
$name = $_POST['name'];
$age = $_POST['age'];
$somker=$_POST['somker'];
$s= $db->insert('my',['name'=>$name,'age'=>$age,'somker'=>$somker]);
header("Location: http://localhost:8080/m/dash.php");
}
?> 

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/cou.css">
</body>
</html>