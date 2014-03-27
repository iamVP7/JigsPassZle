<?php
session_start();
  
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="viswa"; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="login"; // Table name 

// Connect to server and select databse.
$con = mysql_connect("$host", "$username", "$password"); 

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("$db_name",$con);

// username and password sent from form 
$mailID = $_SESSION['varname'];
$mypass =$_POST['mypass']; 
$reguser = $_POST['reguser'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myregusername);
$mypassword = stripslashes($mypass);

$myusername = mysql_real_escape_string($myregusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="INSERT INTO $tbl_name (`name`, `username`, `password`) VALUES ('$reguser', '$mailID', '$mypassword')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
else
{
header("location:upload_example.php");
}
?>
