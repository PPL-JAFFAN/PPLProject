<?php
session_start();
require_once '../db_login.php';
require_once '../function.php';

$nim = $_SESSION['nim'];
$kode_mk = $_GET['kode_mk'];
$semester = $_GET['semester'];

$querydelete = "DELETE FROM tb_irs_diambil WHERE nim = $nim AND kode_mk = '$kode_mk' AND semester = $semester";
$connect = mysqli_query($conn, $querydelete);
if ($connect){
  echo '';
}

?>
