<?php
require_once('../db_login.php');
//session start
session_start();
// nim = session nim
$nim = $_SESSION['nim'];
//semester = get semester
$semester = $_GET['semester'];
//query
$query = "SELECT * FROM tb_irs WHERE nim = $nim AND semester = $semester";
$connect = mysqli_query($conn, $query);
//sks = result of query for column sks
$irs = mysqli_fetch_assoc($connect);
//if irs empty, sks = '', verif = 'belum'
if (empty($irs)) {
    $sks = '';
    $verif = 'belum';
} else {
    //if irs not empty, sks = irs sks, verif = irs verif
    $sks = $irs['sks'];
    $verif = $irs['verif_irs'];
}

echo $sks . ' ' . $verif;