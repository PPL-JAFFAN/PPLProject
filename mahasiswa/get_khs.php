<?php
require '../function.php';
require_once '../db_login.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
  header("location:../login.php");
}

$color = '';
$error = '';
$semester = $_GET['semester'];
$khsDetail = getKhsDetail($_SESSION['nim'], $semester);
if (empty($khsDetail)) {
  $exist = 0;
} else {
  $exist = 1;
}
if (isset($_POST['submit'])) {
  $flag = true;
  if ($_POST['sks'] < 0 || $_POST['sks'] > 24) {
    $flag = false;
  }
  if ($_POST['sksk'] < 0) {
    $flag = false;
  }
  if ($_POST['ip'] < 0 || $_POST['ip'] > 4) {
    $flag = false;
  }
  if ($_POST['ipk'] < 0 || $_POST['ipk'] > 4) {
    $flag = false;
  }
  if ($flag) {
    if (uploadDetailKhs($_POST, $semester, $exist)) {
      echo "<script>
      alert('Data berhasil diupdate');
      document.location.href = 'upload_file_khs.php?nim=" . $_SESSION['nim'] . "&smt=" . $semester . "';
      </script>";
    } else {
      echo "<script>
      alert('Data gagal diupdate');
      </script>";
    }
  } else {
    echo "<script>
    alert('Data gagal diupdate');
    </script>";
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
    <style>
    #drop_zone {
        background-color: #eae5e5;
        /* border: #B980F0 5px dashed; */
        border-radius: 20px;
        width: 100%;

        padding: 60px 0;
    }

    #drop_zone p {
        font-size: 20px;
        text-align: center;
    }

    #btn_upload,
    #selectfile {
        display: none;
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
                <a href="mhs_profil.php" class="nav-link ">
                    <i class='bx bx-home' id="icon"></i>
                    <span class="links_name">Profil</span>
                </a>
                <span class="tooltip">Profil</span>
            </li>
            <li>
                <a href="mhs_irs.php" class="nav-link ">
                    <i class='bx bxs-bar-chart-alt-2' id="icon"></i>
                    <span class="links_name">Data IRS</span>
                </a>
                <span class="tooltip">Data IRS</span>
            </li>
            <li>
                <a href="mhs_khs.php" class="nav-link active">
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
                        <div class="job"><?php echo $mhsDetail['email']; ?></div>
                    </div>
                </div>
                <i class="fa fa-bars" id="bars"></i>>
            </li>
        </ul>
    </div>

    <?php
  if (empty($khsDetail['sks'])) {
    $sks = 0;
  } else {
    $sks = $khsDetail['sks'];
  }

  if (empty($khsDetail['sks_kumulatif'])) {
    $sksk = 0;
  } else {
    $sksk = $khsDetail['sks_kumulatif'];
  }

  if (empty($khsDetail['ip_semester'])) {
    $ip = 0;
  } else {
    $ip = $khsDetail['ip_semester'];
  }

  if (empty($khsDetail['ip_kumulatif'])) {
    $ipk = 0;
  } else {
    $ipk = $khsDetail['ip_kumulatif'];
  }

  if (empty($khsDetail['verif_khs'])) {
    $verif = 'belum';
    $color = 'red';
  } else {
    $verif = $khsDetail['verif_khs'];
    if ($verif == 'belum') {
      $color = 'red';
    } else {
      $color = 'green';
    }
  }

  ?>

    <section class="home-section">
        <form method="POST">

            <div class="mx-5">
                <div class="row">
                    <div class="col-sm-10">
                        <h3 class="mb-2">KHS Semester <?php echo $semester ?> </h3>
                    </div>
                    <br>
                </div>
                <div class="row">
                    <div class="col-sm-11">
                        <h3 class="mb-2">SKS :</h3>
                        <input class="form-control mb-2" type="number" name="sks" value="<?php echo $sks ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-11">
                        <h3 class="mb-2">SKS Kumulatif :</h3>
                        <input class="form-control mb-2" type="number" name="sksk" value="<?php echo $sksk ?>" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-11">
                        <h3 class="mb-2">IP :</h3>
                        <input class="form-control mb-2" type="number" name="ip" step="0.01"
                            value="<?php echo $ip ?>" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-11">
                        <h3>IPK : </h3>
                        <input class="form-control mb-2" type="number" name="ipk" step="0.01"
                            value="<?php echo $ipk ?>" />
                    </div>
                </div>

                <div class="row">
                    <h3>Verifikasi oleh dosen : </h3>
                    <h2 style="color:<?php echo $color ?> ; "><?php echo $verif ?> </h2>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary mt-3" type="submit" id="submit" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </section>