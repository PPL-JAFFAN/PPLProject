<?php
session_start();
require_once '../function.php';

$nim = $_SESSION['nim'];
$kode_mk = $_GET['kode_mk'];

addIrsDiambil($nim, $kode_mk);

getIrsDiambil($nim);

$matkulDetail = getMatkul(1);
?>

<thead>
    <tr>
        <th scope="col">Mata Kuliah</th>
        <th scope="col">Kode Matkul</th>
        <th scope="col">Waktu</th>
        <th scope="col">Jumlah SKS</th>
        <th scope="col">Kelas</th>
        <th scope="col">Jenis Pembelajaran</th>
        <th scope="col">Actions</th>
    </tr>
</thead>
<tbody>
    <?php

    while ($data = mysqli_fetch_assoc($matkulDetail)) {
        $matkul = $data['matakuliah'];
        $kode_mk = $data['kode_mk'];
        $waktu = $data['waktu'];
        $bobot = $data['sks'];
        $kelas = $data['kelas'];
        $pembelajaran = $data['pembelajaran'];
    ?>

        <tr>
            <th scope="row"><?= $matkul ?></th>
            <td><?= $kode_mk; ?></td>
            <td><?= $waktu; ?></td>
            <td><?= $bobot; ?></td>
            <td><?= $kelas; ?></td>
            <td><?= $pembelajaran; ?></td>
            <td>
                <?php
                //check if the matkul is already in irs
                $irsDiambilDetail = getIrsDiambil($_SESSION['nim']);
                $isInIrs = false; 
                while ($data = mysqli_fetch_assoc($irsDiambilDetail)) {
                    if ($data['kode_mk'] == $kode_mk) {
                        $isInIrs = true;
                    }
                }
                if ($isInIrs) {
                    echo '<button type="button" class="btn btn-success" disabled">ADDED</button>';
                } else {
                    echo '<button type="button" class="btn btn-primary" onclick="add_irs(' . $kode_mk . ')">ADD</button>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
</tbody>