<?php
require 'db_login.php';

// get detail mahasiswa
function getMhsDetail($nim){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE nim='$nim'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}
//update berkas irs
function updateIrs($nim, $namafile,$smt){
    global $conn;
    $query = mysqli_query($conn, "UPDATE tb_irs SET file_irs = '$namafile' WHERE nim = '$nim' AND semester = '$smt'");
    return $query;
}
//get Matkul PerSemester
function getMatkul($smt){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_matakul WHERE semester = '$smt'");
    return $query;
}

//get detail irs
function getIrsDetail($nim){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_irs WHERE nim='$nim'");
    return $query;
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
