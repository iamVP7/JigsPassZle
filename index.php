<html>
<head>
<script type="text/javascript">

function validateForm()
{
var x=document.forms["form1"]["myusername"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
}

</script>

<link rel="stylesheet" type="text/css" href="main.css"></link>
</head>
<body>
<div align="center">
<form name="form1" method="post" onsubmit="return validateForm();" action="checklogin.php">

<header>
<h1>Member Login</h1>
</header>

<section>
<article>
<h2>Username</h2>
</article>
<article>
<input name="myusername" type="email" id="myusername" class="txtbox"> 
</article>
</section>
<section>
<article>
<h2>Password</h2>
</article>
<article>
<input name="mypassword" type="password" id="mypassword" class="txtbox"> 
</article>
</section>
<section>
<article>
<button type="reset" name="Cancel" value="Cancel"> Cancel</button>
<button type="submit" name="Submit" value="Login"> Login</button>
</article>
</section>
</form>
</tr>
</div>

 
</body>
</html>
