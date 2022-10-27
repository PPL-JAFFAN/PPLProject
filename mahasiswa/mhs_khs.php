<?php
require '../function.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
  header("location:../login.php");
}


$color = '';

if (isset($_POST['submit'])) {
  if (uploadDetailKhs($_POST)) {
    echo "<script>
    alert('Data berhasil diupdate');
    document.location.href = 'upload_file_khs.php';
    </script>";
  } else {
    echo "<script>
    alert('Data gagal diupdate');
    </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
  <link rel="stylesheet" href="../library/css/style.css">
  <link rel="stylesheet" href="mhs.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      padding: 20px;
    }

    #drop_zone {
      background-color: #eae5e5;
      /* border: #B980F0 5px dashed; */
      border-radius: 20px;
      width: 50%;

      padding: 60px 0;
    }

    #drop_zone p {
      font-size: 20px;
      text-align: center;
    }

    #selectfile {
      display: none;
    }
  </style>
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
      <h3>Data KHS Mahasiswa Aktif</h3>
    </div>
    <h1 id="title1">DATA KHS</h1>
    <form action="" method="POST">
      <div class="mx-5">
        <div class="row">
          <div class="col-sm-10">
            <h3 class="mb-2">Semester Aktif : </h3>
          </div>
          <br>
          <div class="col-sm-11">
            <select class="form-select" name="smt" id="smt">
              <option value="" hidden>Pilih Semester</option>
              <?php
              for ($i = 1; $i <= 14; $i++) {
                echo '<option value="' . $i . '">' . $i . '</option>';
              } ?>
            </select>
            <!-- <input class="form-control mb-2" type="number" name="semester_khs" placeholder="Masukkan Semester Aktif anda saat ini" value="<?php echo $khsDetail['semester_khs']; ?>" required> -->
          </div>
        </div>
        <div class="row">
          <div class="col-sm-11">
            <h3 class="mb-2">SKS :</h3>
            <input class="form-control mb-2" type="number" name="sks" value="" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-11">
            <h3 class="mb-2">SKS Kumulatif :</h3>
            <input class="form-control mb-2" type="number" name="sksk" value="" />
          </div>
        </div>

        <div class="row">
          <div class="col-sm-11">
            <h3 class="mb-2">IP :</h3>
            <input class="form-control mb-2" type="number" name="ip" step="0.01" value="" />
          </div>
        </div>

        <div class="row">
          <div class="col-sm-11">
            <h3>IPK : </h3>
            <input class="form-control mb-2" type="number" name="ipk" step="0.01" value="" />
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <button class="btn btn-primary mt-3" type="submit" id="submit" name="submit">Submit</button>
        </div>
      </div>
    </form>
  </section>

  <script src="../library/js/script.js"> </script>
</body>

</html>