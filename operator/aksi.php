<?php
session_start();
require "../db_login.php";

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
/*
if (isset($_POST['hapus'])) {
	$nimmahasiswa = $_POST['nimmahasiswa'];
    $delete = mysqli_query($conn, "DELETE FROM tb_mhs WHERE nim='$nimmahasiswa'");
   if ($delete) {
      header('location:manajemenakun.php');
   } else {
      header('location:manajemenakun.php');
   }
}
*/

if (isset($_POST['add_dosen'])) {

   $valid = true;
   $nama = $_POST['nama'];
   if(empty($nama)){
      $error_nama = "Nama harus diisi";
      $valid = false;
   }elseif(!preg_match("/^[a-z A-Z]*$/", $nama)){
      $error_nama = "Nama hanya dapat berisi huruf dan spasi";
      $valid = false;
   }

   $nip = $_POST['nip'];
   if(empty($nip)){
      $error_nip = "NIP harus diisi";
      $valid = false;
   }elseif(preg_match("/^[a-z A-Z]*$/", $nip)){
      $error_nip = "NIP hanya dapat berisi angka";
      $valid = false;
   }elseif(strlen($nip) != 14){
      $error_nip = "NIP harus 14 angka";
      $valid = false;
   }


   $email = $_POST['email'];
   if($email == ''){
      $error_email = "Email harus diisi";
      $valid = false;
   }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $error_email = "Format email tidak benar";
      $valid = false;
   }

   if($valid == true){
   $password = $_POST['nip'];

   $addtodosen = mysqli_query($conn, "INSERT INTO tb_dosen (nama, nip, email ) VALUES('$nama','$nip', '$email')");
   $addtouser = mysqli_query($conn, "INSERT INTO tb_user (nimnip, username, email, password ) VALUES('$nip','$nama','$email', '$password')");
   if ($addtodosen) {
      header('location:datadosen.php');
   } else {
      echo "Gagal Menambahkan Data";
      header('location:datadosen.php');
   }
      
   }
}


//edit dosen
if (isset($_POST['edit_dosen'])) {
   $nama = $_POST['nama'];
   $email = $_POST['email'];
   $id = $_POST['id'];

   $queryupdate = mysqli_query($conn, "UPDATE tb_dosen SET nama = '$nama', email = '$email' WHERE nip='$id'");
   $queryupdateuser = mysqli_query($conn, "UPDATE tb_user SET username = '$nama' , email = '$email' WHERE nimnip='$id'");

   if ($edit) {
      header('location:datadosen.php');
   } else {
      echo "Gagal Menambahkan Data";
      header('location:datadosen.php');
   }

}

//delete dosen
if (isset($_POST['delete_dosen'])) {
   $id = $_POST['id'];

   $querydelete = mysqli_query($conn, "DELETE FROM tb_dosen WHERE nip='$id'");
   $querydeleteuser = mysqli_query($conn, "DELETE FROM tb_user WHERE nimnip='$id'");

   if ($querydelete) {
      header('location:datadosen.php');
   } else {
      echo "Gagal Menambahkan Data";
      header('location:datadosen.php');
   }

}




//Add Mahasiswa
$valid = true;
if (isset($_POST['add_mhs'])) {
   $nama = $_POST['nama'];
   if(empty($nama)){
      $error_nama = "Nama harus diisi";
      $valid = false;
   }elseif(!preg_match("/^[a-z A-Z]*$/", $nama)){
      $error_nama = "Nama hanya dapat berisi huruf dan spasi";
      $valid = false;
   }

   $nim = $_POST['nim'];
   if(empty($nim)){
      $error_nim = "NIM harus diisi";
      $valid = false;
   }elseif(preg_match("/^[a-z A-Z]*$/", $nim)){
      $error_nim = "NIM hanya dapat berisi angka";
      $valid = false;
   }elseif(strlen($nim) != 14){
      $error_nim = "NIM harus 14 angka";
      $valid = false;
   }

   $semester = $_POST['semester'];
   if($semester == "Semester" || $semester == ""){
      $error_semester = "Semester  harus diisi";
      $valid = false;
   }

   $angkatan = $_POST['angkatan'];
   if($angkatan == "Angkatan" || $angkatan == ""){
      $error_angkatan = "Angkatan  harus diisi";
      $valid = false;
   }

   $jalur_masuk = $_POST['jalur_masuk'];
   if($jalur_masuk == "Jalur Masuk" || $jalur_masuk == ""){
      $error_jalur_masuk = "Jalur Masuk  harus diisi";
      $valid = false;
   }

   $email = $_POST['email'];
   if($email == ''){
      $error_email = "Email harus diisi";
      $valid = false;
   }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $error_email = "Format email tidak benar";
      $valid = false;
   }

   // $password = $_POST['password'];
   $dosen = $_POST['dosen'];
   if($dosen == "Pilih Dosen" || $dosen == ""){
      $error_dosen = "Dosen  harus diisi";
      $valid = false;
   }
   $status = "Aktif";
   $level = "mhs";

   if($valid == true){
      $addtomhs = mysqli_query($conn, "INSERT INTO tb_mhs (nama, nim, semester, angkatan, jalur_masuk, email,status, kode_wali ) 
      VALUES('$nama','$nim','$semester','$angkatan','$jalur_masuk', '$email','$status','$dosen')");
      $addtouser = mysqli_query($conn, "INSERT INTO tb_user (nimnip, username,status, email, password ) VALUES('$nim','$nama','$level','$email', '$nim')");
      $addtopkl = mysqli_query($conn, "INSERT INTO tb_pkl (nim) VALUES('$nim')");
      $addtoskripsi = mysqli_query($conn, "INSERT INTO tb_skripsi (nim) VALUES('$nim')");

      if ($addtomhs) {
         header('location:manajemenakun.php');
      } else {
         echo "Gagal Menambahkan Data";
         header('location:manajemenakun.php');
      }
   }

}


//edit mahasiswa
if (isset($_POST['edit_mhs'])) {
   $nama = $_POST['nama'];
   $email = $_POST['email'];
   $semester = $_POST['semester'];
   $status_mhs = $_POST['status_mhs'];
   $id = $_POST['id'];

   $queryupdate = mysqli_query($conn, "UPDATE tb_mhs SET nama = '$nama', semester = '$semester', email = '$email', status= '$status_mhs' WHERE nim='$id'");
   $queryupdateuser = mysqli_query($conn, "UPDATE tb_user SET username = '$nama' , email = '$email' WHERE nimnip='$id'");

   if ($edit) {
      header('location:manajemenakun.php');
   } else {
      echo "Gagal Edit Data";
      header('location:manajemenakun.php');
   }

}

//delete mahasiswa
if (isset($_POST['delete_mhs'])) {
   $id = $_POST['id'];

   $querydelete = mysqli_query($conn, "DELETE FROM tb_mhs WHERE nim='$id'");
   $querydeleteuser = mysqli_query($conn, "DELETE FROM tb_user WHERE nimnip='$id'");
   $querydeletepkl = mysqli_query($conn, "DELETE FROM tb_pkl WHERE nim='$id'");
   $querydeleteskripsi = mysqli_query($conn, "DELETE FROM tb_skripsi WHERE nim='$id'");

   if ($querydelete) {
      header('location:manajemenakun.php');
   } else {
      echo "Gagal Hapus Data";
      header('location:manajemenakun.php');
   }

}





?>