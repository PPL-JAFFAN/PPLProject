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
   $nama = $_POST['nama'];
   $nip = $_POST['nip'];
   $email = $_POST['email'];
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
if (isset($_POST['add_mhs'])) {
   $nama = $_POST['nama'];
   $nim = $_POST['nim'];
   $semester = $_POST['semester'];
   $angkatan = $_POST['angkatan'];
   $jalur_masuk = $_POST['jalur_masuk'];
   $email = $_POST['email'];
   // $password = $_POST['password'];
   $dosen = $_POST['dosen'];
   $status = "Aktif";
   $level = "mhs";

   $addtomhs = mysqli_query($conn, "INSERT INTO tb_mhs (nama, nim, semester, angkatan, jalur_masuk, email,status, kode_wali ) 
   VALUES('$nama','$nim','$semester','$angkatan','$jalur_masuk', '$email','$status','$dosen')");
   $addtouser = mysqli_query($conn, "INSERT INTO tb_user (nimnip, username,status, email, password ) VALUES('$nim','$nama','$level','$email', '$nim')");

   if ($addtomhs) {
      header('location:manajemenakun.php');
   } else {
      echo "Gagal Menambahkan Data";
      header('location:manajemenakun.php');
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

   if ($querydelete) {
      header('location:manajemenakun.php');
   } else {
      echo "Gagal Hapus Data";
      header('location:manajemenakun.php');
   }

}





?>