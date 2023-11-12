<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $edit_id = $_POST["edit_id"];
    $cover = $_POST["cover"];
    $deskripsi = $_POST["deskripsi"];
    $judul_buku = $_POST["judul_buku"];
    $tahun_buku = $_POST["tahun_buku"];
    $kategori = $_POST["kategori"];

    $sql = "UPDATE buku SET Cover = '$cover', Deskripsi = '$deskripsi', Judul_Buku = '$judul_buku', Tahun_Buku = '$tahun_buku', Kategori = '$kategori' WHERE id_buku = $edit_id";
    mysqli_query($connection, $sql);
}

if (isset($_GET["edit_id"])) {
    $edit_id = $_GET["edit_id"];
    $edit_query = "SELECT * FROM buku WHERE id_buku = $edit_id";
    $edit_result = mysqli_query($connection, $edit_query);
    $edit_data = mysqli_fetch_assoc($edit_result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
</head>
<body>
    <form method="POST" action="">
        <?php if ($edit_data): ?>
            <input type="hidden" name="edit_id" value="<?= $edit_data['id_buku'] ?>">
            <label for="cover">Cover:</label>
            <input name="cover" type="file" required><br>

            <label for="deskripsi">Deskripsi:</label>
            <input type="text" name="deskripsi" value="<?= $edit_data['Deskripsi'] ?>" required><br>

            <label for="judul_buku">Judul Buku:</label>
            <input type="text" name="judul_buku" value="<?= $edit_data['Judul_Buku'] ?>" required><br>

            <label for="tahun_buku">Tahun Buku:</label>
            <input type="text" name="tahun_buku" value="<?= $edit_data['Tahun_Buku'] ?>" required><br>

            <label for="kategori">Kategori:</label>
            <input type="text" name="kategori" value="<?= $edit_data['Kategori'] ?>" required><br>

            <input type="submit" name="update" value="Update">
        <?php else: ?>
            <p>Record not found.</p>
        <?php endif; ?>
    </form>
</body>
</html>
