<?php
require 'db_login.php';

// get detail mahasiswa
function getMhsDetail($nim){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE nim='$nim'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

// get detail dosen
function getDosenDetail($kode_wali){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE kode_wali='$kode_wali'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

// get detail khs
function getKhsDetail($nim){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_khs WHERE nim='$nim'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

// get detail pkl
function getPklDetail($nim){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_pkl WHERE nim='$nim'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

//get detail skripsi
function getSkripsiDetail($nim){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_skripsi WHERE nim='$nim'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

?>