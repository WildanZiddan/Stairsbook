<?php
require "config.php";

$ID = $_GET['id_peminjam'];
$Record = mysqli_query($conn, "SELECT * FROM namapinjam WHERE id_peminjam = $ID");
$data = mysqli_fetch_array($Record);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data" action="updatepinjam1.php">
        <label for="nama_peminjam">Nama Peminjam:</label>
        <input type="text" name="nama_peminjam" value="<?php echo $data['nama_peminjam']?>" required><br>

        <label for="judul_buku">Judul Buku:</label>
        <input type="text" name="judul_buku" value="<?php echo $data['judul_buku']?>" required><br>

        <label for="batas_pengembalian">Batas Pengembalian:</label>
        <input type="text" name="batas_pengembalian" value="<?php echo $data['batas_pengembalian']?>" required><br>

        <input type="hidden" name="id_peminjam" value="<?php echo $data['id_peminjam']?>">

        <button type="submit" name="add">Tambah</button>
    </form>
</body>
</html>
