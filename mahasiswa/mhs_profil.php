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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../library/css/style.css">
    <link rel="stylesheet" href="mhs.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
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
      $dosenwaliDetail = getDosenDetail($mhsDetail['kode_wali']);
      $khsDetail = getKhsDetail($_SESSION['nim']);
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


    <span onclick="" id="notif" class='bi bi-bell-fill'></span>
    <section class="home-section">
        <!---Card Informasi Data diri mahasiswa-->

        <div class="container">
            <!--write in one line-->
            <div class="row">
                <div class="col">
                    <h3>Profil</h3>
                </div>
                <div class="col" id="halo">
                    <h5>Halo, <?= $mhsDetail['nama']; ?></h5>
                </div>
            </div>
            <!--Card dari kolom profil mahasiswa-->
            <div class="row" id="datadiri">
                <div class="col-sm-10">
                    <div class="card-body">
                        <p class="card-text">
                        <div class="row">

                            <div class="col-md-3" style="text-align: center;">

                                <img src="../img/default-profile-pic.jpg" width="100" />
                                <!-- show image 
                    <img src="../asset/img/<?php //echo $mhsDetail['foto_mhs']; ?>" alt="foto" width="100px">-->
                                <br>


                                <a href="./edit_mhs.php">
                                    <span class="links_name">Edit</span>
                                </a>
                                <span class="tooltip"></span>

                            </div>

                            <div class="col-sm-2" style="font-weight: bold;">
                                Nama <br>
                                Alamat <br>
                                Angkatan <br>
                                Jalur Masuk <br>
                                Email <br>
                            </div>
                            <div class="col">
                                <div><?php echo $mhsDetail['nama']; ?></div>
                                <div><?php echo $mhsDetail['alamat']; ?></div>
                                <div><?php echo $mhsDetail['angkatan']; ?></div>
                                <div><?php echo $mhsDetail['jalur_masuk']; ?></div>
                                <div><?php echo $mhsDetail['email']; ?></div>
                            </div>
                        </div>
                        </p>
                    </div>

                </div>
            </div>
            <br>
            <!--Card kolom dari Status akademi Mahasiswa-->
            <div class="row">
                <div class="col-sm-5" id="datadiri">
                    <h4>Status Akademik</h4><br>
                    <p class="card-text">
                    <div class="row">
                        <div class="col-sm-5" style="font-weight: bold;">
                            Status <br>
                            Dosen Wali <br>
                            NIP <br>
                            Semester<br>
                        </div>
                        <div class="col">
                            <div><?php echo $mhsDetail['status']; ?></div>
                            <div><?php echo $dosenwaliDetail['nama']; ?></div>
                            <div><?php echo $dosenwaliDetail['nip']; ?></div>
                            <div><?php echo $mhsDetail['semester']; ?></div>
                        </div>
                    </div>
                    </p>
                </div>
                <!--Card kolom dari prestasi akademik mahasiswa-->
                <div class="col-sm-4" id="datadiri">

                    <div class="card-body">
                        <h4>Prestasi Akademik</h4><br>
                        <p class="card-text">
                        <div class="row">

                            <div class="col-sm-5" style="font-weight: bold;">
                                IP Semester<br>
                                IP Kumulatif<br>
                                SKS Kumulatif<br>
                                <br>
                            </div>
                            <div class="col">
                                <div><?php echo $khsDetail['ip_semester']; ?></div>
                                <div><?php echo $khsDetail['ip_kumulatif']; ?></div>
                                <div><?php echo $khsDetail['sks_kumulatif']; ?></div>
                            </div>
                        </div>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    </section>
    <script src="../library/js/script.js"> </script>
</body>

</html>