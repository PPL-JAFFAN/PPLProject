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
	<title>Rekap Data Mahasiswa</title>
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
                    <h1 class="mt-4">Rekap Data Mahasiswa</h1>
					<p>Mahasiswa Aktif</p>
					<div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th >NIM</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
										<th>Kode Kota</th>
                                        <th>Angkatan</th>
										<th>Jalur Masuk</th>
										<th>Email</th>
										<th>No HP</th>
										<th>Status</th>
										<th>Kode Wali</th>
										<th>Semester</th>
                                    </tr>
                                </thead>
								<tbody>
										  <?php
										  $ambildata = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE status='Aktif'");
										  $i = 1;
										  while ($data = mysqli_fetch_array($ambildata)) {
											  $nim = $data['nim'];
											  $nama = $data['nama'];
											  $alamat = $data['alamat'];
											  $kode_kota = $data['kode_kota'];
											  $angkatan = $data['angkatan'];
											  $jalur_masuk = $data['jalur_masuk'];
											  $email = $data['email'];
											  $no_hp = $data['no_hp'];
											  $status = $data['status'];
											  $kode_wali = $data['kode_wali'];
											  $semester = $data['semester'];
										  ?>

										<tr>
										  <td><?= $nim ?></td>
										  <td><?= $nama; ?></td>
										  <td><?= $alamat; ?></td>
										  <td><?= $kode_kota; ?></td>
										  <td><?= $angkatan; ?></td>
										  <td><?= $jalur_masuk; ?></td>
										  <td><?= $email; ?></td>
										  <td><?= $no_hp; ?></td>
										  <td><?= $status; ?></td>
										  <td><?= $kode_wali; ?></td>
										  <td><?= $semester; ?></td>
										</tr>

										<?php
										  }
										?>
							</table>
					</div>
				</div>
  </section>
  <script src="../library/js/script.js"> </script>
</body>
</html>
