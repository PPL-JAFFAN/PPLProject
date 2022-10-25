<?php
session_start();
    require_once('../db_login.php');
    $kode_mk= $_GET['kode_mk'];
    $nim = $_SESSION['nim'];
    $querymatkul = mysqli_query($conn,"select * from tb_matakul where kode_mk='$kode_mk'");
    $data = mysqli_fetch_assoc($querymatkul);
    $matakuliah = $data['matakuliah'];
    $waktu = $data['waktu'];
    $sks = $data['sks'];
    $kelas = $data['kelas'];
    $pembelajaran = $data['pembelajaran'];

	//Asign a query
	$query = "INSERT INTO tb_irs_diambil VALUES ($nim,'$kode_mk','$matakuliah','$waktu','$sks','$kelas','$pembelajaran','Belum Disetujui')";
    $connect = mysqli_query($conn, $query);

    if (!$connect){
        echo "<button type='button' class='btn btn-primary' onclick='add_irs(\"$kode_mk\")' id='$kode_mk'> ADD </button>";
    }
    else{
        echo "<button type='button' class='btn btn-danger' disabled id='$kode_mk'> ADDED </button>";
    }

?>