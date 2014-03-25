<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form id="uploadform" action="uploader.php" enctype="multipart/form-data" method="post">
  <label>Upload File
  <input id="filefield" name="filefield" type="file" />
  </label>
  <label>
  <input id="Upload" name="Upload" type="submit" value="Upload" />
  <!--
  This hidden input will force the  PHP max upload size.
  it may work on all servers.
   -->
  <input name="MAX_FILE_SIZE" type="hidden" value="100000" />
  </label>
</form>

</body>
</html>
