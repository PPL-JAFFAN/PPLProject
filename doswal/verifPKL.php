<?php
require_once('../db_login.php');
session_start();

if (!isset($_SESSION['nip'])){ 
    header ("Location:../login.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
                    <div class="name"><?php echo $_SESSION['nama']?></div>
                        <div class="email"><?php echo $_SESSION['email']?></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <form method="GET" autocomplete="on">
        <section class="home-section">
            <div class="d-flex justify-content-center" id="searchmhs">
                <h3 id="header">Verifikasi PKL Mahasiswa</h3>
                <input class="form-control" type="text" name="nama_mhs" placeholder="Nama Mahasiswa" value=""
                    id="nama_mhs" />
                <input type="submit" class="btn btn-class mt-4" name="cari_mhs" value="Cari" />
            </div>

            <div id="datamhs">
                <h4>Mahasiswa Perwalian</h4>
                <div class="d-flex justify-content-center">
                    <table id="tabelmhs">
                        <tr>
                            <th id="table1">NO. </th>
                            <th id="table1">NAMA </th>
                            <th id="table1">NIM </th>
                            <th id="table1">STATUS PKL </th>
                            <th id="table1">NILAI PKL </th>
                            <th id="table1">SCAN PKL </th>
                            <th id="table2">VERIFIKASI </th>
                        </tr>
                        <?php 

                        $query = "SELECT * FROM tb_pkl JOIN tb_mhs where tb_pkl.nim = tb_mhs.nim AND tb_mhs.kode_wali = ".$_SESSION["kode_wali"]." ORDER BY tb_pkl.verif_pkl";
                        $connect = mysqli_query($conn, $query);
                        $no = 1;

                        if (isset($_GET['cari_mhs'])){
                            $nama_mhs = $_GET['nama_mhs'];
                            $query = "SELECT * FROM tb_pkl JOIN tb_mhs where tb_pkl.nim = tb_mhs.nim && tb_mhs.nama LIKE '%".$nama_mhs."%' AND tb_mhs.kode_wali = ".$_SESSION["kode_wali"]." ORDER BY tb_pkl.verif_pkl";
                            $connect = mysqli_query($conn, $query);
                            $no = 1;
                        }
                        
                    
                    while ($data = $connect->fetch_object()) {
                        $st_verif = $data->verif_pkl;
                        if ($st_verif == "belum"){
                            $selectstatus1 = "selected = true";
                            $selectstatus2 = "";
                        }
                        elseif ($st_verif == "sudah"){
                                $selectstatus1 = "";
                                $selectstatus2 = "selected = true";
                        }
                        echo '<tr id ="rows">';
                        echo '<td id="table1">'.$no.'</td>';
                        echo '<td id="table1">'.$data->nama.'</td>';
                        echo '<td id="table1">'.$data->nim.'</td>';
                        echo '<td id="table1">'.$data->status_pkl.'</td>';
                        echo '<td id="table1">'.$data->nilai_pkl.'</td>';
                        ?>
                        <td id="table1"><button type="button" class="btn btn-primary"
                                onclick="location.href = '../mahasiswa/uploads/<?php echo $data->scan_pkl?>'">Lihat
                                Scan PKL</button></td>
                        <?php echo '
                         <td>
                            <select id="'.$data->nim.'" name="verif_pkl" class="form-control" onchange="changePKL('.$data->nim.')">
                                <option value="belum"'.$selectstatus1.'>Belum</option>
                                <option value="sudah"'.$selectstatus2.'>Sudah</option>
                            </select>
                        </td>'; ?>
                        <?php echo '</tr>';
                        $no = $no+1;
                    }
                  ?>
                    </table>
                </div>
            </div>
        </section>
    </form>
    <p id="db_status"></p>
    <script src="../library/js/script.js"> </script>