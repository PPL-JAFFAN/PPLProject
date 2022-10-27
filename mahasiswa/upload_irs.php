<?php
session_start();
require '../function.php';
$semester = $_GET['semester'];

$folder="uploads/";
if (!file_exists($folder)) {
   mkdir($folder, 0777);
}
$move = move_uploaded_file($_FILES["upload_file"]["tmp_name"], $folder . "/" . $_FILES["upload_file"]["name"]);
if($move){
   echo "File uploaded successfully..";
   updateIrs($_SESSION['nim'], $_FILES["upload_file"]["name"],$semester);
}else{
   echo "Uploading failed!";
}
?>