<?php
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpwd = "";
$dbname = "ppl";

$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);

function test_input($data)
{
   global $conn;

   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   $data = $conn->real_escape_string($data);

   return $data;
}

function close()
{
   header('location:../db_login.php');
}

//update mahasiswa
if (isset($_POST['updatemahasiswa'])) {
   $nimmahasiswa = $_POST['nimmahasiswa'];
   $namabaru = $_POST['namabaru'];
   $alamat = $_POST['alamat'];
   $kode_kota = $_POST['kode_kota'];
   $angkatan = $_POST['angkatan'];
   $jalur_masuk = $_POST['jalur_masuk'];
   $email = $_POST['email'];
   $no_hp = $_POST['no_hp'];
   $status = $_POST['status'];
   $kode_wali = $_POST['kode_wali'];
   $semester = $_POST['semester'];

   $queryupdate = mysqli_query($conn, "UPDATE tb_mhs SET nama = '$namabaru' , alamat = '$alamat' , kode_kota = '$kode_kota' ,
   angkatan = '$angkatan' , jalur_masuk = '$jalur_masuk' , email = '$email' , no_hp = '$no_hp' , status = '$status' , kode_wali = '$kode_wali' ,
   semester = '$semester' WHERE nim='$nimmahasiswa'");
   if ($queryupdate) {
      header('location:manajemenakun.php');
   } else {
      header('location:manajemenakun.php');
   }
}


//hapus mahasiswa
if (isset($_POST['hapusmahasiswa'])) {
   $nimmahasiswa = $_POST['nimmahasiswa'];
   
   $delete = mysqli_query($conn, "DELETE FROM tb_mhs where nim='$nimmahasiswa'");
   if ($delete) {
      header('location:manajemenakun.php');
   } else {
      header('location:manajemenakun.php');
   }
}