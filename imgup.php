<?php
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
 
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
$Upload = $_FILES["file"]["name"];
$Type=$_FILES["file"]["type"];
$Size=($_FILES["file"]["size"] / 1024);
$Temp=$_FILES["file"]["tmp_name"];

$uploads_dir = "upload/".$Upload;


    if (file_exists("upload/" . $Upload))
      {
      echo $Upload . " already exists. ";
      }
    else
      {
 
      move_uploaded_file($Upload,$uploads_dir);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }

?>
