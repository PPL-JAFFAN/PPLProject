<?php
  include'../../../db_login.php';

?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../../style.css">
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

    <title>Data Mahasiswa</title>
  
  <style>
    .home-section a .card-active{
      color: white;
      background-color: #8974FF;}
  </style>
   
    </head>
<body>
  <div class="sidebar">
  <div class="logo-details">
      <i> <img src="../asset/img/undip.png" style="width:40px ; padding-bottom:5px" alt=""></i>
        <div class="logo_name" style="padding-top: 5px;"> <div style="font-size:10px ;">Departemen Informatika</div>  Universitas Diponegoro</div>
    </div>
    <ul class="nav-list" id="nav-list">
      <li>
        <a class="nav-link " href="../../index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
       <a class="nav-link " href="../../datamhs.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Data Mahasiswa</span>
       </a>
       <span class="tooltip">Data Mahasiswa</span>
     </li>
     <li>
       <a class="nav-link " href="../../mhspkl.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Mahasiswa PKL</span>
       </a>
       <span class="tooltip">Mahasiswa PKL</span>
     </li>
     <li>
       <a class="nav-link active " href="../../mhsskripsi.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Mahasiswa Skripsi</span>
       </a>
       <span class="tooltip">Mahasiswa Skripsi</span>
     </li>
     <li>
       <a class="nav-link" href="../../datadosen.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Data Dosen</span>
       </a>
       <span class="tooltip">Data Dosen</span>
     </li>
     <li>
       <a class="nav-link" href="../../../logout.php">
         <i class="bi bi-box-arrow-right"></i>
         <span class="links_name">Keluar</span>
       </a>
       <span class="tooltip">Keluar</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <!-- <img src="undip.png" alt="profileImg"> -->
           <div class="name_job">
             <div class="name">Departemen</div>
             <div class="email">Informatika</div>
           </div>
         </div>
     </li>
    </ul>
  </div>
  
  <section class="home-section">
    <div class="container-fluid">
      <div class="h4 mt-5 w-100 ">Data Mahasiswa Skripsi
      <div class="dropdown float-end">
      <a class="btn btn-primary dropdown-toggle" href="mhspkl.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        2021
      </a>

      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="../../mhsskripsi.php">Semua</a></li>
        <li><a class="dropdown-item" href="2016.php">2016</a></li>
        <li><a class="dropdown-item" href="2017.php">2017</a></li>
        <li><a class="dropdown-item" href="2018.php">2018</a></li>
        <li><a class="dropdown-item" href="2019.php">2019</a></li>
        <li><a class="dropdown-item" href="2020.php">2020</a></li>
        <li><a class="dropdown-item" href="2021.php">2021</a></li>
        <li><a class="dropdown-item" href="2022.php">2022</a></li>

      </ul>
    </div>
      </select>
      </div><br>

      <div class="row row-cols-1 row-cols-md-2 g-4 mt-1">

      <?php
          $ambildata = mysqli_query($conn, "SELECT * FROM tb_mhs m, tb_skripsi p WHERE  m.nim = p.nim AND verif_skripsi = 'sudah' AND angkatan ='2021'");
          $sudah = 0;
          while ($data = mysqli_fetch_array($ambildata)) {
              $sudah++;
              }

          $ambildata = mysqli_query($conn, "SELECT * FROM tb_mhs m, tb_skripsi p WHERE  m.nim = p.nim AND verif_skripsi = 'belum' AND angkatan ='2021'");
          $belum = 0;
          while ($data = mysqli_fetch_array($ambildata)) {
              $belum++;
              }

      ?>

        <div class="col">
          <a href="2021.php">
          <div class="card rounded-4 card-active  ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Sudah Skripsi</p>
              <p class="card-text jumlah text-center"><?=$sudah;?></p>
            </div>
          </div>
          </a>
        </div>
        <div class="col">
          <a href="../belum/2021.php">
          <div class="card rounded-4 ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Belum Skripsi</p>
              <p class="card-text jumlah text-center"><?=$belum;?></p>
            </div>
          </div>
          </a>
        </div>
      </div>

      <br>
      <div class="h5 mt-4 mb-4 w-100">Mahasiswa Sudah Lulus Skripsi</div>
      <div class="card p-4 rounded-4">
      <table id="example" class="table  bg-light rounded-3" style="width:100%">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Angkatan</th>
                <th>Email</th>
                <!-- <th>No HP</th> -->
                <th>Status Skripsi</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $ambildata = mysqli_query($conn, 'SELECT * FROM tb_mhs m, tb_skripsi p WHERE  m.nim = p.nim AND verif_skripsi = "sudah" AND angkatan ="2021"'  );
          $i = 1;
          while ($data = mysqli_fetch_array($ambildata)) {
              $nim = $data['nim'];
              $nama = $data['nama'];
              $angkatan = $data['angkatan'];
              $email = $data['email'];
              // $no_hp = $data['no_hp'];
              $status = $data['verif_skripsi'];
              $semester = $data['semester'];
          ?>

        <tr>
          <td><?= $nim ?></td>
          <td><?= $nama; ?></td>
          <td><?= $angkatan; ?></td>
          <td><?= $email; ?></td>
          <!-- <td><?= $no_hp; ?></td> -->
          <td><?= $status; ?></td>
          <td><?= $semester; ?></td>
        </tr>

        <?php
          }
        ?>

      
     
    </table>
    </div>




    </div>
</body>
     
</section>



<script src="../library/js/script.js"></script>
<script></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>$(document).ready(function () {
    $('#example').DataTable();
});</script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


  
 </html>
