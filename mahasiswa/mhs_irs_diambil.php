<?php
require '../function.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
  header("location:../login.php");
}
if (isset($_POST['submit'])){
  $semester = $_POST['semester'];
  header("location:mhs_irs_diambil.php?semester=".$semester);
}

if(isset($_GET['semester'])){
  $semester = $_GET['semester'];
  $querymatkul = "SELECT * FROM tb_irs_diambil JOIN tb_matakul ON tb_irs_diambil.kode_mk = tb_matakul.kode_mk WHERE tb_irs_diambil.semester = $semester";
  $connect = mysqli_query($conn, $querymatkul);
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
          <span class="links_name">Buat IRS</span>
        </a>
        <span class="tooltip">Buat IRS</span>
      </li>
      <li>
      <li>
        <a href="mhs_irs_diambil.php">
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
          <i class='bx bxs-graduation'  id="icon"></i>
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

      <li class="profile">
        <div class="profile-details">
          <!--<img src="profile.jpg" alt="profileImg">-->
          <div class="name_job">
          <div class="name"><?php echo $_SESSION['nama']; ?></div>
            <div class="job"><?php echo $_SESSION['email']; ?></div>
          </div>
        </div>
        <i class="fa fa-bars" id="bars"></i>>
      </li>
    </ul>
  </div>


  <section class="home-section">
  <?php if(!isset($_GET['semester'])){?>
    <!--Selection utk menampilkan irs yang dapat diambil per semester-->
    <div class="container2">
      <div class="mt-4">
        <form action="" method="POST">
          <div class="form-group">
            <h4>SEMESTER</h4>
            <select class="form-control" name="semester" id="semester">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary" name="submit" value="submit">Lihat IRS</button>
        </form>
        <br>
      </div>
      <?php 
      } 
      else{
      ?>
      <!--Bagian table IRS-->
      <h1>IRS SEMESTER <?php echo $semester ?> </h1>
      <div class="card">
        <div class="card-body">
          <table class="table" width="100%" id="irscontent">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Matkul</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Waktu</th>
                <th scope="col">Jumlah SKS</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jenis Pembelajaran</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              while ($data = $connect->fetch_object()) {
                $kode_mk = $data->kode_mk;
                $matkul = $data->matakuliah;
                $waktu = $data->waktu;
                $sks = $data->sks;
                $kelas = $data->kelas;
                $pembelajaran = $data->pembelajaran;
                ?>
              
                  <tr id="<?php echo $kode_mk?>">
                    <th scope="row"><?= $i ?></th>
                    <td><?= $kode_mk; ?></td>
                    <td><?= $matkul; ?></td>
                    <td><?= $waktu; ?></td>
                    <td><?= $sks; ?></td>
                    <td><?= $kelas; ?></td>
                    <td><?= $pembelajaran; ?></td>
                    <td>
                      <button type="button" class="btn btn-danger" onclick="delete_irs('<?= $kode_mk ?>',<?php echo $semester?>)">CANCEL</button>
                    </td>
                  </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        </div>
      </div>
      <?php } ?>
    </div>
  </section>
  <script src="../library/js/script.js"> </script>
  <script src="ajax.js"></script>
</body>

</html>
