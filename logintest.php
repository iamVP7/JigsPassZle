<?php

session_start();
  
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="viswa"; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="imageorder"; // Table name 

// Connect to server and select databse.
$con=mysqli_connect("$host","$username","$password","$db_name");

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$myusername =$_SESSION['varname'];

$sql = "SELECT * FROM `imageorder` WHERE `username`='$myusername'";
$result = mysqli_query($con,$sql);

$i = 0;
while($row = mysqli_fetch_array($result))
{
 
$a[$i] = $row['imagepath'];

//echo $a[$i]."<br/>";
$i = $i+1;
 
}

echo "\n";
$pa[1] = $_POST['child1'];
$pa[2] = $_POST['child2'];
$pa[3] = $_POST['child3'];
$pa[4] = $_POST['child4'];
$pa[5] = $_POST['child5'];
$pa[6] = $_POST['child6'];
$pa[7] =$_POST['child7'];
/*
echo $pa[1]."<br/>";
echo $pa[2]."<br/>";
echo $pa[3]."<br/>";
echo $pa[4]."<br/>";
echo $pa[5]."<br/>";
echo $pa[6]."<br/>";

echo "hai"."<br/>";
*/
$times =$pa[7];



$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="viswa"; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="timings"; // Table name 

// Connect to server and select databse.
$con=mysqli_connect("$host","$username","$password","$db_name");

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$myusername =$_SESSION['varname'];

if( $pa[1]==$a[0] && $pa[2]==$a[1] && $pa[3]==$a[2] && $pa[4]==$a[3] && $pa[5]==$a[4] &&$pa[6]==$a[5])
{


$sql="SELECT * FROM $tbl_name WHERE `username`='$myusername'";

$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result))
{
$timings = $row['averagetime'];

}

$timesa = $timings +2;
$timesb = $timings -2;



if($timesb<=$times && $times<=$timesa)
{
echo "great";
}
}
else
{

header("location:login_success.php");
}

?>
