<?php
  include '../db_login.php';
  include './aksi.php';
  include '../function.php';


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

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
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
       <a class="nav-link " href="manajemenakun.php">
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
   
      <div class="h4 mt-5 w-100 ">Tambah Data Dosen
      
      <a href="add_dosen.php">
      <button type="button" class="btn btn-primary float-end" >
        Import
      </button></div><br></a>

      <div class="card p-5 rounded-4 mt-3">

      <form method="POST" autocomplete="on"  name="form">
        <div class="form-group mb-4 mt-3">
            <label class="h6" for="nama">Nama</label>
            <input type="text" name="nama" placeholder="Nama" class="form-control"  value="<?php if(isset($nama)) {echo $nama;} ?>">
            <div class="error text-danger fst-italic"> <?php if(isset($error_nama)) echo $error_nama; ?> </div>
        </div>

        <div class="form-group  mb-4">
            <label class="h6" for="nip">NIP</label>
            <input type="text" name="nip" placeholder="NIP" class="form-control" value="<?php if(isset($nip)) {echo $nip;} ?>">
            <div class="error text-danger fst-italic"> <?php if(isset($error_nip)) echo $error_nip; ?> </div>

        </div>

        <div class="form-group  mb-4">
            <label class="h6" for="email">Email</label>
            <input type="email" name="email" placeholder="Email" class="form-control" value="<?php if(isset($email)) {echo $email;} ?>" >
            <div class="error text-danger fst-italic"> <?php if(isset($error_email)) echo $error_email; ?> </div>

        </div>

        <button type="submit" name="add_dosen" value="add_dosen" class="btn btn-primary w-100 mb-3">Submit</button>
    </form>

    </div>
  </div>
</body>
</section>






  

  

  <script src="../library/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="./script.js"></script>




<script>$(document).ready(function () {
    $('#example').DataTable();
});</script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
 </html>
