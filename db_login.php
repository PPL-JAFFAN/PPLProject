<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpwd = "";
$dbname = "ppl";

$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>