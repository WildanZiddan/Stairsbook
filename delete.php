<?php 
include 'connection.php';
$ID = $_GET['id_buku'];
mysqli_query($connection, "DELETE FROM buku WHERE id_buku = $ID");

header('location:buku.php');
?>
