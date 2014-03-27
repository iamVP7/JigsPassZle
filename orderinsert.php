<?php



session_start();
  
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="viswa"; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="imageorder"; // Table name 

// Connect to server and select databse.

$con = mysql_connect("$host", "$username", "$password"); 

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysql_select_db("$db_name",$con);

$reguser =$_SESSION['varname'];

$pa = $_POST['child1'];
$num = 1;
$sql="INSERT INTO $tbl_name (`username`,`imageorder`,`imagepath`) VALUES ('$reguser','$num','$pa')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


$pa = $_POST['child2'];
$num = 2;
$sql="INSERT INTO $tbl_name (`username`,`imageorder`,`imagepath`) VALUES ('$reguser','$num','$pa')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$pa = $_POST['child3'];
$num = 3;
$sql="INSERT INTO $tbl_name (`username`,`imageorder`,`imagepath`) VALUES ('$reguser','$num','$pa')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$pa = $_POST['child4'];
$num = 4;
$sql="INSERT INTO $tbl_name (`username`,`imageorder`,`imagepath`) VALUES ('$reguser','$num','$pa')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$pa = $_POST['child5'];
$num = 5;
$sql="INSERT INTO $tbl_name (`username`,`imageorder`,`imagepath`) VALUES ('$reguser','$num','$pa')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$pa =$_POST['child6'];
$num = 6;
$sql="INSERT INTO $tbl_name (`username`,`imageorder`,`imagepath`) VALUES ('$reguser','$num','$pa')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

header("location:time.php");

?>
