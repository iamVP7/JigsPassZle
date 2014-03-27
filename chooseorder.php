<?php
session_start();
  
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="viswa"; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="images"; // Table name 

// Connect to server and select databse.
$con=mysqli_connect("$host","$username","$password","$db_name");

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$myusername =$_SESSION['varname'];
$sql = "SELECT * FROM `images`";
$sql = "SELECT * FROM `images` WHERE `username`='$myusername'";

$result = mysqli_query($con,$sql);

$i = 0;
while($row = mysqli_fetch_array($result))
{
 

$a[$i] = $row['imagename'];

$i = $i+1;
 
}


mysqli_close($con);

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="main.css"></link>
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

<script type="text/javascript">
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

function test()
{
var one = document.getElementById( "div1" ).childNodes[0].src;
var two = document.getElementById( "div2" ).childNodes[0].src;
var three = document.getElementById( "div3" ).childNodes[0].src;
var four = document.getElementById( "div4" ).childNodes[0].src;
var five = document.getElementById( "div5" ).childNodes[0].src;
var six = document.getElementById( "div6" ).childNodes[0].src;  

document.getElementById( "child1" ).value= one;
document.getElementById( "child2" ).value= two;
document.getElementById( "child3" ).value= three;
document.getElementById( "child4" ).value= four;
document.getElementById( "child5" ).value= five;
document.getElementById( "child6" ).value= six;  
"<?php $_SESSION['va']= one;?>";
confirm("Remember the order so that You need to position them correctly in the next stage");

document.getElementById( "butts" ).innerHTML = "<button>Submit</button>"; 


}
</script>
<title>Choose Order</title>
</head>
<body>
<h1> Welcome!! Choose your Order </h1>


<?php for($i=0;$i<9;$i++)
	{
	?>
<img id="<?php echo $i;?>" src="<?php echo $a[$i]; ?>" draggable="true" ondragstart="drag(event)" width="336" height="69"/>
<?php if(($i+1)%3	==0)
		{
	?>

<?php	}
	}
?>
<div style="width: 90%; display: table;">
    <div style="display: table-row">
        <div style="display: table-cell;" class="divdrop" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)" onchange="test()"></div>
        <div style="display: table-cell;" class="divdrop" id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<div style="display: table-cell;"class="divdrop" id="div3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        <div style="display: table-cell;" class="divdrop" id="div4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<div style="display: table-cell;" class="divdrop" id="div5" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        <div style="display: table-cell;" class="divdrop" id="div6" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    </div>
</div>


<form name="myForm" action="orderinsert.php" method="post">
<input type="hidden" id="child1" name="child1" visibility="hidden"></input>
<input type="hidden" id="child2" name="child2" visibility="hidden"></input>
<input type="hidden" id="child3" name="child3" visibility="hidden"></input>
<input  type="hidden" id="child4" name="child4" visibility="hidden"></input>
<input type="hidden" id="child5" name="child5" visibility="hidden"></input>
<input type="hidden" id="child6" name="child6" visibility="hidden"></input>

<center>
<h2><a href="javascript:test()" onclick="test()" >Click here</a></h2>
</center>
<article id="butts"></article>


 </form>

</body>
</html>
