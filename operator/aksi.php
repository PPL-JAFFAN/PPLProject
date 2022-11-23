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
   $angkatan = $_POST['angkatan'];
   $email = $_POST['email'];
   $status = $_POST['status'];


   //validate form
   $valid = TRUE;
   if (empty($namabaru)) {
      $error_nama = "Nama is required";
      $valid = FALSE;
   } else if (!preg_match("/^[a-zA-Z ]*$/", $namabaru)) {
      $error_nama = "Only letters and white space allowed";
      $valid = FALSE;
   }
   if (empty($angkatan)) {
      $error_angkatan = "Angkatan is required";
      $valid = FALSE;
   } else if (!preg_match("/^[0-9]*$/", $angkatan)) {
      $error_angkatan = "Only numbers allowed";
      $valid = FALSE;
   }
   if (empty($email)) {
      $error_email = "Email is required";
      $valid = FALSE;
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_email = "Invalid email format";
      $valid = FALSE;
   }
   if (empty($status)) {
      $error_status = "Status is required";
      $valid = FALSE;
   }

   if ($valid) {
      $queryupdate = mysqli_query($conn, "UPDATE tb_mhs SET nama = '$namabaru', angkatan = '$angkatan', email = '$email', status = '$status' WHERE nim = '$nimmahasiswa'");
      if ($queryupdate) {
         header('location:manajemenakun.php');
      } else {
         header('location:manajemenakun.php');
      }
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
   $valid = true;
   $err = '';
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
   //validate form cant be empty
   if (empty($nama) || empty($nim) || empty($semester) || empty($angkatan) || empty($jalur_masuk) || empty($email) || empty($dosen)) {
      $valid = false;
      $err = "Form tidak boleh kosong";
   }
   //validate $nim can only start with "24060" and length must be 14
   if (substr($nim, 0, 5) != "24060" || strlen($nim) != 14) {
      $valid = false;
      $err = "NIM harus diawali dengan 24060 dan panjang NIM harus 14";
   }

   if (!$valid) {
      header('location:manajemenakun.php');
   } else {
      $addtomhs = mysqli_query($conn, "INSERT INTO tb_mhs (nama, nim, semester, angkatan, jalur_masuk, email,status, kode_wali ) 
      VALUES('$nama','$nim','$semester','$angkatan','$jalur_masuk', '$email','$status','$dosen')");
      $addtouser = mysqli_query($conn, "INSERT INTO tb_user (nimnip, username,status, email, password ) VALUES('$nim','$nama','$level','$email', '$nim')");
      $addtopkl = mysqli_query($conn, "INSERT INTO tb_pkl (nim, status_pkl, verif_pkl) VALUES('$nim','BELUM MENGAMBIL','belum')");
      $addtoskripsi = mysqli_query($conn, "INSERT INTO tb_skripsi (nim, status_skripsi, verif_skripsi) VALUES('$nim','BELUM MENGAMBIL','belum')");
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