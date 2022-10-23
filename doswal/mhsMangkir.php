<?php
require_once('../db_login.php');
session_start();

if (!isset($_SESSION['nip'])){ 
    header ("Location:../login.php");
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
    <link rel="stylesheet" href="doswal.css">
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
                <a href="doswal.php">
                    <i class='bx bx-grid-alt' id="icon"></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="editdosen.php">
                    <i class='bx bx-user' id="icon"></i>
                    <span class="links_name">Edit Data Dosen</span>
                </a>
                <span class="tooltip">Edit Data Dosen</span>
            </li>
            <li>
                <a href="verifMhs.php">
                    <i class='bx bx-chat' id="icon"></i>
                    <span class="links_name">Verifikasi <br>Mahasiswa</span>
                </a>
                <span class="tooltip">Verifikasi Mahasiswa</span>
            </li>
            <li>
                <a href="datamhs.php">
                    <i class='bx bx-pie-chart-alt-2' id="icon"></i>
                    <span class="links_name">Lihat Data <br>Mahasiswa</span>
                </a>
                <span class="tooltip">Lihat Data Mahasiswa</span>
            </li>
            <li>
            <a href="../logout.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                    <span class="links_name">Keluar</span>
                </a>
                <span class="tooltip">Keluar</span>
            </li>
        </ul>
    </div>

    <form method="POST" autocomplete="on">
        <section class="home-section">

            <div class="d-flex justify-content-center" id="searchmhs">
                <h3>Mahasiswa Perwalian Mangkir</h3>
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
                            <th id="table2">AKSI </th>
                        </tr>
                        <?php 
                    $query = "SELECT * FROM tb_mhs WHERE status='Mangkir' AND kode_wali=".$_SESSION['kode_wali'];
                    $connect = mysqli_query($conn, $query);
                    $no = 1;

                    if (isset($_POST['cari_mhs'])){
                        $nama_mhs = $_POST['nama_mhs'];
                        $query = "SELECT * FROM tb_mhs where nama like '%".$nama_mhs."%' AND status='Mangkir' AND kode_wali=".$_SESSION['kode_wali'];
                        $connect = mysqli_query($conn, $query);
                        $no = 1;
                    }
                    
                    while ($data = $connect->fetch_object()) {
                        echo '<tr>';
                        echo '<td id="table1">'.$no.'</td>';
                        echo '<td id="table1">'.$data->nama.'</td>';
                        echo '<td id="table1">'.$data->nim.'</td>';
                        ?><td id="table2"><button type="button" class="btn btn-primary"
                                onclick="location.href = 'lihatMhs.php?nim=<?php echo $data->nim ?>'">Lihat
                                Mahasiswa</button></td>
                        <?php echo '</tr>';
                        $no = $no+1;
                    }
                
                  ?>
                    </table>
                </div>
            </div>

        </section>
    </form>
    <script src="../library/js/script.js"> </script>
</body>

</html>