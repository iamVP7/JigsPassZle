<?php
include("JPEGSlicer.php");
$image	=	$_FILES['image']['tmp_name'];

session_start();
  
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="viswa"; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="images"; // Table name 


// Connect to server and select databse.
$con = mysql_connect("$host", "$username", "$password"); 

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("$db_name",$con);


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Drag</title>

<style type="text/css">
img
{
width:50px;
height:50px;
}
.divdrop,span,div
 {
width:60px;height:60px;padding:10px;border:1px solid #aaaaaa;
}
</style>

<script>
function allowDrop(ev)
{
ev.preventDefault();
}

function drag(ev)
{
ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev)
{
ev.preventDefault();
var data=ev.dataTransfer.getData("Text");
ev.target.appendChild(document.getElementById(data));
}
</script>
</head>

<body>

<?php


//$ImgObject		=	new JPEGSlicer('slice', $image,'nill',0); //JPEG SLICE WITHOUT RESIZE
$ImgObject	=	new JPEGSlicer('slice', $image,'width',100); //JPEG SLICE WITH RESIZE ACCORDING TO WIDTH SIZE = 100px
$ImgObject	=	new JPEGSlicer('slice', $image,'height',100); //JPEG SLICE WITH RESIZE ACCORDING TO HEIGHT SIZE = 100px
?>
<html>
<head>
<title>Drag </title>
 <link rel="stylesheet" type="text/css" href="main.css"></link>
</head>
<body>
<h1> Your Images Sliced</h1>



<?php for($i=0;$i<9;$i++)
	{
	?>
<img id="<?php echo $i;?>" src="<?php echo $ImgObject->filename[$i]; ?>" draggable="true" ondragstart="drag(event)" width="336" height="69"/>
<?php if(($i+1)%3	==0)
		{
	?>

<?php	}
	}
?>
 

<?php
session_start();
  
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="viswa"; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="images"; // Table name 

// Connect to server and select databse.
$con = mysql_connect("$host", "$username", "$password"); 

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("$db_name",$con);


for($i=0;$i<9;$i++)
{
$reguser = $_SESSION['varname'];
$a = $ImgObject->filename[$i];

$sql="INSERT INTO $tbl_name (`username`, `imagename`) VALUES ('$reguser', '$a')";
mysql_query($sql,$con);
}


?>
 
<h1> Instructions </h1>

<h3>In next stage you need to choose any six images in your preferred order </h3> 

<form name="form1" method="post" action="chooseorder.php">
<button type="submit" name="Submit" value="Submit">Submit</button>
</form>

</body>
</html>
