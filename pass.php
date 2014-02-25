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
</head>
<body>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="insert.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Enter Registration Details</strong></td>
</tr>
<tr>
<td  >Mail ID</td>
<td  >:</td>
<td > <?php session_start();
  $x = $_SESSION['varname'];
  echo '<div id="mailID">'.$x.'</div>'; ?></td>
</tr>
<tr>
<td  >Name</td>
<td  >:</td>
<td ><input name="reguser"  type="text" id="reguser" required></td>
</tr>


<tr>
<td  >Password</td>
<td  >:</td>
<td ><input name="mypass"  type="password" id="mypass" required></td>
</tr>

<tr>
<td  >Conform Password</td>
<td  >:</td>
<td ><input name="myconpass"  type="password" onchange="passver()" id="myconpass" required></td>
</tr>
<tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" name="Submit" value="Submit"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

 
</body>
</html>
