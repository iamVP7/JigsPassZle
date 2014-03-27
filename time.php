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

var nums = num;
var i=0;
var id;
var divs= new Array();
var numbers = new Array();
while(nums!=0)
{
 numbers[i]= parseInt(nums%10); 
nums = parseInt(nums/10);
i = i+1;
}


var one = document.getElementById( "div"+numbers[5]).childNodes[1].src;
var two = document.getElementById( "div"+numbers[4] ).childNodes[1].src;
var three = document.getElementById( "div"+numbers[3] ).childNodes[1].src;
var four = document.getElementById( "div"+numbers[2] ).childNodes[1].src;
var five = document.getElementById( "div"+numbers[1] ).childNodes[1].src;
var six = document.getElementById( "div"+numbers[0] ).childNodes[1].src;   

document.getElementById( "child1" ).value= one;
 document.getElementById( "child2" ).value= two;
document.getElementById( "child3" ).value= three;
document.getElementById( "child4" ).value= four;
document.getElementById( "child5" ).value= five;
document.getElementById( "child6" ).value= six;   
"<?php $_SESSION['va']= one;?>";

document.getElementById( "butts" ).innerHTML = "<button>Submit</button>"; 


}

function shuffle(o){ //v1.0
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
};
var num=0;
function randomcall()
{
var myArray = ['1','2','3','4','5','6','7','8','9'];
newArray =shuffle(myArray);

for(i=0;i<9;i++)
num = num*10  + parseInt(newArray[i]);

num = num % 1000000;
document.getElementById("nums").innerHTML = num;
}
</script>
<title>Time Calculation</title>
</head>
<body onload="randomcall()">
<h1> Place your images in order according to the number below </h1>

<center>Your PIN is <h2 id="nums"></h2></center>
<center>
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
</center>

<div style="width: 90%; display: table;">
    <div style="display: table-row">
        <div style="display: table-cell;" class="divdrop" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)" onchange="test()">1</div>
        <div style="display: table-cell;" class="divdrop" id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">2</div>
<div style="display: table-cell;"class="divdrop" id="div3" ondrop="drop(event)" ondragover="allowDrop(event)">3</div>
</div>
<div style="display: table-row">      
  <div style="display: table-cell;" class="divdrop" id="div4" ondrop="drop(event)" ondragover="allowDrop(event)">4</div>
<div style="display: table-cell;" class="divdrop" id="div5" ondrop="drop(event)" ondragover="allowDrop(event)">5</div>
        <div style="display: table-cell;" class="divdrop" id="div6" ondrop="drop(event)" ondragover="allowDrop(event)">6</div>
    </div>
<div style="display: table-row">      
  <div style="display: table-cell;" class="divdrop" id="div7" ondrop="drop(event)" ondragover="allowDrop(event)">7</div>
<div style="display: table-cell;" class="divdrop" id="div8" ondrop="drop(event)" ondragover="allowDrop(event)">8</div>
        <div style="display: table-cell;" class="divdrop" id="div9" ondrop="drop(event)" ondragover="allowDrop(event)">9</div>
    </div>
</div>


<form name="myForm" action="testingtime.php" method="post">
<input type="hidden" id="child1" name="child1" visibility="hidden"></input>
<input type="hidden" id="child2" name="child2" visibility="hidden"></input>
<input type="hidden" id="child3" name="child3" visibility="hidden"></input>
<input  type="hidden" id="child4" name="child4" visibility="hidden"></input>
<input type="hidden" id="child5" name="child5" visibility="hidden"></input>
<input type="hidden" id="child6" name="child6" visibility="hidden"></input>
<input  type="hidden" id="child7" name="child7" visibility="hidden"></input>
<center>
<h2><a href="javascript:test()" onclick="test()" >Click here</a></h2>
</center>
<article id="butts"></article>


 </form>

    <script type="text/javascript">
        
        var secondsLabel = document.getElementById("child7");
        var totalSeconds = 0;
        setInterval(setTime, 1000);

        function setTime()
        {
            ++totalSeconds;
            secondsLabel.value = pad(totalSeconds);
            
        }

        function pad(val)
        {
            var valString = val + "";
            if(valString.length < 2)
            {
                return "0" + valString;
            }
            else
            {
                return valString;
            }
        }
    </script>

</body>
</html>
