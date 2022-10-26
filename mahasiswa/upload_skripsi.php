<?php
session_start();
require '../function.php';

$folder="uploads_irs/";
if (!file_exists($folder)) {
   mkdir($folder, 0777);
}
$move = move_uploaded_file($_FILES["upload_file"]["tmp_name"], $folder . "/" . $_FILES["upload_file"]["name"]);
if($move){
   echo "File uploaded successfully..";
   updateSkripsi($_SESSION['nim'], $_FILES["upload_file"]["name"]);
}else{
   echo "Uploading failed!";
}
?>