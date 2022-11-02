<?php
require('aksi.php');
require('../db_login.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Mahasiswa</title>
  </head>
  <body class="sb-nav-fixed">
    <br><br>
    <div class="container ">
        <div class="card">
            <div class="card-header">
                <h3>Add Mahasiswa</h3>
            </div>
            <div class="card-body">
                <?php
                if (isset($_POST['submit'])) {
                       $nimmahasiswa = $_POST['nimmahasiswa'];
					   $namabaru = $_POST['namabaru'];
					   $alamat = $_POST['alamat'];
					   $kode_kota = $_POST['kode_kota'];
					   $angkatan = $_POST['angkatan'];
					   $jalur_masuk = $_POST['jalur_masuk'];
					   $email = $_POST['email'];
					   $no_hp = $_POST['no_hp'];
					   $status = $_POST['status'];
					   $kode_wali = $_POST['kode_wali'];
					   $semester = $_POST['semester'];

                    $result = mysqli_query($conn, "INSERT INTO tb_mhs (nim,nama,alamat,kode_kota,angkatan,jalur_masuk,email,no_hp,status,kode_wali,semester) 
					values ('$nimmahasiswa','$namabaru','$alamat','$kode_kota','$angkatan','$jalur_masuk','$email','$no_hp','$status','$kode_wali','$semester')");

                    if ($result) :
                ?>
                        <div class="alert alert-success">Data berhasil disimpan</div>
                    <?php else : ?>
                        <div class="alert alert-error">Data gagal disimpan <?php echo $conn->error ?></div>
                        }
                <?php
                    endif;
                }
                ?>
                <form method="POST" onsubmit="return submitForm()" name="form">
                    <div class="form-group">
                        <label for="nimmahasiswa">NIM:</label>
                        <input type="number" class="form-control" name="nimmahasiswa" id="nimmahasiswa">
                    </div>
                    <div class="form-group">
                        <label for="namabaru">Nama:</label>
                        <input type="text" class="form-control" name="namabaru" id="namabaru">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
						<input type="text" class="form-control" name="alamat" id="alamat">
                    </div>
					<div class="form-group">
                        <label for="kode_kota">Kode Kota:</label>
                        <input type="number" class="form-control" name="kode_kota" id="kode_kota" min="4" maxlength="4">
                    </div>
					</br>
					<div class="form-group">
                        <label for="angkatan">Angkatan:</label>
                        <input type="number" class="form-control" name="angkatan" id="angkatan" min="4" maxlength="4">
                    </div>
					</br>
					<div class="form-group">
                        <label for="jalur_masuk">Jalur Masuk:</label>
                        <input type="text" class="form-control" name="jalur_masuk" id="jalur_masuk">
                    </div>
					</br>
					<div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
					</br>
					<div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="number" class="form-control" name="no_hp" id="no_hp">
                    </div>
					</br>
					<div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" name="status" id="status">
                    </div>
					</br>
					<div class="form-group">
                        <label for="kode_wali">Kode Wali</label>
                        <input type="number" class="form-control" name="kode_wali" id="kode_wali">
                    </div>
					</br>
					<div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="number" class="form-control" name="semester" id="semester" min="1" maxlength="1">
                    </div>
					</br>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Tambahkan</button><br>
                    <a href="manajemenakun.php">
                        <br><button type="button" class="btn btn-danger">Kembali</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>