<?php
  include'../db_login.php';

?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="./style.css">
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
        <div class="logo_name" style="padding-top: 5px;"> <div style="font-size:10px ;">Departemen Informatika</div>  Universitas Diponegoro</div>
    </div>
    <ul class="nav-list" id="nav-list">
      <li>
        <a class="nav-link active" href="index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
       <a class="nav-link " href="datamhs.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Data Mahasiswa</span>
       </a>
       <span class="tooltip">Data Mahasiswa</span>
     </li>
     <li>
       <a class="nav-link " href="mhspkl.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Mahasiswa PKL</span>
       </a>
       <span class="tooltip">Mahasiswa PKL</span>
     </li>
     <li>
       <a class="nav-link" href="mhsskripsi.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Mahasiswa Skripsi</span>
       </a>
       <span class="tooltip">Mahasiswa Skripsi</span>
     </li>
     <li>
       <a class="nav-link" href="datadosen.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Data Dosen</span>
       </a>
       <span class="tooltip">Data Dosen</span>
     </li>
	 <li>
       <a class="nav-link" href="manajemenakun.php">
         <i class='bx bx-bar-chart' ></i>
         <span class="links_name">Manajemen Akun</span>
       </a>
       <span class="tooltip">Manajemen Akun</span>
     </li>
     <li>
       <a class="nav-link" href="../logout.php">
         <i class="bi bi-box-arrow-right"></i>
         <span class="links_name">Keluar</span>
       </a>
       <span class="tooltip">Keluar</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="avatar.png" alt="profileImg">
           <div class="name_job">
              <div class="name">Operator</div>
              <div class="job" style="color:white; font-size:13px">operator@mail.com</div>
           </div>
         </div>
         <i class="fa fa-bars" id="bars"></i>>
     </li>
    </ul>
  </div>
  
  <section class="home-section">
    <div class="container-fluid">
      <div class="h4 mt-5 w-100 ">Home
      <!-- <div class="dropdown float-end">
          <button class="btn btn-outline-primary dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Angkatan
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">2016</a></li>
            <li><a class="dropdown-item" href="#">2017</a></li>
            <li><a class="dropdown-item" href="#">2018</a></li>
            <li><a class="dropdown-item" href="#">2019</a></li>
            <li><a class="dropdown-item" href="#">2020</a></li>
            <li><a class="dropdown-item" href="#">2021</a></li>
            <li><a class="dropdown-item" href="#">2022</a></li>
          </ul>
        </div> -->
      </div><br>

      

      <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
        <div class="col">

          <?php
          $ambildata = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE status='Aktif'");
          $aktif = 0;
          while ($data = mysqli_fetch_array($ambildata)) {
              $aktif++;
              }

          $ambildata = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE status='Nonaktif'");
          $non_aktif = 0;
          while ($data = mysqli_fetch_array($ambildata)) {
              $non_aktif++;
              }

          $ambildata = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE status='Cuti'");
          $cuti = 0;
          while ($data = mysqli_fetch_array($ambildata)) {
              $cuti++;
              }
          ?>
          <div class="card rounded-4  ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Aktif</p>
              <p class="card-text jumlah text-center"><?= $aktif; ?></p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card rounded-4 ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Non Aktif</p>
              <p class="card-text jumlah text-center"><?= $non_aktif; ?></p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card rounded-4 ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Cuti</p>
              <p class="card-text jumlah text-center"><?= $cuti; ?></p>
            </div>
          </div>
        </div>
      </div>
      
	  <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
        <div class="col">

          <?php
          $datalulus = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE status='Lulus'");
          $lulus = mysqli_num_rows($datalulus);

          $dataud = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE status='Undur Diri'");
          $ud = mysqli_num_rows($dataud);
          
          $datado = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE status='DO'");
          $do = mysqli_num_rows($datado);
        
          ?>
          <div class="card rounded-4  ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Lulus</p>
              <p class="card-text jumlah text-center"><?= $lulus; ?></p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card rounded-4 ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Undur Diri</p>
              <p class="card-text jumlah text-center"><?= $ud; ?></p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card rounded-4 ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Drop Out</p>
              <p class="card-text jumlah text-center"><?= $do; ?></p>
            </div>
          </div>
        </div>
      </div>
      <br>
	  
      <div class="h5 mt-4 mb-2 w-100">Statistik</div>
      <div class="row row-cols-1 row-cols-md-2 g-4 mt-1">
        <div class="col">
          <div class="card rounded-4  ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Aktif</p>
              <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
          </div>
        </div>
        
        <div class="col">
          <div class="card rounded-4 ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Non Aktif</p>
              <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
            </div>
          </div>
        </div>
      </div>
	  
	  <div class="row row-cols-1 row-cols-md-2 g-4 mt-1">
        <div class="col">
          <div class="card rounded-4  ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Cuti</p>
              <canvas id="myChart3" style="width:100%;max-width:600px"></canvas>
            </div>
          </div>
        </div>
        
        <div class="col">
          <div class="card rounded-4 ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Lulus</p>
              <canvas id="myChart4" style="width:100%;max-width:600px"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-2 g-4 mt-1">
        <div class="col">
          <div class="card rounded-4  ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Undur Diri</p>
              <canvas id="myChart5" style="width:100%;max-width:600px"></canvas>
            </div>
          </div>
        </div>
        
        <div class="col">
          <div class="card rounded-4 ">
            <div class="card-body">
              <p class="text-center">Jumlah Mahasiswa Drop Out</p>
              <canvas id="myChart6" style="width:100%;max-width:600px"></canvas>
            </div>
          </div>
        </div>
      </div>

      <br>
      <div class="h5 mt-4 mb-4 w-100">Tabel</div>
      <div class="card p-4 rounded-4">
      <table id="example" class="table  bg-light rounded-3" style="width:100%">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Email</th>
                <!-- <th>No HP</th> -->
                <th>Status</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $ambildata = mysqli_query($conn, 'SELECT * FROM tb_mhs ORDER BY  nama ASC, semester ASC'  );
          $i = 1;
          while ($data = mysqli_fetch_array($ambildata)) {
              $nim = $data['nim'];
              $nama = $data['nama'];
              $alamat = $data['alamat'];
              $angkatan = $data['angkatan'];
              $email = $data['email'];
              // $no_hp = $data['no_hp'];
              $status = $data['status'];
              $semester = $data['semester'];
          ?>

        <tr>
          <td><?= $nim ?></td>
          <td><?= $nama; ?></td>
          <td><?= $alamat; ?></td>
          <td><?= $angkatan; ?></td>
          <td><?= $email; ?></td>
          <!-- <td><?= $no_hp; ?></td> -->
          <td><?= $status; ?></td>
          <td><?= $semester; ?></td>
        </tr>

        <?php
          }
        ?>
    </table>
    </div>
  </div>
