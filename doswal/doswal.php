<?php
require_once('../db_login.php');
require '../function.php';
session_start();

if (isset($_SESSION['nip'])) {

    $nip = $_SESSION['nip'];
    $query = mysqli_query($conn, "select * from tb_dosen where nip='$nip'");
    $cek = mysqli_num_rows($query);
    $dosen = mysqli_fetch_assoc($query);
    $namadosen = $dosen['nama'];
    $_SESSION['nama'] = $namadosen;
    $kodewali = $dosen['kode_wali'];
    $_SESSION['kode_wali'] = $kodewali;
    $alamat = $dosen['alamat'];
    $email = $dosen['email'];
    $_SESSION['email'] = $email;
    $nohp = $dosen['no_hp'];

    $queryPerwalian = mysqli_query($conn, "select * from tb_mhs WHERE tb_mhs.kode_wali=" . $kodewali);
    $noPerwalian = 0;
    $noAktif = 0;
    $noCuti = 0;
    $noMangkir = 0;
    while ($data = $queryPerwalian->fetch_object()) {
        if ($data->status == "Aktif") {
            $noAktif++;
            $noPerwalian++;
        } else if ($data->status == "Cuti") {
            $noCuti++;
            $noPerwalian++;
        } else if ($data->status == "Mangkir") {
            $noMangkir++;
            $noPerwalian++;
        } else {
            $noPerwalian++;
        }
    }

    $queryPKL = mysqli_query($conn, "select * from tb_mhs JOIN tb_pkl ON tb_mhs.nim=tb_pkl.nim WHERE tb_mhs.kode_wali=" . $kodewali . " AND tb_pkl.status_pkl='LULUS'");
    $noPKL = 0;
    while ($queryPKL->fetch_object()) {
        $noPKL++;
    }

    $querySkripsi = mysqli_query($conn, "select * from tb_mhs JOIN tb_skripsi ON tb_mhs.nim=tb_skripsi.nim WHERE tb_mhs.kode_wali=" . $kodewali . " AND tb_skripsi.status_skripsi='LULUS'");
    $noSkripsi = 0;
    while ($querySkripsi->fetch_object()) {
        $noSkripsi++;
    }
} else {
    header("Location: ../login.php");
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
    <title>Data Mahasiswa</title>
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
                <a class="nav-link active" href="doswal.php">
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
                <a class="nav-link" href="verifMhs.php">
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
                        <div class="name"><?php echo $_SESSION['nama']?></div>
                        <div class="email"><?php echo $_SESSION['email']?></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>


    <section class="home-section">

        <h1 id="datadirititle">Home</h1>
        <h3 id="halo">Halo <?php echo $namadosen ?></h3>
        <div id="datadiri">
            <div class="row">
                <div class="col-4">
                    <div class="d-flex justify-content-center">
                        <img src="../img/default-profile-pic.jpg" id="profilepic">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-warning" onclick="location.href = 'editdosen.php'">Edit
                            data
                            diri</button>
                    </div>
                </div>
                <div class="col-8">
                    <h2>Nama lengkap: <?php echo $namadosen ?></h2>
                    <h3>NIP: <?php echo $nip ?></h3>
                    <h3>Kode Wali : <?php echo $kodewali ?></h3>
                    <h3>Alamat : <?php echo $alamat ?></h3>
                    <h3>Kabupaten/Kota : Semarang</h3>
                    <h3>Propinsi : Jawa Tengah </h3>
                    <h3>Email : <?php echo $email ?></h3>
                    <h3>No. HP : <?php echo $nohp ?></h3>

                </div>
            </div>
        </div>


        <div id="stat">
            <div class="row gx-5 justify-content-center">

                <div class="col-lg-4 col-md-12 " id="showstats" onclick="location.href='datamhs.php'">
                    <h3 class="text-center">Mahasiswa Perwalian</h3>
                    <h1 class="text-center"><?php echo $noPerwalian ?></h1>
                </div>

                <div class="col-lg-4 col-md-6" id="showstats" onclick="location.href='mhsAktif.php'">
                    <h3 class="text-center">Mahasiswa Perwalian Aktif</h3>
                    <h1 class="text-center"><?php echo $noAktif ?></h1>
                </div>

                <div class="col-lg-4 col-md-6" id="showstats" onclick="location.href='mhsSkripsi.php'">
                    <h3 class="text-center">Mahasiswa Perwalian Sudah Lulus Skripsi</h3>
                    <h1 class="text-center"><?php echo $noSkripsi ?></h1>
                </div>

            </div>
        </div>
        <div id="stat">
            <div class="row gx-5 justify-content-center">

                <div class="col-lg-4 col-md-12 " id="showstats" onclick="location.href='mhsCuti.php'">
                    <h3 class="text-center">Mahasiswa Perwalian Cuti</h3>
                    <h1 class="text-center"><?php echo $noCuti ?></h1>
                </div>

                <div class="col-lg-4 col-md-6" id="showstats" onclick="location.href='mhsPKL.php'">
                    <h3 class="text-center">Mahasiswa Perwalian Sudah PKL</h3>
                    <h1 class="text-center"><?php echo $noPKL ?></h1>
                </div>

                <div class="col-lg-4 col-md-6" id="showstats" onclick="location.href='mhsMangkir.php'">
                    <h3 class="text-center">Mahasiswa Perwalian Mangkir</h3>
                    <h1 class="text-center"><?php echo $noMangkir ?></h1>
                </div>

            </div>
        </div>

    </section>
    <script src="../library/js/script.js"> </script>
</body>

</html>