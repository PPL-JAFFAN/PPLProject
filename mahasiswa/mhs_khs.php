<?php
require '../function.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
    header("location:../login.php");
}
$color = '';
$error = '';

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
    <link rel="icon" type="image/x-icon" href="../asset/img/undip.png">
    <title>SiapIn</title>

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
                        <div class="email"><?php echo $mhsDetail['email']; ?></div>
                    </div>
                </div>
                <i class="fa fa-bars" id="bars"></i>>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <div class="container-fluid">
            <div class="h4 mt-5 w-100 ">Data KHS Mahasiswa
            </div><br>

            <div class="row row-cols-1 row-cols-md-1 g-4 mt-1">
                <div class="col">
                    <div class="card rounded-4 card-active p-4 ">
                        <div class="card-body">
                            <?php
                            $i = 1;
                            while ($i <= $mhsDetail['semester']) {
                                $querySksk = mysqli_query($conn, "SELECT * FROM tb_khs WHERE nim='" . $_SESSION['nim'] . "' AND semester=" . $i);
                                $cek = mysqli_num_rows($querySksk);
                                if ($cek == 0) {
                                    echo '<a href="get_khs.php?semester=' . $i . '">
                    <div id="khs_selected">
                    <h4>Semester ' . $i . '</h4>
                    <h6>Jumlah SKS : 0</h6>
                    </div>
                    </a>
                    <br>';
                                } else {
                                    $khs = mysqli_fetch_assoc($querySksk);
                                    echo '
                    <a href="get_khs.php?semester=' . $i . '">
                    <div id="khs_selected">
                    <h4>Semester ' . $i . '</h4>
                    <h6>Jumlah SKS : ' . $khs['sks'] . '</h6>
                    </div>
                    </a>
                    <br>';
                                }

                                $i++;
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../library/js/script.js"> </script>
    <script src="ajax.js"></script>
</body>


<script src="../library/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>



</html>