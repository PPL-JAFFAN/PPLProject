<?php
require '../function.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
  header("location:../login.php");
}

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
    .home-section a .card-active {
      color: white;
      background-color: #8974FF;
    }
  </style>
  <title>Profil Mahasiswa</title>
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i> <img src="../asset/img/undip.png" style="width:40px ; padding-bottom:5px" alt=""></i>
      <div class="logo_name" style="padding-top: 5px;">
        <div style="font-size:10px ;">Departemen Informatika</div> Universitas Diponegoro
      </div>
    </div>
    <ul class="nav-list">

      <li>
        <a href="mhs_profil.php" class="nav-link active ">
          <i class='bx bx-home' id="icon"></i>
          <span class="links_name">Profil</span>
        </a>
        <span class="tooltip">Profil</span>
      </li>
      <li>
        <a href="mhs_irs.php">
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
      // get detail mahasiswa
      $mhsDetail = getMhsDetail($_SESSION['nim']);

      ?>
      <li class="profile">
        <div class="profile-details">
          <!--<img src="profile.jpg" alt="profileImg">-->
          <div class="name_job">
            <div class="name"><?php echo $mhsDetail['nama']; ?></div>
            <div class="email"><?php echo $mhsDetail['email']; ?></div>
          </div>
        </div>
        <i class="fa fa-bars" id="bars"></i>>
      </li>
    </ul>
  </div>

  <section class="home-section">
    <div class="container-fluid">

      <?php
      // get detail mahasiswa
      $mhsDetail = getMhsDetail($_SESSION['nim']);
      $dosenwaliDetail = getDosenDetail($mhsDetail['kode_wali']);
      $khsDetail = getKhsDetail($_SESSION['nim']);
      $mhsKota = getKotaKabupaten($mhsDetail['kode_kota']);
      $mhsProv = getProvinsi($mhsKota['id_provinsi']);
      $_SESSION['semester'] = $mhsDetail['semester'];
      ?>

      <!---Card Informasi Data diri mahasiswa-->

      <!--write in one line-->
      <div class="h4 mt-5 w-100 ">Profil
        <div class="h4 float-end">
          <h4>Halo, <?= $mhsDetail['nama']; ?></h4>
        </div>
      </div><br>

      <!--Card dari kolom profil mahasiswa-->

      <div class="row row-cols-1 row-cols-md-1 g-4 mt-1">

        <div class="col">
          <div class="card rounded-4 card-active ">
            <div class="card-body">
              <div class="text-center my-3">
                <img class="rounded-3" src="../img/default-profile-pic.jpg" width="100" />
                <!-- show image 
                        <img src="../asset/img/<?php //echo $mhsDetail['foto_mhs']; 
                                                ?>" alt="foto" width="100px">-->
                <br>
              </div>


              <a href="./edit_mhs.php">
                <div class="text-center">
                  <span class="links_name ">Edit</span>
                </div>
              </a>
              <span class="tooltip"></span>

              <div class="px-5">
                <table class="table table-responsive">

                  <tr>
                    <th>Nama</th>
                    <td> <?php echo $mhsDetail['nama']; ?></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><?php echo $mhsDetail['alamat']; ?></td>
                  </tr>
                  <tr>
                    <th>Kota/Kabupaten</th>
                    <td> <?php echo $mhsKota['nama']; ?></td>
                  </tr>
                  <tr>
                    <th>Provinsi</th>
                    <td> <?php echo $mhsProv['nama']; ?></td>
                  </tr>
                  <tr>
                    <th>Angkatan</th>
                    <td> <?php echo $mhsDetail['angkatan']; ?></td>
                  </tr>
                  <tr>
                    <th>Jalur Masuk</th>
                    <td> <?php echo $mhsDetail['jalur_masuk']; ?></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td> <?php echo $mhsDetail['email']; ?></td>
                  </tr>
                  <tr>
                    <th>NIM</th>
                    <td> <?php echo $_SESSION['nim']; ?></td>
                  </tr>
                </table>
              </div>

            </div>
          </div>

        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-2 g-4 mt-1">
        <div class="col">
          <div class="card rounded-4 card-active ">
            <div class="card-body">
              <table class="table table-responsive">
                <tr>
                  <th>Status</th>
                  <td> <?php echo $mhsDetail['status']; ?></td>
                </tr>
                <tr>
                  <th>Dosen Wali</th>
                  <td><?php echo $dosenwaliDetail['nama']; ?></td>
                </tr>
                <tr>
                  <th>NIP</th>
                  <td> <?php echo $dosenwaliDetail['nip']; ?></td>
                </tr>
                <tr>
                  <th>Semester</th>
                  <td><?php echo $mhsDetail['semester']; ?></td>
                </tr>
              </table>

            </div>
          </div>

        </div>
        <div class="col">
          <div class="card rounded-4 card-active ">
            <div class="card-body">
              <table class="table table-responsive">
                <tr>
                  <th>IP Semester</th>
                  <td><?php echo $khsDetail['ip_semester']; ?></td>
                </tr>
                <tr>
                  <th>IP Kumulatif</th>
                  <td><?php echo $khsDetail['ip_kumulatif']; ?></td>
                </tr>
                <tr>
                  <th>SKS Kumulatif</th>
                  <td> <?php echo $khsDetail['sks_kumulatif']; ?></td>
                </tr>

              </table>
            </div>
          </div>

        </div>
      </div>
    </div>


    <!-- <div class="text">Selamat Datang, <?php echo $mhsDetail['nama']; ?> !!!</div> -->
  </section>



  <script src="../library/js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>



</html>