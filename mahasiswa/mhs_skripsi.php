<?php
require '../function.php';
require_once '../db_login.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
  header("location:../login.php");
}

$skripsiDetail = getSkripsiDetail($_SESSION['nim']);
$color = '';

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
    .home-section a .card-active {
      color: white;
      background-color: #8974FF;
    }
  </style>
  <style>
    #drop_zone {
      background-color: white;
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
  <title>Data Mahasiswa</title>
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
        <a href="mhs_profil.php" class="nav-link  ">
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
        <a href="mhs_pkl.php" class="nav-link">
          <i class='bx bxs-graduation ' id="icon"></i>
          <span class="links_name">Data PKL</span>
        </a>
        <span class="tooltip">Data PKL</span>
      </li>
      <li>
        <a href="mhs_skripsi.php " class="nav-link active">
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
      $skripsiDetail = getSkripsiDetail($_SESSION['nim']);
      $mhsDetail = getMhsDetail($_SESSION['nim']);
      $dosenwaliDetail = getDosenDetail($mhsDetail['kode_wali']);

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
    <div class="container-fluid">
      <div class="h4 mt-5 w-100 ">Data Progres Skripsi Mahasiswa</div><br>
      <div>
        <a href="mhs_skripsi_input.php" class="btn btn-primary">Input Data Progres Skripsi</a>
      </div>
      <div class="row row-cols-1 row-cols-md-1 g-4 mt-1" id="datadiri">
        <div class="col">
          <div class="card rounded-4 ">
            <div class="card-body">
              <p class="text-center" id="title1">Status Skripsi</p>
              <?php if ($skripsiDetail['status_skripsi'] == 'LULUS') {
                $color = 'green';
              } else if ($skripsiDetail['status_skripsi'] == 'BELUM MENGAMBIL') {
                $color = 'red';
              } else {
                $color = 'yellow';
              } ?>
              <h2 class="mb-3" style="color:<?php echo $color ?>; text-align:center;"><?php echo $skripsiDetail['status_skripsi']; ?></h2>

              <div class="px-5">
                <table class="table table-responsive">
                  <tr>
                    <th>Dosen Pembimbing</th>
                    <td> <?= $dosenwaliDetail['nama'] ?></td>
                  </tr>
                  <tr>
                    <th>Nilai</th>
                    <td><?php echo $skripsiDetail['nilai_skripsi']; ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Sidang</th>
                    <td> <?= $skripsiDetail['tanggal_sidang']; ?></td>
                  </tr>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div>
        <div class="h5 mt-4 mb-4 w-100">Laporan Progres Skripsi</div>

        <div id="drop_zone">
          <p>Drop file here</p>
          <p>or</p>
          <p><button type="button" id="btn_file_pick" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open"></span> Select File</button></p>
          <p id="file_info"></p>
          <p><button type="button" id="btn_upload" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-up"></span> Upload To Server</button></p>
          <input type="file" id="selectfile">
          <p id="message_info"></p>
        </div>
        <div class="text-center">
          <?php
          if ($skripsiDetail['scan_skripsi']) {
            echo "File terupload : " . $skripsiDetail['scan_skripsi'];
          } else {
            echo "Belum ada file yang diupload";
          }
          ?>
        </div>
      </div>
      <div class="card rounded-4 ">
        <div class="card-body">
          <p class="text-center">Verifikasi</p>
          <p class="jumlah card-text text-center"><?php echo $skripsiDetail['verif_skripsi']; ?></p>
        </div>
      </div>
    </div>
  </section>



  <script src="../library/js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <script>
    var fileobj;
    $(document).ready(function() {
      $("#drop_zone").on("dragover", function(event) {
        event.preventDefault();
        event.stopPropagation();
        return false;
      });
      $("#drop_zone").on("drop", function(event) {
        event.preventDefault();
        event.stopPropagation();
        fileobj = event.originalEvent.dataTransfer.files[0];
        var fname = fileobj.name;
        var fsize = fileobj.size;
        if (fname.length > 0) {
          document.getElementById('file_info').innerHTML = "File name : " + fname + ' <br>File size : ' + bytesToSize(fsize);
        }
        document.getElementById('selectfile').files[0] = fileobj;
        document.getElementById('btn_upload').style.display = "inline";
      });
      $('#btn_file_pick').click(function() {
        /*normal file pick*/
        document.getElementById('selectfile').click();
        document.getElementById('selectfile').onchange = function() {
          fileobj = document.getElementById('selectfile').files[0];
          var fname = fileobj.name;
          var fsize = fileobj.size;
          if (fname.length > 0) {
            document.getElementById('file_info').innerHTML = "File name : " + fname + ' <br>File size : ' + bytesToSize(fsize);
          }
          document.getElementById('btn_upload').style.display = "inline";
        };
      });
      $('#btn_upload').click(function() {
        if (fileobj == "" || fileobj == null) {
          alert("Please select a file");
          return false;
        } else {
          ajax_file_upload(fileobj);
        }
      });
    });

    function ajax_file_upload(file_obj) {
      if (file_obj != undefined) {
        var form_data = new FormData();
        form_data.append('upload_file', file_obj);
        $.ajax({
          type: 'POST',
          url: 'upload_skripsi.php',
          contentType: false,
          processData: false,
          data: form_data,
          beforeSend: function(response) {
            $('#message_info').html("Uploading your file, please wait...");
          },
          success: function(response) {
            $('#message_info').html(response);
            alert(response);
            $('#selectfile').val('');
          }
        });
      }
    }

    function bytesToSize(bytes) {
      var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
      if (bytes == 0) return '0 Byte';
      var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
      return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }
  </script>
  <script src="../library/js/script.js"> </script>


</html>