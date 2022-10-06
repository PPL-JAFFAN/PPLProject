<?php
require '../function.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
  header("location:../login.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../library/css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/font.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manajemen Akun Mahasiswa</title>
  </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
        <img src="" alt="" class="logo-undip">
        <div class="logo_name">Universitas Diponegoro</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      
      <li>
        <a href="operator.php">
          <i class='bx bx-home'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
       <a href="opr_datamhs.php">
         <i class='bx bx-bar-chart' ></i>
         <span class="links_name">Data Mahasiswa</span>
       </a>
       <span class="tooltip">Data Mahasiswa</span>
     </li>
     <li>
       <a href="opr_datamhspkl.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Data Mahasiswa PKL</span>
       </a>
       <span class="tooltip">Data Mahasiswa PKL</span>
     </li>
     <li>
       <a href="opr_datamhsskripsi.php">
         <i class='bx bxs-graduation' ></i>
         <span class="links_name">Data Mahasiswa Skripsi</span>
       </a>
       <span class="tooltip">Data Mahasiswa Skripsi</span>
     </li>
	 <li>
	 <a href="opr_manajemenakun.php">
         <i class='bx bx-bar-chart' ></i>
         <span class="links_name">Manajemen Akun</span>
       </a>
       <span class="tooltip">Manajemen Akun</span>
     </li>
     <li>
       <a href="../logout.php">
        <i class='bx bx-log-out-circle' id="log_out" ></i>
         <span class="links_name">Keluar</span>
       </a>
       <span class="tooltip">Keluar</span>
     </li>
     
     <li class="profile">
         <div class="profile-details">
           <img src="avatar.png" alt="profileImg">
           <div class="name_job">
              <div class="name">Operator</div>
              <div class="job">operator@mail.com</div>
           </div>
         </div>
         <i class="fa fa-bars" id="bars"></i>>
     </li>
    </ul>
  </div>

  <section class="home-section">
		<div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Manajemen Akun Siswa</h1>
					<p>Manajemen Akun Siswa</p>

                    <div class="table-responsive">
                            <form method="POST" autocomplete="on" action="">
							  <div class="form-group">
								  <label for="nama">Nama Lengkap</label>
								  <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
							  </div>
							  <div class="form-group">
								  <label for="nis">NIM</label>
								  <input type="number" class="form-control" id="nim" name="nim" min="14" maxlength="14">
							  </div>
							  <div class="form-group">
								  <label for="nis">Angkatan</label>
								  <input type="number" class="form-control" id="angkatan" name="angkatan" min="4" maxlength="4">
							  </div>
							  <div class="form-group">
								  <label for="nis">Email</label>
								  <input type="text" class="form-control" id="email" name="email" min="10" maxlength="20">
							  </div>
							  <div class="form-group">
								  <label for="nis">Alamat</label>
								  <input type="text" class="form-control" id="alamat" name="alamat" min="10" maxlength="10">
							  </div>
							  <div class="form-group">
								  <label for="nis">No. Telepon</label>
								  <input type="number" class="form-control" id="notelmp" name="notelp" min="10" maxlength="10">
							  </div>
							  </form>
					</div>
  </section>
  <script src="../library/js/script.js"> </script>
</body>
</html>
