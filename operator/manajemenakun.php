<?php
  include'../db_login.php';
  require('aksi.php');
?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
      
      .home-section a .card-active{
        color: white;
        background-color: #8974FF;
      }
    </style>
    <title>Manajemen Akun Mahasiswa</title>
  </head>

<body>
  <div class="sidebar">
  <div class="logo-details">
      <i> <img src="../asset/img/undip.png" style="width:40px ; padding-bottom:5px" alt=""></i>
        <div class="logo_name" style="padding-top: 5px;"> <div style="font-size:10px ;">Departemen Informatika</div>  Universitas Diponegoro</div>
    </div>
    <ul class="nav-list" id="nav-list">
      <li>
        <a class="nav-link " href="index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
       <a class="nav-link  " href="datamhs.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Data Mahasiswa</span>
       </a>
       <span class="tooltip">Data Mahasiswa</span>
     </li>
     <li>
       <a class="nav-link " href="mhspkl.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Mahasiswa PKL</span>
       </a>
       <span class="tooltip">Mahasiswa PKL</span>
     </li>
     <li>
       <a class="nav-link" href="mhsskripsi.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Mahasiswa Skripsi</span>
       </a>
       <span class="tooltip">Mahasiswa Skripsi</span>
     </li>
     <li>
       <a class="nav-link" href="datadosen.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Data Dosen</span>
       </a>
       <span class="tooltip">Data Dosen</span>
     </li>
	 <li>
       <a class="nav-link active" href="manajemenakun.php">
         <i class='bx bx-bar-chart' ></i>
         <span class="links_name">Manajemen Akun</span>
       </a>
       <span class="tooltip">Manajemen Akun</span>
     </li>
     <li>
       <a class="nav-link" href="../logout.php">
       <i class="bi bi-box-arrow-right"></i>
         <span class="links_name">Keluar</span>
       </a>
       <span class="tooltip">Keluar</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="avatar.png" alt="profileImg">
           <div class="name_job">
              <div class="name">Operator</div>
              <div class="job" style="color:white; font-size:13px">operator@mail.com</div>
           </div>
         </div>
         <i class="fa fa-bars" id="bars"></i>>
     </li>
    </ul>
  </div>
  
  <section class="home-section">
    <div class="container-fluid">

      <br>
	  <div style="font-size:30px">Manajemen Akun Mahasiswa</div></br>
	  <div>Program Studi Informatika</div></br>
	  				<a class="nav" href="add_mahasiswa.php">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
                            Tambah Mahasiswa
                        </button>
                    </a></br>
      <div class="card p-4 rounded-4">
      <table id="example" class="table  bg-light rounded-3" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
				<th>NIM</th>
                <th>Nama</th>
				<th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $ambildata = mysqli_query($conn, 'SELECT * FROM tb_mhs');
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
		    <td><?= $i++ ?></td>
            <td><?= $nim ?></td>
			<td><?= $nama; ?></td>
			<td><?= $alamat; ?></td>
			<td>
			  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Edit<?= $nim; ?>">
				Edit
			  </button>
			  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $nim; ?>">
				Delete
			  </button>
			  <style>
				.modal {
				  background: rgba(0, 0, 0, 0.5); 
				}
				.modal-backdrop {
				  display: none;
				}
			  </style>
                <!-- Edit Modal -->
				<div class="modal fade" id="Edit<?= $nim; ?>">
				  <div class="modal-dialog">
					<div class="modal-content">

					  <!-- Modal Header -->
					  <div class="modal-header">
						<h4 class="modal-title">Edit Data Mahasiswa</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					  </div>

					  <!-- Modal body -->
					  <div class="modal-body">
						<form method="POST">
                            <div class="modal-body">
                             NIM:<input type="number" name="nimmahasiswa" placeholder="NIM" value="<?= $nim; ?>" class="form-control" required>
                            <br>
							 Nama:<input type="text" name="namabaru" placeholder="Nama" value="<?= $nama; ?>" class="form-control" required>
                            <br>
                             Alamat:<input type="text" name="alamat" placeholder="Alamat" value="<?= $alamat; ?>" class="form-control">
                            <br> 
							 Kode Kota:<input type="number" name="kode_kota" min="4" maxlength="4" placeholder="Kode Kota" value="<?= $kode_kota; ?>" class="form-control">
                            <br>
							 Angkatan:<input type="number" name="angkatan" min="4" maxlength="4" placeholder="Angkatan" value="<?= $angkatan; ?>" class="form-control">
                            <br>
							 Jalur Masuk:<input type="text" name="jalur_masuk" placeholder="Jalur Masuk" value="<?= $jalur_masuk; ?>" class="form-control">
                            <br>
							 Email:<input type="text" name="email" placeholder="Email" value="<?= $email; ?>" class="form-control">
                            <br>
							 No HP:<input type="number" name="no_hp" placeholder="No HP" value="<?= $no_hp; ?>" class="form-control">
                            <br>
							 Status:<input type="text" name="status" placeholder="Status" value="<?= $status; ?>" class="form-control">
                            <br>
							 Kode Wali:<input type="number" name="kode_wali" placeholder="Kode Wali" value="<?= $kode_wali; ?>" class="form-control">
                            <br>
							 Semester:<input type="number" name="semester" min="1" maxlength="1" placeholder="Semester" value="<?= $semester; ?>" class="form-control">
                            <br>
							<br>
                            <button type="submit" class="btn btn-primary" name="updatemahasiswa">Submit</button>
                            </div>
                        </form>
					  </div>

					  <!-- Modal footer -->
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
					  </div>

					</div>
				  </div>
				</div>
				
				<!-- Tambah Modal -->
				<div class="modal fade" id="Tambah">
					<div class="modal-dialog">
						<div class="modal-content">

							<!-- Modal Header -->
							<a class="nav-link" href="add_mahasiswa.php">
								<button type="button" class="btn btn-primary">
									Tambah Mahasiswa
								</button>
							</a>
							<div class="card-body">

								<!-- Modal body -->
								<form method="POST">
									<div class="modal-body">
										<input type="number" name="nimmahasiswa" placeholder="NIM" class="form-control" required>
										<br>
										<input type="text" name="namabaru" placeholder="Nama" class="form-control" required>
										<br>
										<input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
										<br> 
										<input type="number" name="kode_kota" placeholder="Kode Kota" class="form-control" required>
										<br>
										<input type="number" name="angkatan" min="4" max="4" placeholder="Angkatan" class="form-control" required>
										<br>
										<input type="text" name="jalur_masuk" placeholder="Jalur Masuk" class="form-control" required>
										<br>
										<input type="text" name="email" placeholder="Email" class="form-control" required>
										<br>
										<input type="number" name="no_hp" placeholder="No HP" class="form-control" required>
										<br>
										<input type="text" name="status" placeholder="Status" class="form-control" required>
										<br>
										<input type="number" name="kode_wali" placeholder="Kode Wali" class="form-control" required>
										<br>
										<input type="number" name="semester" placeholder="Semester" class="form-control" required>
										<br>
									</div>
								</form>
							</div>
						</div>
					</div>
				
				<!-- Delete Modal -->
				<div class="modal fade" id="Delete<?= $nim; ?>">
				  <div class="modal-dialog">
					<div class="modal-content">

					  <!-- Modal Header -->
					  <div class="modal-header">
						<h4 class="modal-title">Delete Mahasiswa</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					  </div>

					  <!-- Modal body -->
					  <form method="POST">
                        <div class="modal-body">
                         Hapus Mahasiswa <?= $email; ?>?
                             <br><br>
                             <button type="submit" class="btn btn-primary" name="hapusmahasiswa">Hapus</button>
                             <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                      </form>
					</div>
				  </div>
				</div>
			</td>
			<?php
			  }
			?>
        </tr>
		</tbody>
    </table>
    </div>
  </div>
</body>
</section>

<script src="../library/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>$(document).ready(function () {
    $('#example').DataTable();
});</script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


  
 </html>
