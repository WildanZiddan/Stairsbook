<?php
include 'connection.php';
if (isset($_POST["add"])) {
    $ID = $_POST["id_buku"];
    $cover = $_FILES ["cover"];
    $cover_loc = $_FILES ["cover"]["tmp_name"];
    $cover_name = $_FILES ["cover"]["name"];
    $cover_des = "Buku/" .$cover_name;
    $deskripsi = $_POST["deskripsi"];
    $judul_buku = $_POST["judul_buku"];
    $tahun_buku = $_POST["tahun_buku"];
    $kategori = $_POST["kategori"];

    mysqli_query($connection, "UPDATE buku SET Cover = '$cover_des', Deskripsi='$deskripsi', Judul_Buku='$judul_buku', Tahun_Buku='$tahun_buku', Kategori='$kategori' WHERE id_buku='$ID'");

    move_uploaded_file($cover_loc, 'Buku/'.$cover_name);
    header("location:buku.php");
}
?>