</body>
     
</section>



<script src="../library/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="chart.js"></script>
<script>$(document).ready(function () {
    $('#example').DataTable();
});</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<?php
  //seleksi untuk menampilkan data ke dalam chart
  $aktif2016 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2016' AND status='Aktif' ");
  $aktif2017 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2017' AND status='Aktif' ");
  $aktif2018 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2018' AND status='Aktif' ");
  $aktif2019 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2019' AND status='Aktif' ");
  $aktif2020 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2020' AND status='Aktif' ");
  $aktif2021 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2021' AND status='Aktif' ");
  $aktif2022 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2022' AND status='Aktif' ");

?>

<script>
  var xValues = ["2016", "2017", "2018", "2019", "2020", "2021", "2022"];
  var yValues = [<?php echo mysqli_num_rows($aktif2016);?>,<?php echo mysqli_num_rows($aktif2017);?>,<?php echo mysqli_num_rows($aktif2018);?>,
  <?php echo mysqli_num_rows($aktif2019);?>, <?php echo mysqli_num_rows($aktif2020);?>, <?php echo mysqli_num_rows($aktif2021);?>,  <?php echo mysqli_num_rows($aktif2022);?>];
  var barColors = ["#8974FF", "#8974FF","#8974FF","#8974FF","#8974FF","#8974FF", "#8974FF"];

  new Chart("myChart", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        // text: "World Wine Production 2018"
      }
    }
  });
</script>

<?php
  //seleksi untuk menampilkan data ke dalam chart
  $Nonaktif2016 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2016' AND status='Nonaktif' ");
  $Nonaktif2017 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2017' AND status='Nonaktif' ");
  $Nonaktif2018 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2018' AND status='Nonaktif' ");
  $Nonaktif2019 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2019' AND status='Nonaktif' ");
  $Nonaktif2020 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2020' AND status='Nonaktif' ");
  $Nonaktif2021 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2021' AND status='Nonaktif' ");
  $Nonaktif2022 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2022' AND status='Nonaktif' ");

?>

<script>
  var xValues = ["2016", "2017", "2018", "2019", "2020", "2021", "2022"];
  var yValues = [<?php echo mysqli_num_rows($Nonaktif2016);?>,<?php echo mysqli_num_rows($Nonaktif2017);?>,<?php echo mysqli_num_rows($Nonaktif2018);?>,
  <?php echo mysqli_num_rows($Nonaktif2019);?>, <?php echo mysqli_num_rows($Nonaktif2020);?>, <?php echo mysqli_num_rows($Nonaktif2021);?>,  <?php echo mysqli_num_rows($Nonaktif2022);?>];
  var barColors = ["#8974FF", "#8974FF","#8974FF","#8974FF","#8974FF","#8974FF", "#8974FF"];

  new Chart("myChart2", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        // text: "World Wine Production 2018"
      }
    }
  });
 </script>
  
  <?php
  //seleksi untuk menampilkan data ke dalam chart
  $cuti2016 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2016' AND status='Cuti' ");
  $cuti2017 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2017' AND status='Cuti' ");
  $cuti2018 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2018' AND status='Cuti' ");
  $cuti2019 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2019' AND status='Cuti' ");
  $cuti2020 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2020' AND status='Cuti' ");
  $cuti2021 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2021' AND status='Cuti' ");
  $cuti2022 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2022' AND status='Cuti' ");

