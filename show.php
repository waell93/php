<!DOCTYPE html>
<html>
<head>
	<title>Show here</title>
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


<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">age</th>
      <th scope="col">somker</th>
    </tr>
  </thead>
  <tbody>
  	<?php require 'db.php';
$db = DB::getInstance();
$id=0;
$data=$db->table('my')->get(); 
foreach ($data as $y=> $value) {
	echo "<tr><td>".$id++ ."<td>".$value->name."</td>
	<td>".$value->age."</td><td>".$value->somker."</td></tr>";
}
  	 ?>

  
    </tr>
  </tbody>
</table>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/cou.css">
</body>
</html>