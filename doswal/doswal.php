<?php
require_once('../db_login.php');
require '../function.php';
session_start();

if (isset($_SESSION['nip'])) {
    $nip = $_SESSION['nip'];
    $query = mysqli_query($conn, "select * from tb_dosen where nip='$nip'");

    $cek = mysqli_num_rows($query);
    $dosen = mysqli_fetch_assoc($query);

    $kode_kota = $dosen['kode_kota'];
    $querykota = mysqli_query($conn, "select * from tb_kota where id=$kode_kota");
    $kota = mysqli_fetch_assoc($querykota);
    if (empty($kota)) {
        $namakota = '';
        $namaprov = '';
    } else {
        $namakota = $kota['nama'];
        $id_prov = $kota['id_provinsi'];

        $queryprov = mysqli_query($conn, "select * from tb_propinsi where id=$id_prov");
        $prov = mysqli_fetch_assoc($queryprov);
        $namaprov = $prov['nama'];
    }


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
    <link rel="icon" type="image/x-icon" href="../asset/img/undip.png">
    <title>SiapIn</title>
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
                        <div class="name"><?php echo $_SESSION['nama'] ?></div>
                        <div class="email"><?php echo $_SESSION['email'] ?></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>


    <section class="home-section">
        <div class="container container-fluid">
            <div class="h4 mt-5 w-100 ">Profil
                <div class="h4 float-end">
                    <h4>Halo, <?= $namadosen; ?></h4>
                </div>
            </div><br>

            <div class="row row-cols-1 row-cols-md-1 g-4 mt-1">
                <div class="col">
                    <div class="card rounded-4 card-active ">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="rounded-4 m-3" src="../img/default-profile-pic.jpg" width="140" />
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-warning"
                                    onclick="location.href = 'editdosen.php'">Edit
                                    data diri</button>
                            </div>
                        </div>

                        <div class="px-5">
                            <table class="table table-responsive">

                                <tr>
                                    <th>Nama Lengkap : </th>
                                    <td> <?php echo $namadosen; ?></td>
                                </tr>
                                <tr>
                                    <th>NIP :</th>
                                    <td><?php echo $nip; ?></td>
                                </tr>
                                <tr>
                                    <th>Kode Wali :</th>
                                    <td> <?php echo $kodewali; ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat :</th>
                                    <td> <?php echo $alamat; ?></td>
                                </tr>
                                <tr>
                                    <th>Kabupaten/Kota :</th>
                                    <td> <?php echo $namakota; ?></td>
                                </tr>
                                <tr>
                                    <th>Propinsi :</th>
                                    <td> <?php echo $namaprov; ?></td>
                                </tr>
                                <tr>
                                    <th>Email :</th>
                                    <td> <?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <th>No. HP :</th>
                                    <td> <?php echo $nohp; ?></td>
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
                <div class="col">
                    <a href="datamhs.php">
                        <div class="card rounded-4 ">
                            <div class="card-body">
                                <p class="text-center">Jumlah Mahasiswa Perwalian</p>
                                <p class="card-text jumlah text-center"><?= $noPerwalian; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="mhsAktif.php">
                        <div class="card rounded-4 ">
                            <div class="card-body">
                                <p class="text-center">Mahasiswa Perwalian Aktif</p>
                                <p class="card-text jumlah text-center"><?= $noAktif; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="mhsSkripsi.php">
                        <div class="card rounded-4 ">
                            <div class="card-body">
                                <p class="text-center">Mahasiswa Perwalian Lulus Skripsi</p>
                                <p class="card-text jumlah text-center"><?= $noSkripsi; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
                <div class="col">
                    <a href="mhsCuti.php">
                        <div class="card rounded-4 ">
                            <div class="card-body">
                                <p class="text-center">Mahasiswa Perwalian Cuti</p>
                                <p class="card-text jumlah text-center"><?= $noCuti; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="mhsPKL.php">
                        <div class="card rounded-4 ">
                            <div class="card-body">
                                <p class="text-center">Mahasiswa Perwalian Sudah PKL</p>
                                <p class="card-text jumlah text-center"><?= $noPKL; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="mhsMangkir.php">
                        <div class="card rounded-4 ">
                            <div class="card-body">
                                <p class="text-center">Mahasiswa Perwalian Mangkir</p>
                                <p class="card-text jumlah text-center"><?= $noMangkir; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        </div>
    </section>

    <script src="../library/js/script.js"> </script>
</body>

</html>