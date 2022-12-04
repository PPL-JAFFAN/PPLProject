<?php
  include '../db_login.php';
  include './aksi.php';
  include '../function.php'
  

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
    <link rel="icon" type="image/x-icon" href="../asset/img/undip.png">

    <style>
      
      .home-section a .card-active{
        color: white;
        background-color: #8974FF;
      }
    </style>
    <style>
				.modal {
				  background: rgba(0, 0, 0, 0.5); 
				}
				.modal-backdrop {
				  display: none;
				}
			  </style>
    <title>SiapIn</title>
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
       <a class="nav-link  " href="./datamhs/datamhs.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Data Mahasiswa</span>
       </a>
       <span class="tooltip">Data Mahasiswa</span>
     </li>
     <li>
       <a class="nav-link " href="./datamhsPKL/mhspkl.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Mahasiswa PKL</span>
       </a>
       <span class="tooltip">Mahasiswa PKL</span>
     </li>
     <li>
       <a class="nav-link" href="./datamhsSkripsi/mhsskripsi.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Mahasiswa Skripsi</span>
       </a>
       <span class="tooltip">Mahasiswa Skripsi</span>
     </li>
     <li>
       <a class="nav-link " href="datadosen.php">
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
           <div class="name_job">
              <div class="name">Operator</div>
              <div class="email">operator@mail.com</div>
           </div>
         </div>
         <i class="fa fa-bars" id="bars"></i>>
     </li>
    </ul>
  </div>
  
  <section class="home-section">
      <div class="container">
      <div class="h4 mt-5 w-100 ">Manajemen Data Mahasiswa
      <button type="button" class="btn btn-danger float-end ms-3" data-bs-toggle="modal" data-bs-target="#myModal">
      Hapus Semua
      </button>

      <a href="./add_mahasiswa.php">
      <button type="button" class="btn btn-primary float-end" >
        Tambah Data Mahasiswa
      </button></div><br></a>

      <div class=" mt-4 mb-4 w-100">Data Mahasiswa Departemen Informatika</div>
      <div class="card p-4 rounded-4">
      <table id="example" class="table   rounded-3" style="width:100%">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Semester</th>
                <th>Email</th>
                <th>Aksi</th>
                <!-- <th>No HP</th> -->
            </tr>
        </thead>
        <tbody>
          <?php
          $ambildata = mysqli_query($conn, 'SELECT * FROM tb_mhs'  );
          $i = 1;
          while ($data = mysqli_fetch_array($ambildata)) {
              $nim = $data['nim'];
              // $id = $data['kode_wali'];
              $nama = $data['nama'];
              $semester = $data['semester'];
              $email = $data['email'];
              $status_mhs = $data['status'];
          ?>

          

        <tr>
          <td><?= $nim ?></td>
          <td><?= $nama; ?></td>
          <td><?= $semester; ?></td>
          <td><?= $email; ?></td>
          <!-- <td><?= $no_hp; ?></td> -->
          <td>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="edit_mhs" data-bs-toggle="modal" data-bs-target="#edit_mhs<?= $nim;?>">Edit</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" name="delete_mhs" data-bs-toggle="modal" data-bs-target="#delete_mhs<?= $nim;?>">Hapus</button>
          </td>
        </tr>
        
          <!-- Edit Modal -->
        <div class="modal fade" id="edit_mhs<?= $nim;?>">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Mahasiswa</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="POST">
              <div class="modal-body">
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="Nama" class="form-control" value="<?= $nama; ?>" required>
                <br>
                <!-- <input type="text" name="nim" placeholder="NIM" class="form-control" value="<?= $nim; ?>"  required>
                <br> -->
                <label for="semester">Semester</label>
                <select name="semester" id="semester" class="form-select" aria-label="Default select example">
                <!-- <option selected><?= $semester; ?></option> -->
                <option value="1" <?php if(isset($semester) && $semester=="1") echo 'selected="true"'; ?> >1</option>
                <option value="2" <?php if(isset($semester) && $semester=="2") echo 'selected="true"'; ?>>2</option>
                <option value="3" <?php if(isset($semester) && $semester=="3") echo 'selected="true"'; ?>>3</option>
                <option value="4" <?php if(isset($semester) && $semester=="4") echo 'selected="true"'; ?>>4</option>
                <option value="5" <?php if(isset($semester) && $semester=="5") echo 'selected="true"'; ?>>5</option>
                <option value="6" <?php if(isset($semester) && $semester=="6") echo 'selected="true"'; ?>>6</option>
                <option value="7" <?php if(isset($semester) && $semester=="7") echo 'selected="true"'; ?>>7</option>
                <option value="8" <?php if(isset($semester) && $semester=="8") echo 'selected="true"'; ?>>8</option>
                <option value="9" <?php if(isset($semester) && $semester=="9") echo 'selected="true"'; ?>>9</option>
                <option value="10" <?php if(isset($semester) && $semester=="10") echo 'selected="true"'; ?>>10</option>
                <option value="11" <?php if(isset($semester) && $semester=="11") echo 'selected="true"'; ?>>11</option>
                <option value="12" <?php if(isset($semester) && $semester=="12") echo 'selected="true"'; ?>>12</option>
                <option value="13" <?php if(isset($semester) && $semester=="13") echo 'selected="true"'; ?>>13</option>
                <option value="14" <?php if(isset($semester) && $semester=="14") echo 'selected="true"'; ?>>14</option>
              </select>
                <br>

                <label for="email">Email</label>
                <input type="hidden" name="id" value="<?= $nim; ?>">
                <input type="email" name="email" placeholder="Email" value="<?= $email; ?>"  class="form-control" required>
                <br>

                <label for="status_mhs">Status Mahasiswa</label>
                <select name="status_mhs" class="form-select" aria-label="Default select example">
                <option selected ><?= $status_mhs; ?></option>
                <option value="Aktif">Aktif</option>
                <option value="NonAktif">NonAktif</option>
                <option value="Cuti">Cuti</option>
                <option value="Lulus">Lulus</option>
                <option value="Undur Diri">Undur Diri</option>
                <option value="DO">Drop Out</option>
              </select>
              <br>
              
                <!-- <input type="text" name="password" placeholder="Password" value="<?= $password; ?>"  class="form-control" required> -->
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="edit_mhs">Submit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
            </form>

              </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="delete_mhs<?= $nim;?>">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Hapus Data Mahasiswa</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="POST">
              <div class="modal-body">
                <input type="hidden" name="id" value="<?= $nim; ?>">
                <h6>Apakah Yakin Akan Menghapus </h6> <?= $nama; ?>
                <br>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="delete_mhs">Hapus</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              </div>
            </form>

              </div>
            </div>
        </div>

        <?php
          }
        ?>

      
     
    </table>
    </div>
  </div>

<!-- The Modal Delete All -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="" method="POST">
        <!-- Modal body -->
        <div class="modal-body">
          Apakah Yakin Untuk Hapus Semua Data Mahasiswa?
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="delete_all_mhs">Ya</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</section>
</body>

<script src="../library/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>




<script>$(document).ready(function () {
    $('#example').DataTable();
});</script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


  
 </html>
