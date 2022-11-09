<?php

$status = $_GET['status'];

if($status == 'SEDANG MENGAMBIL'){
    echo '<option disabled> Tidak tersedia </option>';    
}else{
    echo '<option value="A"> A </option>';
    echo '<option value="B"> B </option>';
    echo '<option value="C"> C </option>';
}

?>