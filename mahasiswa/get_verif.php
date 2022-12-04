<?php
require '../function.php';

$nim = $_GET['nim'];
$smt = $_GET['semester'];

$data = getIrsVerif($nim, $smt);

if (empty($data['verif_irs'])) {
    $verif = 'belum';
    $color = 'red';
    $sks = 0;
} else {
    $verif = $data['verif_irs'];
    $sks = $data['sks'];
    if ($verif == 'belum') {
        $color = 'red';
    } else {
        $color = 'green';
    }
}

echo '<div class="form-group mt-3">
        <label for="sks">Jumlah SKS :</label>
        <input type="number" class="form-control" name="sks" value="' . $sks . '" />
    </div>
    <div class="form-group mt-3">
        <label for="verif_irs">Verifikasi oleh Dosen Wali: </label>
        <h5 style="color:' . $color . ' ">' . $verif . ' </h5>        
    </div>'

// echo '<label for="verif_irs">Verifikasi oleh Dosen Wali: </label>
    // <h5 style="color:'.$color .' ">' . $verif . ' </h5>'

?>