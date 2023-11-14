<?php
require "connection.php";

$ID = $_GET['id_buku'];
$Record = mysqli_query($connection, "SELECT * FROM buku WHERE id_buku = $ID");
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
    <form method="POST" enctype="multipart/form-data" action="update1.php">
        <label for="cover">Cover:</label>
        <td><input name="cover" type="file" value="<?php echo $data['Cover']?>" required><img src="<?php echo $data['Cover']?>" alt="" width="85px" height="120px"></td><br>

        <label for="deskripsi">Deskripsi:</label>
        <input type="text" name="deskripsi" value="<?php echo $data['Deskripsi']?>" required><br>

        <label for="judul_buku">Judul Buku:</label>
        <input type="text" name="judul_buku" value="<?php echo $data['Judul_Buku']?>" required><br>

        <label for="tahun_buku">Tahun Buku:</label>
        <input type="text" name="tahun_buku" value="<?php echo $data['Tahun_Buku']?>" required><br>

        <label for="kategori">Kategori:</label>
        <input type="text" name="kategori" value="<?php echo $data['Kategori']?>" required><br>

        <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']?>">

        <button type="submit" name="add">Tambah</button>
    </form>
</body>
</html>
