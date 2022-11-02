<?php
session_start();    
require_once '../function.php';

$nim = $_SESSION['nim'];
$smt = $_GET['semester'];

$khsDetail = getKhsDetail($nim, $smt);


echo '<div class="mx-5">
<div class="row">
  <div class="col-sm-10">
    <h3 class="mb-2">Semester Aktif : </h3>
  </div>
  <br>
  <div class="col-sm-11">
    <select onchange="get_khs(this.value)" class="form-select" name="smt" id="smt">
      <option value="" hidden>Pilih Semester</option>';
      
      for ($i = 1; $i <= 14; $i++) {
        if ($i == $smt) {
          echo '<option value="' . $i . '" selected>' . $i . '</option>';
        } else {
          echo '<option value="' . $i . '">' . $i . '</option>';
        }
        } 
echo '</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-11">
    <h3 class="mb-2">SKS :</h3>
    <input class="form-control mb-2" type="number" name="sks" value="' . $khsDetail['sks'] . '" />
  </div>
</div>
<div class="row">
  <div class="col-sm-11">
    <h3 class="mb-2">SKS Kumulatif :</h3>
    <input class="form-control mb-2" type="number" name="sksk" value="' . $khsDetail['sks_kumulatif'] . '" />
  </div>
</div>

<div class="row">
  <div class="col-sm-11">
    <h3 class="mb-2">IP :</h3>
    <input class="form-control mb-2" type="number" name="ip" step="0.01" value="' . $khsDetail['ip_semester'] . '" />
  </div>
</div>

<div class="row">
  <div class="col-sm-11">
    <h3>IPK : </h3>
    <input class="form-control mb-2" type="number" name="ipk" step="0.01" value="' . $khsDetail['ip_kumulatif'] . '" />
  </div>
</div>
<div class="d-flex justify-content-center">
  <button class="btn btn-primary mt-3" type="submit" id="submit" name="submit">Submit</button>
</div>
</div>';