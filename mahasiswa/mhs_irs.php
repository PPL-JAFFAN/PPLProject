<?php
require '../function.php';
session_start();
// isset not login
if (!isset($_SESSION['email'])) {
    header("location:../login.php");
}

$irsDetail = getIrsDetail($_SESSION['nim']);

$color = '';
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

        #btn_upload,
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
            $irsDetail = getIrsDetail($_SESSION['nim']);
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
            <h3>Data IRS Per Semester</h3>
        </div>
            <h1 id="title1">DATA IRS</h1>
            <div class="mx-5">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h3 class="mb-2">Semester IRS : </h3>
                                </div>
                                <br>
                                <div class="col-sm-11">
                                    <input class="form-control mb-2" type="number" name="semester_irs" placeholder="Masukkan Semester IRS anda" 
                                    value="<?php echo $irsDetail['semester_irs']; ?>" required>
                                        
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
            
            <h3>Jumlah SKS : </h3>
            <h3>Upload Scan File IRS</h3>
            <div id="drop_zone">
                <p>Drop file here</p>
                <p>or</p>
                <p><button type="button" id="btn_file_pick" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open"></span> Select File</button></p>
                <p id="file_info"></p>
                <p><button type="button" id="btn_upload" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-up"></span> Upload To Server</button></p>
                <input type="file" id="selectfile">
                <p id="message_info"></p>
            </div>
            <div>
                <?php 
                if($irsDetail['file_irs']){
                    echo "File terupload : " . $irsDetail['file_irs'];
                } else {
                    echo "Belum ada file yang diupload";
                }
                ?>
            </div>
        </div>
    </section>

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
                    url: 'upload_irs.php',
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
</body>

</html>