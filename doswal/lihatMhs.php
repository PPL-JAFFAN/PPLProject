<?php
require_once('../db_login.php');
session_start();

if (!isset($_SESSION['nip'])) {
    header("Location:../index.php");
}

$nim = $_GET['nim'];
$query = "SELECT * FROM tb_mhs WHERE nim = $nim";
$connect = mysqli_query($conn, $query);
$data = $connect->fetch_object();
$semester = $data->semester;

$querykhs = "SELECT * from tb_khs WHERE nim = $nim AND semester = $semester";
$connectkhs = mysqli_query($conn, $querykhs);
$datakhs = $connectkhs->fetch_object();
if (empty($datakhs)) {
    $sks = 0;
    $ipk = 0;
} else {
    $sks = $datakhs->sks_kumulatif;
    $ipk = $datakhs->ip_kumulatif;
}

$queryskripsi = "SELECT * from tb_skripsi WHERE nim = $nim";
$connectskripsi = mysqli_query($conn, $queryskripsi);
$dataskripsi = $connectskripsi->fetch_object();
if (empty($dataskripsi)) {
    $status_skripsi = "BELUM MENGAMBIL";
} else {
    $status_skripsi = $dataskripsi->status_skripsi;
}

$querypkl = "SELECT * from tb_pkl WHERE nim = $nim";
$connectpkl = mysqli_query($conn, $querypkl);
$datapkl = $connectpkl->fetch_object();
if (empty($datapkl)) {
    $status_pkl = "BELUM MENGAMBIL";
} else {
    $status_pkl = $datapkl->status_pkl;
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
    <title>Mahasiswa Skripsi</title>
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
                <a class="nav-link " href="verifMhs.php">
                    <i class='bx bx-chat' id="icon"></i>
                    <span class="links_name">Verifikasi <br>Mahasiswa</span>
                </a>
                <span class="tooltip">Verifikasi Mahasiswa</span>
            </li>
            <li>
                <a class="nav-link active" href="datamhs.php">
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
    <form method="GET" autocomplete="on">
        <section class="home-section">
            <div class="h4 mt-5 w-100 ">Detal Mahasiswa
            </div><br>

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

                            <div class="px-5">
                                <table class="table table-responsive">

                                    <tr>
                                        <th>Nama</th>
                                        <td> <?php echo $data->nama; ?></td>
                                    </tr>
                                    <tr>
                                        <th>NIM</th>
                                        <td> <?php echo $data->nim; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?php echo  $data->alamat; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Angkatan</th>
                                        <td> <?php echo  $data->angkatan; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jalur Masuk</th>
                                        <td> <?php echo $data->jalur_masuk; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td> <?php echo  $data->email; ?></td>
                                    </tr>
                                    <tr>
                                        <th>No HP</th>
                                        <td> <?php echo  $data->no_hp; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td> <?php echo   $data->status; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Semester</th>
                                        <td> <?php echo  $data->semester; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Total SKS diambil</th>
                                        <td> <?php echo  $sks; ?></td>
                                    </tr>
                                    <tr>
                                        <th>IPK</th>
                                        <td> <?php echo  $ipk; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status PKL</th>
                                        <td> <?php echo  $status_pkl; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status Skripsi</th>
                                        <td> <?php echo  $status_skripsi; ?></td>
                                    </tr>

                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </section>