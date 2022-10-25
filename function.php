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
    $query = mysqli_query($conn, "SELECT * FROM tb_matakul ORDER BY semester");
    return $query;
}

// get matkul with kode_mk
function getMatkulDetail($kode_mk){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_matakul WHERE kode_mk = '$kode_mk'");
    $data = mysqli_fetch_assoc($query);
    return $data;
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

//get detail irs diambil
function getIrsDiambil($nim){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_irs_diambil WHERE nim='$nim'");
    return $query;
}

//check irs diambil with kode_mk and nim
function checkIrsDiambil($kode_mk, $nim){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_irs_diambil WHERE kode_mk='$kode_mk' AND nim='$nim'");
    $data = mysqli_num_rows($query);
    return $data;
}

// add data to irs diambil
function addIrsDiambil($nim, $kode_mk){
    $matkulDetail = getMatkulDetail($kode_mk);

    $matakuliah = $matkulDetail['matakuliah'];
    $waktu = $matkulDetail['waktu'];
    $sks = $matkulDetail['sks'];
    $kelas = $matkulDetail['kelas'];
    $pembelajaran = $matkulDetail['pembelajaran'];

    global $conn;
    $query = mysqli_query($conn, "INSERT INTO tb_irs_diambil VALUES ('$nim', '$kode_mk', '$matakuliah', '$waktu', '$sks', '$kelas', '$pembelajaran', 'Belum Disetujui')");
    return $query;
}

// delete data from irs diambil
function deleteIrsDiambil($nim, $kode_mk){
    global $conn;
    $query = mysqli_query($conn, "DELETE FROM tb_irs_diambil WHERE nim='$nim' AND kode_mk='$kode_mk'");
    return $query;
}