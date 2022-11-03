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
    <title>Data Dosen</title>
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
       <a class="nav-link active" href="datadosen.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Data Dosen</span>
       </a>
       <span class="tooltip">Data Dosen</span>
     </li>
	 <li>
       <a class="nav-link" href="manajemenakun.php">
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
      <div class="h4 mt-5 w-100 ">Rekap Data Dosen
      </div><br>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_dosen">
        Tambah Data Dosen
      </button>
    </div>

      <div class="row row-cols-1 row-cols-md-1 g-4 mt-1">

          <?php
          $ambildata = mysqli_query($conn, "SELECT * FROM tb_dosen ");
          $dosen = 0;
          while ($data = mysqli_fetch_array($ambildata)) {
              $dosen++;
              }
          ?>
        <div class="col">
          <a href="datadosen.php">
          <div class="card rounded-4 ">
            <div class="card-body">
              <p class="text-center">Jumlah Dosen</p>
              <p class="card-text jumlah text-center"><?= $dosen; ?></p>
            </div>
          </div>
          </a>
        </div>
      </div>

      <br>
      <div class="h5 mt-4 mb-4 w-100">Data Dosen Departemen Informatika</div>
      <div class="card p-4 rounded-4">
      <table id="example" class="table  bg-light rounded-3" style="width:100%">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <!-- <th>Alamat</th> -->
                <th>Email</th>
                <th>Aksi</th>
                <!-- <th>No HP</th> -->
            </tr>
        </thead>
        <tbody>
          <?php
          $ambildata = mysqli_query($conn, 'SELECT * FROM tb_dosen'  );
          $i = 1;
          while ($data = mysqli_fetch_array($ambildata)) {
              $nip = $data['nip'];
              // $id = $data['kode_wali'];
              $nama = $data['nama'];
              // $alamat = $data['alamat'];
              $email = $data['email'];
              // $no_hp = $data['no_hp'];
              // $password = $data['password'];
              
             

          
          ?>

          

        <tr>
          <td><?= $nip ?></td>
          <td><?= $nama; ?></td>
          <!-- <td><?= $alamat; ?></td> -->
          <td><?= $email; ?></td>
          <!-- <td><?= $no_hp; ?></td> -->
          <td>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="edit_dosen" data-bs-toggle="modal" data-bs-target="#edit_dosen<?= $nip;?>">Edit</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" name="delete_dosen" data-bs-toggle="modal" data-bs-target="#delete_dosen<?= $nip;?>">Hapus</button>
          </td>
        </tr>
        
          <!-- Edit Modal -->
        <div class="modal fade" id="edit_dosen<?= $nip;?>">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Dosen</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="POST">
              <div class="modal-body">
                <input type="text" name="nama" placeholder="Nama" class="form-control" value="<?= $nama; ?>" required>
                <br>
                <!-- <input type="text" name="nip" placeholder="NIP" class="form-control" value="<?= $nip; ?>"  required>
                <br> -->
                <input type="hidden" name="id" value="<?= $nip; ?>">
                <input type="email" name="email" placeholder="Email" value="<?= $email; ?>"  class="form-control" required>
                <br>
                <!-- <input type="text" name="password" placeholder="Password" value="<?= $password; ?>"  class="form-control" required> -->
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="edit_dosen">Submit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
            </form>

              </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="delete_dosen<?= $nip;?>">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Hapus Data Dosen</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="POST">
              <div class="modal-body">
                <input type="hidden" name="id" value="<?= $nip; ?>">
                <h6>Apakah Yakin Akan Menghapus </h6> <?= $nama; ?>
                <br>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="delete_dosen">Hapus</button>
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
</body>
</section>

  <!-- Add Modal -->
  <div class="modal fade" id="add_dosen">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Dosen</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <form method="POST">
            <div class="modal-body">
              <input type="text" name="nama" placeholder="Nama" class="form-control" required>
              <br>
              <input type="text" name="nip" placeholder="NIP" class="form-control" required>
              <br>
              <input type="email" name="email" placeholder="Email" class="form-control" value="" required>
              <br>
              <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
             <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="add_dosen">Submit</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </form>

        </div>
      </div>
  </div>

  

  

<script src="../library/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/PapaParse/4.6.3/papaparse.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="../../extensions/Editor/js/dataTables.editor.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>




<script>$(document).ready(function () {
    $('#example').DataTable();
});</script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


  
 </html>
