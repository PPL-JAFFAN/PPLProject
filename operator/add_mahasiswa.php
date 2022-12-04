<?php
  include '../db_login.php';
  include './aksi.php';
  include '../function.php';


?>
  

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../asset/img/undip.png">
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
    <link rel="icon" type="image/x-icon" href="../asset/img/undip.png">

    <style>
      
      .home-section a .card-active{
        color: white;
        background-color: #8974FF;
      }
    </style>
    <style>
				.modal {
				  background: rgba(0, 0, 0, 0.5); 
				}
				.modal-backdrop {
				  display: none;
				}
			  </style>
    <title>SiapIn</title>
  </head>

<body>
  <div class="sidebar">
  <div class="logo-details">
      <i> <img src="../asset/img/undip.png" style="width:40px ; padding-bottom:5px" alt=""></i>
        <div class="logo_name" style="padding-top: 5px;"> <div style="font-size:10px ;">Departemen Informatika</div>  Universitas Diponegoro</div>
    </div>
    <ul class="nav-list" id="nav-list">
      <li>
        <a class="nav-link " href="index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
       <a class="nav-link  " href="./datamhs/datamhs.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Data Mahasiswa</span>
       </a>
       <span class="tooltip">Data Mahasiswa</span>
     </li>
     <li>
       <a class="nav-link " href="./datamhsPKL/mhspkl.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Mahasiswa PKL</span>
       </a>
       <span class="tooltip">Mahasiswa PKL</span>
     </li>
     <li>
       <a class="nav-link" href="./datamhsSkripsi/mhsskripsi.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Mahasiswa Skripsi</span>
       </a>
       <span class="tooltip">Mahasiswa Skripsi</span>
     </li>
     <li>
       <a class="nav-link " href="datadosen.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Data Dosen</span>
       </a>
       <span class="tooltip">Data Dosen</span>
     </li>
	 <li>
       <a class="nav-link active" href="manajemenakun.php">
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
           <div class="name_job">
              <div class="name">Operator</div>
              <div class="email">operator@mail.com</div>
           </div>
         </div>
         <i class="fa fa-bars" id="bars"></i>>
     </li>
    </ul>
  </div>
  
  <section class="home-section">
   
      <div class="h4 mt-5 w-100 mb-5 ">Tambah Data mahasiswa 

      <a href="manajemenakun.php">
        <button type="button" class="btn btn-primary float-end" >
          Kembali
        </button></a>
      </div>

      <div class="card p-5 rounded-4 mt-3">

      <form method="POST" autocomplete="on"  name="form">
        <div class="form-group mb-4 mt-3">
            <label class="h6" for="nama">Nama</label>
            <input type="text" name="nama" placeholder="Nama" class="form-control"  value="<?php if(isset($nama)) {echo $nama;} ?>">
            <div class="error text-danger fst-italic"> <?php if(isset($error_nama)) echo $error_nama; ?> </div>
        </div>

        <div class="form-group  mb-4">
            <label class="h6" for="nim">NIM</label>
            <input type="text" name="nim" placeholder="NIM" class="form-control" value="<?php if(isset($nim)) {echo $nim;} ?>">
            <div class="error text-danger fst-italic"> <?php if(isset($error_nim)) echo $error_nim; ?> </div>

        </div>

        <div class="form-group  mb-4">
            <label class="h6" class="h6" for="email">Email</label>
            <input type="email" name="email" placeholder="Email" class="form-control" value="<?php if(isset($email)) {echo $email;} ?>" >
            <div class="error text-danger fst-italic"> <?php if(isset($error_email)) echo $error_email; ?> </div>

        </div>

        <div class="form-group  mb-4">
            <label class="h6" for="semester">Semester</label>
            <select name="semester" id="semester" class="form-select" aria-label="Default select example">
                <option selected>Semester</option>
                <option value="1" <?php if(isset($semester) && $semester=="1") echo 'selected="true"'; ?> >1</option>
                <option value="2" <?php if(isset($semester) && $semester=="2") echo 'selected="true"'; ?>>2</option>
                <option value="3" <?php if(isset($semester) && $semester=="3") echo 'selected="true"'; ?>>3</option>
                <option value="4" <?php if(isset($semester) && $semester=="4") echo 'selected="true"'; ?>>4</option>
                <option value="5" <?php if(isset($semester) && $semester=="5") echo 'selected="true"'; ?>>5</option>
                <option value="6" <?php if(isset($semester) && $semester=="6") echo 'selected="true"'; ?>>6</option>
                <option value="7" <?php if(isset($semester) && $semester=="7") echo 'selected="true"'; ?>>7</option>
                <option value="8" <?php if(isset($semester) && $semester=="8") echo 'selected="true"'; ?>>8</option>
                <option value="9" <?php if(isset($semester) && $semester=="9") echo 'selected="true"'; ?>>9</option>
                <option value="10" <?php if(isset($semester) && $semester=="10") echo 'selected="true"'; ?>>10</option>
                <option value="11" <?php if(isset($semester) && $semester=="11") echo 'selected="true"'; ?>>11</option>
                <option value="12" <?php if(isset($semester) && $semester=="12") echo 'selected="true"'; ?>>12</option>
                <option value="13" <?php if(isset($semester) && $semester=="13") echo 'selected="true"'; ?>>13</option>
                <option value="14" <?php if(isset($semester) && $semester=="14") echo 'selected="true"'; ?>>14</option>
              </select>
              <div class="error text-danger fst-italic"> <?php if(isset($error_semester)) echo $error_semester; ?> </div>
        </div>

        <div class="form-group  mb-4">
            <label class="h6" for="angkatan">Angkatan</label>
            <select name="angkatan" class="form-select" aria-label="Default select example">
                <option selected>Angkatan</option>
                <option value="2016" <?php if(isset($angkatan) && $angkatan=="2016") echo 'selected="true"'; ?>>2016</option>
                <option value="2017" <?php if(isset($angkatan) && $angkatan=="2017") echo 'selected="true"'; ?>>2017</option>
                <option value="2018" <?php if(isset($angkatan) && $angkatan=="2018") echo 'selected="true"'; ?>>2018</option>
                <option value="2019" <?php if(isset($angkatan) && $angkatan=="2019") echo 'selected="true"'; ?>>2019</option>
                <option value="2020" <?php if(isset($angkatan) && $angkatan=="2020") echo 'selected="true"'; ?>>2020</option>
                <option value="2021" <?php if(isset($angkatan) && $angkatan=="2021") echo 'selected="true"'; ?>>2021</option>
                <option value="2022" <?php if(isset($angkatan) && $angkatan=="2022") echo 'selected="true"'; ?>>2022</option>
              </select>
              <div class="error text-danger fst-italic"> <?php if(isset($error_angkatan)) echo $error_angkatan; ?> </div>
        </div>

        <div class="form-group  mb-4">
            <label class="h6" for="jalur_masuk">Jalur Masuk</label>
            <select name="jalur_masuk" class="form-select" aria-label="Default select example">
                <option selected value="Jalur Masuk">Jalur Masuk</option>
                <option value="SNMPTN" <?php if(isset($jalur_masuk) && $jalur_masuk=="SNMPTN") echo 'selected="true"'; ?> >SNMPTN</option>
                <option value="SBMPTN" <?php if(isset($jalur_masuk) && $jalur_masuk=="SBMPTN") echo 'selected="true"'; ?>>SBMPTN</option>
                <option value="UM" <?php if(isset($jalur_masuk) && $jalur_masuk=="UM") echo 'selected="true"'; ?>>UM</option>
            </select>
            <div class="error text-danger fst-italic"> <?php if(isset($error_jalur_masuk)) echo $error_jalur_masuk; ?> </div>
        </div>
        
        

        <div class="form-group  mb-4">
            <label class="h6" for="dosen">Dosen</label>
            <select name="dosen" class="form-select" aria-label="Default select example">
                <option selected>Pilih Dosen</option>
                <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM tb_dosen");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <option <?php if(isset($dosen) && $dosen == $data['kode_wali']) echo 'selected="true"'; ?>  value="<?=$data['kode_wali'];?>"><?php echo $data['nama'];?></option>
                <?php
                }
                ?>
            </select>
            <div class="error text-danger fst-italic"> <?php if(isset($error_dosen)) echo $error_dosen; ?> </div>
        </div>

        <button type="submit" name="add_mhs" value="add_mhs" class="btn btn-primary w-100 mb-3">Submit</button>
    </form>

    </div>
  </div>
</body>
</section>



  

  

  <script src="../library/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="./script.js"></script>




<script>$(document).ready(function () {
    $('#example').DataTable();
});</script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

 <script>

    
 </script>
 </html>
