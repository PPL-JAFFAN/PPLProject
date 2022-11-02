<?php
require '../function.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
  header("location:../login.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
      .home-section a .card-active{
        color: white;
        background-color: #8974FF;
      }
    </style>
    <title>Data Mahasiswa</title>
  </head>

<body>
  <div class="sidebar">
  <div class="logo-details">
      <i> <img src="../asset/img/undip.png" style="width:40px ; padding-bottom:5px" alt=""></i>
        <div class="logo_name" style="padding-top: 5px;"> <div style="font-size:10px ;">Departemen Informatika</div>  Universitas Diponegoro</div>
    </div>
    <ul class="nav-list">

    <li>
      <a href="mhs_profil.php" class="nav-link active ">
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
      //fetch semua field data mahasiswa dengan nim tertentu
      $mhsDetail = getMhsDetail($_SESSION['nim']);
      $nim = ($_SESSION['nim']);
      $image =  $mhsDetail['foto_mhs'];
      $querypropinsi = mysqli_query($conn,"select * from tb_propinsi");
      
      //Melakukan Update data yang telah disubmit
      if(isset($_POST['update'])){
        $nama = $_POST['nama'];
        $nohp = $_POST['telepon'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $kode_kota = $_POST['kabupaten'];

        $queryedit = "UPDATE tb_mhs SET nama = '$nama', alamat = '$alamat',
                        no_hp = '$nohp', email = '$email',kode_kota = '$kode_kota'
                        WHERE nim = '$nim'";
        $resultedit = mysqli_query($conn, $queryedit);
        header("Location: mhs_profil.php");
    }

    ?>
    <li class="profile">
      <div class="profile-details">
        <!--<img src="profile.jpg" alt="profileImg">-->
        <div class="name_job">
        <div class="name"><?php echo $mhsDetail['nama']; ?></div>
          <div class="email"><?php echo $mhsDetail['email']; ?></div>
        </div>
      </div>
      <i class="fa fa-bars" id="bars"></i>>
    </li>
    </ul>
  </div>
  
  <section class="home-section">
    <div class="container container-fluid">
      <form action="" method="POST">
        <div class="h4 mt-5 w-100 ">Edit Profil<br>
          <div class="row row-cols-1 row-cols-md-1 g-4 mt-1">
            <div class="col">
            <div class="card rounded-4 ">
              <div class="card-body">
                <div class="text-center">
                  <img class="rounded-4 mt-3" style="width: 200px ;" src="../img/default-profile-pic.jpg"> 
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
                                    <h6 class="mb-2">Nim</h6>
                                </div>
                                <br>
                                <div class="col-sm-11">
                                    <span class="form-control mb-2" type="text-muted" name="nim" placeholder="Nim"><?php echo $_SESSION['nim']; ?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-10">
                                    <h6 class="mb-2">Angkatan</h6>
                                </div>
                                <br>
                                <div class="col-sm-11">
                                    <span class="form-control mb-2" type="text-muted" name="nim" placeholder="Angkatan"><?php echo $mhsDetail['angkatan']; ?></span>
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
                                <div class="form-group col-sm-5">
                                    <h6 for="provinsi">Provinsi</h6>
                                    <select name="provinsi" id="provinsi" class="form-control" onchange="getKabupaten(this.value)">
                                        <option value="">Pilih Propinsi</option>
                                        <?php while ($row = $querypropinsi->fetch_object()){
                                        echo '<option value="'.$row->id.'">'.$row->nama.'</option>';
                                    }
                                    ?>
                                        <!-- /* TODO tampilkan daftar provinsi menggunakan ajax */ -->
                                    </select>

                                
                                </div>
                                
                                <div class="form-group col-sm-5">
                                <h6 for="kabupaten">Kota</h6>
                                
                                <select name="kabupaten" id="kabupaten" class="form-control">
                                    <option value="">Pilih kabupaten/Kota</option>

                                    <!-- /* TODO tampilkan daftar kabupaten berdasarkan pilihan provinsi sebelumnya, menggunakan ajax*/ -->
                                </select>
                                </div>


                                
                            <br>
                            
                            
                        </div>
              </div>
              </div>

              <div class="d-flex justify-content-end pt-4">
                  <div class="me-3">
                  <input type="hidden" name="idm" value="<?= $idm; ?>">
                  <a href="mhs_profil.php" class="btn btn-danger ">Cancel</a>
                  </div>
                  <div class="float-end"> 
                  <button type="submit" class="btn btn-primary float-end" name="update" value="update">Update</button>
                  </div>
              </div>
           </div>
          </div>
        </div>
      </form>
    </div>
  
   <!-- <div class="text">Selamat Datang, <?php echo $mhsDetail['nama']; ?> !!!</div> -->
  </section>



<script src="../library/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>$(document).ready(function () {
    $('#example').DataTable();
});</script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

 </html>
