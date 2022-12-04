<?php
require 'db_login.php';

// get detail mahasiswa
function getMhsDetail($nim)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE nim='$nim'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

function getPassMhs($nim_nip)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE nimnip='$nim_nip'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

function getPassDosen($nim_nip)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE nimnip='$nim_nip'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

function getKotaKabupaten($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_kota WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

function getProvinsi($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_propinsi WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

//get Matkul PerSemester
function getMatkul($smt)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_matakul WHERE semester = '$smt'");
    return $query;
}

//get detail irs
function getIrsDetail($nim)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_irs WHERE nim='$nim'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

function getIrsVerif($nim, $smt)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_irs WHERE nim='$nim' AND semester='$smt'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

// get detail dosen
function getDosenDetail($kode_wali)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE kode_wali='$kode_wali'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

// get detail khs
function getKhsDetail($nim, $semester)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_khs WHERE nim='$nim' AND semester=$semester");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

// get detail pkl
function getPklDetail($nim)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_pkl WHERE nim='$nim'");
    $data = mysqli_fetch_assoc($query);

    return $data;
}

//get detail skripsi
function getSkripsiDetail($nim)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_skripsi WHERE nim='$nim'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}

// // function update file khs
// function updateKhs($nim, $namafile){
//     global $conn;
//     $query = mysqli_query($conn, "UPDATE tb_khs SET file_khs = '$namafile' WHERE nim = '$nim'");
//     return $query;
// }

// // function upload file
// function uploadFile($file){
//     $namafile = $file['name'];
//     $ukuranfile = $file['size'];
//     $error = $file['error'];
//     $tmpname = $file['tmp_name'];

//     // cek apakah tidak ada gambar yang diupload
//     if($error === 4){
//         echo "<script>
//                 alert('Pilih file terlebih dahulu!');
//             </script>";
//         return false;
//     }

//     // cek apakah yang diupload adalah gambar
//     $ekstensigambarvalid = ['pdf'];
//     $ekstensigambar = explode('.', $namafile);
//     $ekstensigambar = strtolower(end($ekstensigambar));
//     if(!in_array($ekstensigambar, $ekstensigambarvalid)){
//         echo "<script>
//                 alert('Yang anda upload bukan file pdf!');
//             </script>";
//         return false;
//     }

//     // cek jika ukurannya terlalu besar
//     if($ukuranfile > 1000000){
//         echo "<script>
//                 alert('Ukuran file terlalu besar!');
//             </script>";
//         return false;
//     }

//     // lolos pengecekan, gambar siap diupload
//     // generate nama file baru
//     $namafilebaru = uniqid();
//     $namafilebaru .= '.';
//     $namafilebaru .= $ekstensigambar;

//     move_uploaded_file($tmpname, '../'.$folder.'/'.$namafilebaru);

//     return $namafilebaru;
// }

// function update file pkl
function updatePkl($nim, $namafile)
{
    global $conn;
    $query = mysqli_query($conn, "UPDATE tb_pkl SET scan_pkl = '$namafile' WHERE nim = '$nim'");
    return $query;
}

// function update file skripsi
function updateSkripsi($nim, $namafile)
{
    global $conn;
    $query = mysqli_query($conn, "UPDATE tb_skripsi SET scan_skripsi = '$namafile' WHERE nim = '$nim'");
    return $query;
}

//function update file irs
function updateIrs($nim, $namafile, $semester)
{
    global $conn;
    $query = mysqli_query($conn, "UPDATE tb_irs SET file_irs='$namafile' WHERE nim=$nim AND semester=$semester");
    return $query;
}

// function update file khs
function updateKhs($nim, $smt, $namafile)
{
    global $conn;
    $query = mysqli_query($conn, "UPDATE tb_khs SET file_khs = '$namafile' WHERE nim = '$nim' AND semester = '$smt'");
    return $query;
}

// function update file sks
function uploadDetailKhs($data, $semester, $exist)
{
    global $conn;
    $id_khs = $_SESSION['id_khs'];
    $nim = $_SESSION['nim'];
    $sks = $data['sks'];
    $sksk = $data['sksk'];
    $ip = $data['ip'];
    $ipk = $data['ipk'];
    if ($exist == 0) {
        $queryinsert = mysqli_query($conn, "INSERT INTO tb_khs VALUES('NULL', '$semester', '$nim', '$sks', NULL, '$sksk', '$ip', '$ipk', 'belum')");
        return $queryinsert;
    } else {
        $queryupdate = mysqli_query($conn, "UPDATE tb_khs SET sks=$sks, sks_kumulatif=$sksk,ip_semester=$ip,ip_kumulatif=$ipk,verif_khs='belum' WHERE nim=$nim AND semester=$semester");
        return $queryupdate;
    }
}

// function update file skripsi
function uploadDetailSkripsi($data)
{
    global $conn;

    $nim = $_SESSION['nim'];
    $status_skripsi = $data['status_skripsi'];
    $nilai_skripsi = $data['nilai_skripsi'];
    $tanggal_sidang = $data['tanggal_sidang'];
    $scan_skripsi = $data['scan_skripsi'];
    $verif_skripsi = $data['verif_skripsi'];

    $query = mysqli_query($conn, "INSERT INTO tb_skripsi VALUES('$nim', '$status_skripsi', '$nilai_skripsi', '$tanggal_sidang', '$scan_skripsi', '$verif_skripsi')");
    return $query;
}

function getDosenList()
{
    // get dosen
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_dosen");
    while ($data = mysqli_fetch_assoc($query)) {
        echo '<option value="' . $data['nama'] . '">' . $data['nama'] . '</option>';
    }
}