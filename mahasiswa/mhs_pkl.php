<?php
require '../function.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
  header("location:../login.php");
}
$color='';
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
        $pklDetail = getPklDetail($_SESSION['nim']);
        $mhsDetail = getMhsDetail($_SESSION['nim']);

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
        <div class="text">
            <h3>Data Progres PKL</h3>
        </div>
        <div id="datadiri">

            <?php if ($pklDetail['status_pkl'] == 'LULUS'){
              $color = 'green';
            }
            else if ($pklDetail['status_pkl'] == 'BELUM MENGAMBIL'){
              $color = 'red';
            }
            else{
              $color = 'yellow';
            }?>
            <h1 id="title1">Status PKL</h1>
            <h2 style="color:<?php echo $color?>; text-align:center;"><?php echo $pklDetail['status_pkl'];?></h2>
            <h3>Nilai</h3>
            <h2><?php echo $pklDetail['nilai_pkl'];?></h2>
            <h3>Laporan Progres PKL</h3>
            <h3><?php echo $pklDetail['scan_pkl'];?></h3>
        </div>
    </section>
    <script src="../library/js/script.js"> </script>
</body>

</html>