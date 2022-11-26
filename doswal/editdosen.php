<?php
require_once('../db_login.php');
session_start();
//set all error to empty
$error_nip = '';
$error_namadosen = '';
$error_alamat = '';
$error_nohp = '';
$error_email = '';
$error_password = '';
$error_kabupaten = '';


if (isset($_SESSION['nip'])) {
    $nip = $_SESSION['nip'];
    $query = mysqli_query($conn, "select * from tb_dosen where nip='$nip'");
    $cek = mysqli_num_rows($query);
    $dosen = mysqli_fetch_assoc($query);
    $namadosen = $dosen['nama'];
    $kodewali = $dosen['kode_wali'];
    $alamat = $dosen['alamat'];
    // if alamat empty put empty string
    if ($alamat == NULL) {
        $alamat = '';
    }
    $email = $dosen['email'];
    $nohp = $dosen['no_hp'];
    // if nohp empty put empty string
    if ($nohp == NULL) {
        $nohp = '';
    }
    $kode_kota = $dosen['kode_kota'];
    $querypropinsi = mysqli_query($conn, "select * from tb_propinsi");
    $querykota = mysqli_query($conn, "select * from tb_kota where id='$kode_kota'");

    $kota = mysqli_fetch_assoc($querykota);
    if (empty($kota)) {
        $namakota = "Pilih Kota";
        $idkota = '';
    } else {
        $namakota = $kota['nama'];
        $idkota = $kota['id'];
        $idproponsikota = $kota['id_provinsi'];
        $querykotadipropinsi = mysqli_query($conn, "select * from tb_kota where id_provinsi='$idproponsikota'");

        $querygetpropinsi = mysqli_query($conn, "SELECT * FROM tb_kota JOIN tb_propinsi ON tb_kota.id_provinsi = tb_propinsi.id WHERE tb_kota.id = $kode_kota");
        $propinsi = mysqli_fetch_assoc($querygetpropinsi);
        $idpropinsi = $propinsi['id'];
        $namapropinsi = $propinsi['nama'];
    }



    $queryPass = mysqli_query($conn, "select * from tb_user where nimnip='$nip'");
    $user = mysqli_fetch_assoc($queryPass);
    $password = $user['password'];
} else {
    header("Location:../index.php");
}

if (isset($_POST['edit'])) {
    //validate form
    $valid = TRUE;
    $namadosen = $_POST['nama'];
    if ($namadosen == '') {
        $error_namadosen = "Nama Dosen tidak boleh kosong";
        $valid = FALSE;
    } // nama hanya boleh huruf, spasi, koma, dan titik
    else if (!preg_match("/^[a-zA-Z .,]*$/", $namadosen)) {
        $error_namadosen = "Nama Dosen hanya boleh huruf, spasi, koma, dan titik";
        $valid = FALSE;
    }
    //validate alamat
    $alamat = $_POST['alamat'];
    if ($alamat == '') {
        $error_alamat = "Alamat tidak boleh kosong";
        $valid = FALSE;
    }
    //validate nohp
    $nohp = $_POST['no_hp'];
    if ($nohp == '') {
        $error_nohp = "Nomor HP tidak boleh kosong";
        $valid = FALSE;
    } else if (!preg_match("/^[0-9]*$/", $nohp)) {
        $error_nohp = "Nomor HP harus diisi dengan angka";
        $valid = FALSE;
    }
    //validate email
    $email = $_POST['email'];
    if ($email == '') {
        $error_email = "Email tidak boleh kosong";
        $valid = FALSE;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Invalid email format";
        $valid = FALSE;
    }
    //validate password
    $password = $_POST['password'];
    if ($password == '') {
        $error_password = "Password tidak boleh kosong";
        $valid = FALSE;
    }
    //validate kabupaten
    $kode_kota = $_POST['kabupaten'];
    if ($kode_kota == '') {
        $error_kabupaten = "Kabupaten tidak boleh kosong";
        $valid = FALSE;
    }

    //update data into database
    if ($valid) {
        $query = mysqli_query($conn, "update tb_dosen set nama='$namadosen', alamat='$alamat', no_hp='$nohp', email='$email', kode_kota='$kode_kota' where nip='$nip'");
        $query2 = mysqli_query($conn, "update tb_user set password='$password' where nimnip='$nip'");
        if ($query && $query2) {
            header("Location:doswal.php");
        } else {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        }
    }
}

?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../library/css/style.css">
    <link rel="stylesheet" href="doswal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit Dosen</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">



