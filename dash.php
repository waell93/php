<!DOCTYPE html>
<html>
<head>
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

	<?php 
if (@$_GET['box'] =='nonsomker')
{ require 'db.php';
$id=intval($_GET['id']);
$db= DB::getInstance();
$data=['somker'=>'0'];
$w=$db->update('my',$data,$id);
echo $w ;
header("Location: http://localhost:8080/m/dash.php");
}elseif (@$_GET['box']=='somker')
{ require 'db.php';
$id=intval($_GET['id']);
$db= DB::getInstance();
$data=['somker'=>'1'];
$db->update('my',$data,$id);
header("Location: http://localhost:8080/m/dash.php");
}elseif (@$_GET['box']=='Delete') {
	require 'db.php';
	$db =DB::getInstance();
	$id=intval($_GET['id']);
$db->delete('my',$id);
header("Location: http://localhost:8080/m/dash.php");
}elseif (@$_GET['box']=='edit') {{

	require 'db.php';
$db=DB::getInstance();
$id = intval($_GET['id']);
//$user = $db->table('my')->where($id)->get()->first();
$user = $db->query("SELECT * FROM my WHERE id=$id")->first();
if (isset($_POST['edit']))
{
	$id=intval($_GET['id']);
	$name=$_POST['name'];
	$age=$_POST['age'];
	//$data =['name'=>'$name','age'=>'$age'];
	echo $db->update('my',['name'=>$name,'age'=>$age],$id);
	header("Location: http://localhost:8080/m/dash.php");
}

	?>
	<title>dashboard</title>
</head>

<body>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/cou.css">
<form class="form-horizontal" action=""  method="POST">
<fieldset>

<legend>edit Form</legend>

<div class="form-group">
  <div class="col-md-4">
  <input id="textinput" name="name" value="<?php echo $user->name; ?>" type="text" placeholder="full name" class="form-control input-md">
  </div>
</div>
<div class="form-group"> 
  <div class="col-md-4">
  <input id="textinput" name="age" value='<?php echo $user->age; ?>' type="text" placeholder="age" class="form-control input-md">
   
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
    <button id="singlebutton" name="edit"  class="btn btn-primary">edit</button>
  </div>
</div>

</fieldset>
</form>
<?php }}else {?>
<table class="table" method="POST">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">age</th>
      <th scope="col">somker</th>
      <th scope="col">edit/del</th>
    </tr>
  </thead>
  <tbody>
  	<?php  require 'db.php';
$db = DB::getInstance();
$id=0;
$data=$db->table('my')->get(); 
foreach ($data as $y=> $value) {
	if ($value->somker == 0)
	{
	echo "<tr><td>".$id++ ."<td>".$value->name."</td>
	<td>".$value->age."</td><td><a href=dash.php?box=somker&id=".$value->id.">somker</td>
	<td><a href=dash.php?box=edit&id=".$value->id.">edit</a> || <a href=dash.php?box=Delete&id=".$value->id.">Delete</a>  </td></tr>";
}
elseif ($value->somker==1)
{	echo "<tr><td>".$id++ ."<td>".$value->name."</td>
	<td>".$value->age."</td><td><a href=dash.php?box=nonsomker&id=".$value->id.">non somker</td>
	<td><a href=dash.php?box=edit&id=".$value->id.">edit</a> || <a href=dash.php?box=Delete&id=".$value->id.">Delete</a>  </td></tr>";



}
}}
  	 ?>

  
    </tr>
  </tbody>
</table>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/cou.css">
</body>
</html>