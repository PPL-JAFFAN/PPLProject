<?php
require '../function.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
  header("location:../login.php");
}
$queryIRS= mysqli_query($conn,"select * from tb_irs_diambil WHERE nim=".$_SESSION['nim']);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
  <link rel="stylesheet" href="../library/css/style.css">
  <link rel="stylesheet" href="mhs.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="" alt="" class="logo-undip">
      <div class="logo_name">Universitas Diponegoro</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">

      <li>
        <a href="mhs_profil.php">
          <i class='bx bx-home' id="icon"></i>
          <span class="links_name">Profil</span>
        </a>
        <span class="tooltip">Profil</span>
      </li>
      <li>
        <a href="mhs_irs.php">
          <i class='bx bxs-bar-chart-alt-2' id="icon"></i>
          <span class="links_name">Buat IRS</span>
        </a>
        <span class="tooltip">Buat IRS</span>
      </li>
      <li>
      <li>
        <a href="mhs_irs_diambil.php">
          <i class='bx bxs-bar-chart-alt-2' id="icon"></i>
          <span class="links_name">Data IRS</span>
        </a>
        <span class="tooltip">Data IRS</span>
      </li>
      <li>
        <a href="mhs_khs.php">
          <i class='bx bx-pie-chart-alt-2' id="icon"></i>
          <span class="links_name">
            <Datag>Data KHS</Datag>
          </span>
        </a>
        <span class="tooltip">Data KHS</span>
      </li>
      <li>
        <a href="mhs_pkl.php">
          <i class='bx bxs-graduation' id="icon"></i>
          <span class="links_name">Data PKL</span>
        </a>
        <span class="tooltip">Data PKL</span>
      </li>
      <li>
        <a href="mhs_skripsi.php">
          <i class='bx bxs-bar-chart-alt-2' id="icon"></i>
          <span class="links_name">Data Skripsi</span>
        </a>
        <span class="tooltip">Data Skripsi</span>
      </li>
      <li>
        <a href="../logout.php">
          <i class='bx bx-log-out' id="log_out"></i>
          <span class="links_name">Keluar</span>
        </a>
        <span class="tooltip">Keluar</span>
      </li>

      <?php
      $skripsiDetail = getSkripsiDetail($_SESSION['nim']);
      $mhsDetail = getMhsDetail($_SESSION['nim']);
      $dosenwaliDetail = getDosenDetail($mhsDetail['kode_wali']);
      $nim = $_SESSION['nim'];
      $irsDetail = getIrsDetail($_SESSION['nim']);
      //getMatkul belum fix untuk parameter
      $matkulDetail = getMatkul(1);
      ?>


      <li class="profile">
        <div class="profile-details">
          <!--<img src="profile.jpg" alt="profileImg">-->
          <div class="name_job">
            <div class="name"><?php echo $mhsDetail['nama']; ?></div>
            <div class="job"><?php echo $mhsDetail['email']; ?></div>
          </div>
        </div>
        <i class="fa fa-bars" id="bars"></i>>
      </li>
    </ul>
  </div>

  <section class="home-section">
    <!--Selection utk menampilkan irs yang dapat diambil per semester-->
    <div class="container2">
      <div class="mt-4">
        <form action="" method="POST">
          <div class="form-group">
            PILIH MATA KULIAH
          </div>
        </form>
        <br>
      </div>

      <!--Bagian table IRS-->
      <div class="card">
        <div class="card-body">
          <table class="table" width="100%" id="irscontent">
            <thead>
              <tr>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Kode Matkul</th>
                <th scope="col">Waktu</th>
                <th scope="col">Jumlah SKS</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jenis Pembelajaran</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php

              while ($data = mysqli_fetch_assoc($matkulDetail)) {
                $matkul = $data['matakuliah'];
                $kode_mk = $data['kode_mk'];
                $waktu = $data['waktu'];
                $bobot = $data['sks'];
                $kelas = $data['kelas'];
                $pembelajaran = $data['pembelajaran'];
              ?>

                <tr>
                  <th scope="row"><?= $matkul ?></th>
                  <td><?= $kode_mk; ?></td>
                  <td><?= $waktu; ?></td>
                  <td><?= $bobot; ?></td>
                  <td><?= $kelas; ?></td>
                  <td><?= $pembelajaran; ?></td>
                  <td>
                    <?php 
                    $status = false;
                    while ($dataIRS = $queryIRS->fetch_object()) {
                            if ($dataIRS->kode_mk == $kode_mk){
                              $status = true;
                            }
                           }
                    if ($status){
                      $status_add = "<button type='button' class='btn btn-danger' disabled id='$kode_mk'> ADDED </button>";
                    }
                    else{
                      $status_add = "<button type='button' class='btn btn-primary' onclick='add_irs(\"$kode_mk\")' id='$kode_mk'> ADD </button>" ;
                    }?>
                    <?php echo $status_add?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
</body>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload Berkas IRS</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="number" name="semester" min="1" max="14" class="form-control" placeholder="semester">
          <br>
          <input type="file" name="file" class="form-control">
          <br><br>
          <button type="submit" class="btn btn-primary" name="uploadIrs">Upload</button>
          <br>
        </div>
      </form>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script src="../library/js/script.js"> </script>
  <script src="ajax.js"></script>

</html>