</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i> <img src="../asset/img/undip.png" style="width:40px ; padding-bottom:5px" alt=""></i>
            <div class="logo_name" style="padding-top: 5px;">
                <div style="font-size:10px ;">Departemen Informatika</div> Universitas Diponegoro
            </div>
        </div>
        <ul class="nav-list" id="nav-list">
            <li>
                <a class="nav-link " href="doswal.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a class="nav-link active" href="editdosen.php">
                    <i class='bx bx-user' id="icon"></i>
                    <span class="links_name">Edit Data Dosen</span>
                </a>
                <span class="tooltip">Edit Data Dosen</span>
            </li>
            <li>
                <a class="nav-link" href="verifMhs.php">
                    <i class='bx bx-chat' id="icon"></i>
                    <span class="links_name">Verifikasi <br>Mahasiswa</span>
                </a>
                <span class="tooltip">Verifikasi Mahasiswa</span>
            </li>
            <li>
                <a class="nav-link" href="datamhs.php">
                    <i class='bx bx-pie-chart-alt-2' id="icon"></i>
                    <span class="links_name">Lihat Data <br>Mahasiswa</span>
                </a>
                <span class="tooltip">Lihat Data Mahasiswa</span>
            </li>

            <li>
                <a class="nav-link" href="../logout.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                    <span class="links_name">Keluar</span>
                </a>
                <span class="tooltip">Keluar</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <!-- <img src="undip.png" alt="profileImg"> -->
                    <div class="name_job">
                        <div class="name"><?php echo $_SESSION['nama'] ?></div>
                        <div class="email"><?php echo $_SESSION['email'] ?></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <div class="container-fluid">
            <div class="h4 mt-5 w-100 ">Edit Data
            </div><br>
            <div class="row row-cols-1 row-cols-md-1 g-4 ">
                <div class="col">
                    <div class="card rounded-4 card-active ">
                        <div class="card-body">
                            <form class="px-4 mt-3" action="" method="POST" id="buatakun">
                                <div class="form-group">
                                    <label for="name" id="uname">Nama Lengkap</label>
                                    <input class="form-control mb-3" type="text" name="nama" placeholder="Nama Lengkap"
                                        value="<?= $dosen['nama']; ?>" />
                                    <p id="error"><?php echo $error_namadosen; ?></p>
                                </div>

                                <div class="form-group">
                                    <label for="alamat" id="uname">Alamat</label>
                                    <input class="form-control mb-3" type="text" name="alamat" placeholder="alamat"
                                        value="<?= $dosen['alamat']; ?>" />
                                    <p id="error"><?php echo $error_alamat; ?></p>
                                </div>

                                <div class="form-group">
                                    <label for="no_telp" id="uname">No. HP</label>
                                    <input class="form-control mb-3" type="text" name="no_hp"
                                        placeholder="Nomor Telepon" value="<?= $dosen['no_hp']; ?>" />
                                    <p id="error"><?php echo $error_nohp; ?></p>
                                </div>

                                <div class="form-group">
                                    <label for="kode" id="uname">Email</label>
                                    <input class="form-control mb-3" type="email" name="email" placeholder="email"
                                        value="<?= $dosen['email']; ?>" />
                                    <p id="error"><?php echo $error_email; ?></p>
                                </div>

                                <div class="form-group">
                                    <label for="kode" id="uname">Password</label>
                                    <input class="form-control mb-3" type="text" name="password"
                                        placeholder="ketik password" value="<?= $password; ?>" />
                                    <p id="error"><?php echo $error_password; ?></p>
                                </div>

                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-control mb-3"
                                        onchange="getKabupaten(this.value)">
                                        <!-- set default value as $propinsi-->
                                        <option value="<?= $idpropinsi; ?>"> <?= $namapropinsi; ?></option>
                                        <?php while ($row = $querypropinsi->fetch_object()) {
                                            echo '<option value="' . $row->id . '">' . $row->nama . '</option>';
                                        }
                                        ?>
                                        <!-- /* TODO tampilkan daftar provinsi menggunakan ajax */ -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten</label>
                                    <select name="kabupaten" id="kabupaten" class="form-control">
                                        <option value="<?= $idkota; ?>"><?= $namakota; ?></option>
                                        <!-- /* TODO tampilkan daftar kabupaten*/ -->
                                        <?php
                                        if (!empty($kota)) {
                                            while ($row = $querykotadipropinsi->fetch_object()) {
                                                echo '<option value="' . $row->id . '">' . $row->nama . '</option>';
                                            }
                                        }

                                        ?>

                                        <!-- /* TODO tampilkan daftar kabupaten berdasarkan pilihan provinsi sebelumnya, menggunakan ajax*/ -->
                                    </select>
                                    <p id="error"><?php echo $error_kabupaten; ?></p>
                                </div>

                                <br>
                                <div class="col-12 d-flex justify-content-center button-signup" id="ctn-signup">
                                    <input type="submit" class="btn btn-primary mt-2 w-100 mb-3" name="edit"
                                        value="Konfirmasi Edit" id="signupbutton" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../library/js/script.js"> </script>
</body>

</html>