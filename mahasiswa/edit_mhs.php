<?php
require '../function.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
  header("location:../login.php");
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

      <?php
      // get detail mahasiswa
      $mhsDetail = getMhsDetail($_SESSION['nim']);
      $dosenwaliDetail = getDosenDetail($mhsDetail['kode_wali']);
      $khsDetail = getKhsDetail($_SESSION['nim']);
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
      // get detail mahasiswa
      //fetch semua field data mahasiswa dengan nim tertentu
      $mhsDetail = getMhsDetail($_SESSION['nim']);
      $nim = ($_SESSION['nim']);
      $image =  $mhsDetail['foto_mhs']; 
      
      //Melakukan Update data yang telah disubmit
      if(isset($_POST['update'])){
        $nama = $_POST['nama'];
        $nohp = $_POST['telepon'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];

        $queryedit = "UPDATE tb_mhs SET nama = '$nama', alamat = '$alamat',
                        no_hp = '$nohp', email = '$email' WHERE nim = '$nim'";
        $resultedit = mysqli_query($conn, $queryedit);
        header("Location: mhs_profil.php");
    }

    ?>
    <!-- Main Content edit profile-->
    
        <section style="background-color: #eee;">
        <div class="container lg-9">
            <form action="" method="POST">
            <div class="row">
                <div class="col-lg-11">
                    <h5>Edit Profile</h5>
                    <div class="card mb-4">
                    <div class="card-body">
                        <div class="text-center">
                        <img src="../img/default-profile-pic.jpg"> 
                        <h5 class="my-3"><?php echo $mhsDetail['nama']; ?></h5>
                        <p class="text-muted mb-1"><?php echo $mhsDetail['status']; ?></p>
                        <p class="text-muted mb-4"></p>
                        </div>
                <!-- Editable content -->
                    
                        <div class="mx-5">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h6 class="mb-2">Nama Lengkap</h6>
                                </div>
                                <br>
                                <div class="col-sm-11">
                                    <input class="form-control mb-2" type="text" name="nama" placeholder="Nama Lengkap"
                                        value="<?php echo $mhsDetail['nama']; ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <h6 class="mb-2">Alamat</h6>
                                </div>
                                <br>
                                <div class="col-sm-11">
                                    <input class="form-control mb-2" type="text" name="alamat" placeholder="Alamat"
                                        value="<?php echo $mhsDetail['alamat']; ?>"/>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-10">
                                    <h6 class="mb-2">No Telepon</h6>
                                </div>
                                <br>
                                <div class="col-sm-11">
                                    <input class="form-control mb-2" type="text" name="telepon" placeholder="No Telephone" 
                                    value="<?php echo $mhsDetail['no_hp']; ?>"/>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-sm-10">
                                    <h6 class="mb-2">Email</h6>
                                </div>
                                <br>
                                <div class="col-sm-11">
                                    <input class="form-control mb-2" type="text" name="email" placeholder="mhs@gmail.com" 
                                    value="<?php echo $mhsDetail['email']; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="row justify-content-between">
                        <div class="col-1">
                        <a href="mhs_profil.php" class="btn btn-secondary">Cancel</a>
                        </div>
                        <div class="col-1">
                        <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </section>
    
    <script src="../library/js/script.js"> </script>
</body>

</html>
