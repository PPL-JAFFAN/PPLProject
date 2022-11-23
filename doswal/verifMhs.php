<?php
require_once('../db_login.php');
session_start();

if (!isset($_SESSION['nip'])) {
    header("Location:../index.php");
}
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../library/css/style.css">
    <link rel="stylesheet" href="doswal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Verifikasi Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">



</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i> <img src="../asset/img/undip.png" style="width:40px ; padding-bottom:5px" alt=""></i>
            <div class="logo_name" style="padding-top: 5px;">
                <div style="font-size:10px ;">Departemen Informatika</div> Universitas Diponegoro
            </div>
        </div>
        <ul class="nav-list" id="nav-list">
            <li>
                <a class="nav-link " href="doswal.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a class="nav-link" href="editdosen.php">
                    <i class='bx bx-user' id="icon"></i>
                    <span class="links_name">Edit Data Dosen</span>
                </a>
                <span class="tooltip">Edit Data Dosen</span>
            </li>
            <li>
                <a class="nav-link active" href="verifMhs.php">
                    <i class='bx bx-chat' id="icon"></i>
                    <span class="links_name">Verifikasi <br>Mahasiswa</span>
                </a>
                <span class="tooltip">Verifikasi Mahasiswa</span>
            </li>
            <li>
                <a class="nav-link" href="datamhs.php">
                    <i class='bx bx-pie-chart-alt-2' id="icon"></i>
                    <span class="links_name">Lihat Data <br>Mahasiswa</span>
                </a>
                <span class="tooltip">Lihat Data Mahasiswa</span>
            </li>

            <li>
                <a class="nav-link" href="../logout.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                    <span class="links_name">Keluar</span>
                </a>
                <span class="tooltip">Keluar</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <!-- <img src="undip.png" alt="profileImg"> -->
                    <div class="name_job">
                        <div class="name"><?php echo $_SESSION['nama'] ?></div>
                        <div class="email"><?php echo $_SESSION['email'] ?></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>


    <section class="home-section">
        <div class="container container-fluid">
            <div class="h4 mt-5 w-100 ">Verifikasi Mahasiswa</div><br>
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-1">
                <div class="col">
                    <a href="verifIRS.php">
                        <div class="card rounded-4 ">
                            <div class="card-body">
                                <p class="h3 m-4 text-center">Data IRS</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="verifKHS.php">
                        <div class="card rounded-4 ">
                            <div class="card-body">
                                <p class="h3 m-4 text-center">Data KHS</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-4 mt-1">
                <div class="col">
                    <a href="verifPKL.php">
                        <div class="card rounded-4 ">
                            <div class="card-body">
                                <p class="h3 m-4 text-center">Data PKL</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="verifSkripsi.php">
                        <div class="card rounded-4 ">
                            <div class="card-body">
                                <p class="h3 m-4 text-center">Data SKRIPSI</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

    </section>

    <script src="../library/js/script.js"> </script>
</body>

</html>