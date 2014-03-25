<html>
<head>

<script type="text/javascript">

function passver() {
    var pass1 = document.getElementById("mypass").value;
    var pass2 = document.getElementById("myconpass").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
       
//document.getElementById("mypass").value = "";
     document.getElementById("myconpass").value="";

alert("Passwords Dont Match!!!");
    }
else
{
var s= document.getElementById('emailid').value;
alert(s);
}

   // return ok;
}
</script>
<link rel="stylesheet" type="text/css" href="main.css"></link>
</head>
<body>

<div align="center">

<form name="form1" method="post" action="insert.php">
<header>
<h1>
Enter Registration Details
</h1></header>


<section>
<h2>Mail ID</h2>
<h3>
 <?php session_start();
  $x = $_SESSION['varname'];
  echo '<div id="mailID">'.$x.'</div>'; ?> </h3> <br />
</section>
<section>

<h2>Name</h2>
<input name="reguser"  type="text" id="reguser" required class="txtbox">
</section>
<section>


<h2>Password</h2>

<input name="mypass"  type="password" id="mypass" required class="txtbox">
</section>
<section>

<h2>Conform Password</h2>
<input name="myconpass"  type="password" onchange="passver()" id="myconpass" required class="txtbox"> 
</section>
<section>

<button type="submit" name="Submit" value="Submit">Submit</button>
</section>
<section>


</form>

 
</body>
</html>
