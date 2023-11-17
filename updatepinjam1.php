<?php
include 'config.php';
if (isset($_POST["add"])) {
    $ID = $_POST["id_peminjam"];
    $nama_peminjam = $_POST["nama_peminjam"];
    $judul_buku = $_POST["judul_buku"];
    $batas_pengembalian = $_POST["batas_pengembalian$batas_pengembalian"];

    mysqli_query($conn, "UPDATE buku SET Cover = '$cover_des', nama_peminjam='$nama_peminjam', judul_buku='$judul_buku', batas_pengembalian$batas_pengembalian='$batas_pengembalian', Kategori='$kategori' WHERE id_peminjam='$ID'");
    header("location:pinjam.php");
}
?>