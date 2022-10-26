<?php
session_start();
require '../function.php';


$folder="uploads_khs/";
if (!file_exists($folder)) {
   mkdir($folder, 0777);
}
$move = move_uploaded_file($_FILES["upload_file"]["tmp_name"], $folder . "/" . $_FILES["upload_file"]["name"]);
if($move){
   updateKhs($_SESSION['nim'], $_SESSION['smt'], $_FILES["upload_file"]["name"]);
   echo "File uploaded successfully..";
}else{
   echo "Uploading failed!";
}
?>