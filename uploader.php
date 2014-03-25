<?php if (!isset($_POST)){die('You can"t access this file directly');}//avoid direct accessing to this file.
 
 if (isset($_POST['Upload'])) {  //check if form submitted
    if (!empty($_FILES['filefield'])) { //check for image submitted
        if ($_FILES['filefield']['error'] > 0) { // check for error re file
            echo "Error: " . $_FILES["filefield"]["error"] . "<br />";
        } else {
            $file=$_FILES['filefield'];  //every thing fine. file successfully uploaded to server
        }
 
 
    } else {
        die('File not uploaded.'); // exit script
    }
}
 
 $upload_directory="upload/";
 $ext_str = "gif,jpg,jpeg,mp3,tiff,bmp,doc,docx,ppt,pptx,txt,pdf";
 $allowed_extensions=explode(',',$ext_str);
 $max_file_size = 10485760;//10 mb remember 1024bytes =1kbytes
 $overwrite_file = false;
 /*
 upload directory check
  */
 $status = true;
 if (!is_dir($upload_directory)) { //check if upload directory exists or not
            if ($mkdir) {
                if (!mkdir($upload_directory)) { //if directory doesn't exists try to create it,if fails warn user
                    $status = false;
                } else {
                    if (!chmod($upload_directory, 0777)) $status = false; //change file permisson to write,read,execute
                }
            } else {
                $status = false;
            }
}
if(!$status){  //if can't make a directory warn the user and exit
die('There is no uploade directory or i can" create the upload directory');
}
 
/*
check allowed extensions here
 */
$ext = substr($file['name'], strrpos($file['name'], '.') + 1); //get file extension from last sub string from last . character
if (!in_array($ext, $allowed_extensions) ) {
die('only'.$ext_str.' files allowed to upload'); // exit the script by warning
 
/*
check file size of the file if it exceeds the specified size warn user
 */
 
if($file['size']>=$max_file_size){
die('only the file less than '.$max_file_size.'mb  allowed to upload'); // exit the script by warning
}
 
/*
check if the file already exists or not in the upload directory
 */
 
if(!$overwrite_file and file_exists($upload_directory.$file['name']) ){
 die('the file  '.$file['name'].' already exists.'); // exit the script by warning
}
 
if(!move_uploaded_file($file['tmp_name'],$upload_directory.$file['name'])){
 die('The file can"t moved to target directory..'); //file can't moved with unknown reasons likr cleaning of server temperory files cleaning
}
 
 
/*
Hurrey we uploaded a file to server successfully.
 */

?>
