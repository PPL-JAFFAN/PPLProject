<?php
    require_once('../db_login.php');
    $nim = $_GET['nim'];
	$query = "DELETE FROM tb_mhs WHERE nim=$nim";
    $connect = mysqli_query($conn, $query);

    if ($connect){
        echo "<p>UPDATE SUCCESSFUL </p>";
    }
    else{
        echo $nim.' '.$status;
        echo 'gagal';
    }

?>