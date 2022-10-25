<?php
session_start();
require_once '../function.php';

$nim = $_SESSION['nim'];
$kode_mk = $_GET['kode_mk'];

deleteIrsDiambil($nim, $kode_mk);

$irsDiambilDetail = getIrsDiambil($_SESSION['nim']);
?>

<thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Matkul</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Waktu</th>
                <th scope="col">Jumlah SKS</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jenis Pembelajaran</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              while ($data = mysqli_fetch_assoc($irsDiambilDetail)) {
                $kode_mk = $data['kode_mk'];
                $matkul = $data['matakuliah'];
                $waktu = $data['waktu'];
                $sks = $data['sks'];
                $kelas = $data['kelas'];
                $pembelajaran = $data['pembelajaran'];
                $status_irs = $data['status_irs'];
                ?>
              
                  <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $kode_mk; ?></td>
                    <td><?= $matkul; ?></td>
                    <td><?= $waktu; ?></td>
                    <td><?= $sks; ?></td>
                    <td><?= $kelas; ?></td>
                    <td><?= $pembelajaran; ?></td>
                    <td><?= $status_irs; ?></td>
                    <td>
                      <button type="button" class="btn btn-danger" onclick="delete_irs('<?= $kode_mk ?>')">CANCEL</button>
                    </td>
                  </tr>
              <?php $i++; } ?>
            </tbody>