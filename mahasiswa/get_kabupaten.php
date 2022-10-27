<?php
require_once('../db_login.php');
$kabupatenid = $_GET['id_prov'];
//Asign a query
$querypropinsi = mysqli_query($conn," SELECT * FROM tb_kota WHERE id_provinsi = '$kabupatenid'");
if (!$querypropinsi){
   die ("Could not query the database: <br />". $db->error);
}
// Fetch and display the results
while ($row = $querypropinsi->fetch_object()){
	echo '<option value="'.$row->id.'">'.$row->nama.'</option>';
}
$result->free();
$db->close();
?>

