<?php

require('../function.php');

$keyword = $_GET['keyword'];
$keyword = (int) $keyword;

$result = getMatkul($keyword);

?>

		<table class="table" width="100%" id="irscontent">
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
              
              while ($data = mysqli_fetch_assoc($result)) {
                $matkul = $data['matakuliah'];
                $kode = $data['kode'];
                $waktu = $data['waktu'];
                $bobot = $data['sks'];
                $kelas = $data['kelas'];
                $pembelajaran = $data['pembelajaran'];
                ?>
              
                  <tr>
                    <th scope="row"><?= $matkul ?></th>
                    <td><?= $kode; ?></td>
                    <td><?= $waktu; ?></td>
                    <td><?= $bobot; ?></td>
                    <td><?= $kelas; ?></td>
                    <td><?= $pembelajaran; ?></td>
                    <td>
                      <button type="button" class="btn btn-primary">ADD</button>
                    </td>
                  </tr>
              <?php } ?>
            </tbody>
          </table>