?>

<script>
  var xValues = ["2016", "2017", "2018", "2019", "2020", "2021", "2022"];
  var yValues = [<?php echo mysqli_num_rows($cuti2016);?>,<?php echo mysqli_num_rows($cuti2017);?>,<?php echo mysqli_num_rows($cuti2018);?>,
  <?php echo mysqli_num_rows($cuti2019);?>, <?php echo mysqli_num_rows($cuti2020);?>, <?php echo mysqli_num_rows($cuti2021);?>,  <?php echo mysqli_num_rows($cuti2022);?>];
  var barColors = ["#8974FF", "#8974FF","#8974FF","#8974FF","#8974FF","#8974FF", "#8974FF"];

  new Chart("myChart3", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        // text: "World Wine Production 2018"
      }
    }
  });
</script>

<?php
  //seleksi untuk menampilkan data ke dalam chart
  $lulus2016 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2016' AND status='Lulus' ");
  $lulus2017 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2017' AND status='Lulus' ");
  $lulus2018 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2018' AND status='Lulus' ");
  $lulus2019 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2019' AND status='Lulus' ");
  $lulus2020 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2020' AND status='Lulus' ");
  $lulus2021 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2021' AND status='Lulus' ");
  $lulus2022 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2022' AND status='Lulus' ");

?>

<script>
  var xValues = ["2016", "2017", "2018", "2019", "2020", "2021", "2022"];
  var yValues = [<?php echo mysqli_num_rows($lulus2016);?>,<?php echo mysqli_num_rows($lulus2017);?>,<?php echo mysqli_num_rows($lulus2018);?>,
  <?php echo mysqli_num_rows($lulus2019);?>, <?php echo mysqli_num_rows($lulus2020);?>, <?php echo mysqli_num_rows($lulus2021);?>,  <?php echo mysqli_num_rows($lulus2022);?>];
  var barColors = ["#8974FF", "#8974FF","#8974FF","#8974FF","#8974FF","#8974FF", "#8974FF"];

  new Chart("myChart4", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        // text: "World Wine Production 2018"
      }
    }
  });
</script>

<?php
  //seleksi untuk menampilkan data ke dalam chart
  $ud2016 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2016' AND status='Undur Diri' ");
  $ud2017 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2017' AND status='Undur Diri' ");
  $ud2018 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2018' AND status='Undur Diri' ");
  $ud2019 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2019' AND status='Undur Diri' ");
  $ud2020 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2020' AND status='Undur Diri' ");
  $ud2021 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2021' AND status='Undur Diri' ");
  $ud2022 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2022' AND status='Undur Diri' ");

?>

<script>
  var xValues = ["2016", "2017", "2018", "2019", "2020", "2021", "2022"];
  var yValues = [<?php echo mysqli_num_rows($ud2016);?>,<?php echo mysqli_num_rows($ud2017);?>,<?php echo mysqli_num_rows($ud2018);?>,
  <?php echo mysqli_num_rows($ud2019);?>, <?php echo mysqli_num_rows($ud2020);?>, <?php echo mysqli_num_rows($ud2021);?>,  <?php echo mysqli_num_rows($ud2022);?>];
  var barColors = ["#8974FF", "#8974FF","#8974FF","#8974FF","#8974FF","#8974FF", "#8974FF"];

  new Chart("myChart5", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        // text: "World Wine Production 2018"
      }
    }
  });
</script>

<?php
  //seleksi untuk menampilkan data ke dalam chart
  $do2016 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2016' AND status='DO' ");
  $do2017 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2017' AND status='DO' ");
  $do2018 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2018' AND status='DO' ");
  $do2019 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2019' AND status='DO' ");
  $do2020 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2020' AND status='DO' ");
  $do2021 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2021' AND status='DO' ");
  $do2022 = mysqli_query($conn,"SELECT * from tb_mhs WHERE angkatan ='2022' AND status='DO' ");

?>

<script>
  var xValues = ["2016", "2017", "2018", "2019", "2020", "2021", "2022"];
  var yValues = [<?php echo mysqli_num_rows($do2016);?>,<?php echo mysqli_num_rows($do2017);?>,<?php echo mysqli_num_rows($do2018);?>,
  <?php echo mysqli_num_rows($do2019);?>, <?php echo mysqli_num_rows($do2020);?>, <?php echo mysqli_num_rows($do2021);?>,  <?php echo mysqli_num_rows($do2022);?>];
  var barColors = ["#8974FF", "#8974FF","#8974FF","#8974FF","#8974FF","#8974FF", "#8974FF"];

  new Chart("myChart6", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        // text: "World Wine Production 2018"
      }
    }
  });
</script>

</html>
