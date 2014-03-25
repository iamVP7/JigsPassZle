<!--
This will help to demonstrate the JPEGSlicer working.
thecoderin@aol.in
-->
<?php
include("JPEGSlicer.php");
echo"FILE PROPERTIES<br><pre>";
print_r($_FILES);
echo"</pre>";
$image	=	$_FILES['image']['tmp_name'];
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Page for JPEG SLICER -anish**-</title>

<style type="text/css">
img
{
width:50px;
height:50px;
}
#div1 {width:100px;height:100px;padding:10px;border:1px solid #aaaaaa;}
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
//JPEGSlicer(directory, temp_image,selection,resize)
	/*
		-->directory 	= directory name to be uploaded (string)
		
		-->temp_image	= The temporary image file example: $_FILES['image']['tmp_name'] (string)
		
		-->selection	= The selection for resize (dtring)
			->if selection = 'height'
				the image is resized , ie. new image height will be resize value of the function parameter
			->if selection = 'width'
				the image is resized , ie. new image width will be resize value of the function parameter
			->if selection ='nill'
				NO IMAGE RESIZE PLEASE ASSIGN resize = 0
				
		-->resize		=	value assigned to the fixed selection (integer)
			resize will be zero if the selection goes to zero
			
			
			THE IMAGES WILL BE IN THE object->filename ARRAY
	*/

//$ImgObject		=	new JPEGSlicer('slice', $image,'nill',0); //JPEG SLICE WITHOUT RESIZE
$ImgObject	=	new JPEGSlicer('slice', $image,'width',100); //JPEG SLICE WITH RESIZE ACCORDING TO WIDTH SIZE = 100px
$ImgObject	=	new JPEGSlicer('slice', $image,'height',100); //JPEG SLICE WITH RESIZE ACCORDING TO HEIGHT SIZE = 100px
?>
<html>
<head>
<title>Drag </title>
</head>
<body>
<!--<pre>
<?php// print_r($ImgObject); ?>
</pre>-->
<br />
<table align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
<?php for($i=0;$i<9;$i++)
	{
	?>
<td><img src="<?php echo $ImgObject->filename[$i]; ?>" draggable="true" ondragstart="drag(event)" /></td>
<?php if(($i+1)%3	==0)
		{
	?>
  </tr><tr>
<?php	}
	}
?>
</tr>
</table>
<br />

<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
</body>
</html>
