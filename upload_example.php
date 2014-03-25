<!--
This will help to demonstrate the JPEGSlicer working.
thecoderin@aol.in
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>File Upload</title>
 <link rel="stylesheet" type="text/css" href="main.css"></link>
</head>

<body align="center">
<form method="post" name="post_form" enctype="multipart/form-data" action="uploaded_example.php">

<header>
		<h1>
			Upload form
		</h1>
</header>

<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<input type="file" name="image" />
<button type="submit" name="submit" value="Upoad">submit</button>


</form>
</body>
</html>
