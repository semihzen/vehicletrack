<?php 
$vt_server = "localhost";
$vt_username = "root"; 
$vt_password = ""; 
$vt_databasename = "database"; 

$connect = mysqli_connect($vt_server, $vt_username, $vt_password, $vt_databasename);

if(!$connect){
    die("Bağlantı hatası: " . mysqli_connect_error());
}


?>
