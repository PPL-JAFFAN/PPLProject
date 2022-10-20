<?php
  include'../db_login.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../library/css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 80%;
        margin-left: 150px;
        padding-right: 150px;
        
        }
       
        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        }
        
    </style>
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
        <a href="index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
       <a href="datamhs.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Data Mahasiswa</span>
       </a>
       <span class="tooltip">Data Mahasiswa</span>
     </li>
     <li>
       <a href="mhspkl.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Mahasiswa PKL</span>
       </a>
       <span class="tooltip">Mahasiswa PKL</span>
     </li>
     <li>
       <a href="mhsskripsi.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Mahasiswa Skripsi</span>
       </a>
       <span class="tooltip">Mahasiswa Skripsi</span>
     </li>
     <li>
       <a href="logout.php">
        <i class='bx bx-log-out' id="log_out" ></i>
         <span class="links_name">Keluar</span>
       </a>
       <span class="tooltip">Keluar</span>
     </li>
     
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name">Departemen</div>
             <div class="job">Informatika</div>
           </div>
         </div>
         <i class="fa fa-bars" id="bars"></i>>
     </li>
    </ul>
  </div>

  <section class="home-section">
      <div class="text">Mahasiswa Aktif </div>
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
  </section>
  <script src="../library/js/script.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
