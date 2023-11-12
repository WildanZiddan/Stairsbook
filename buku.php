<?php
require "connection.php";
$result = mysqli_query($connection, "SELECT * FROM buku");
$images = mysqli_query($connection, "SELECT * FROM buku");

// Create a new record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $targetDirectory = "Cover/"; // The directory where you want to store uploaded images
    $targetFile = $targetDirectory . basename($_FILES["cover"]["name"]);
    $absolutePath = $_SERVER['DOCUMENT_ROOT'] . '/' . $targetFile;
    $deskripsi = $_POST["deskripsi"];
    $judul_buku = $_POST["judul_buku"];
    $tahun_buku = $_POST["tahun_buku"];
    $kategori = $_POST["kategori"];
    $image_name = $_FILES["cover"]["name"];

    $sql = "INSERT INTO buku (Cover, file_path, Deskripsi, Judul_Buku, Tahun_Buku, Kategori) VALUES ('$image_name', '$absolutePath', '$deskripsi', '$judul_buku', '$tahun_buku', '$kategori')";
    mysqli_query($connection, $sql);

    move_uploaded_file($_FILES["cover"]["tmp_name"], $targetFile);
}

// Delete a record
if (isset($_GET["delete_id"])) {
    $delete_id = $_GET["delete_id"];
    $sql = "DELETE FROM buku WHERE id_buku = $delete_id";
    mysqli_query($connection, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/pelajaran.css">
</head>
<body>
    <?php include("navbar-admin.php"); ?>
    <form method="POST" enctype="multipart/form-data" action="">
        <label for="cover">Cover:</label>
        <input name="cover" type="file" required><br>

        <label for="deskripsi">Deskripsi:</label>
        <input type="text" name="deskripsi" required><br>

        <label for="judul_buku">Judul Buku:</label>
        <input type="text" name="judul_buku" required><br>

        <label for="tahun_buku">Tahun Buku:</label>
        <input type="text" name="tahun_buku" required><br>

        <label for="kategori">Kategori:</label>
        <input type="text" name="kategori" required><br>

        <input type="submit" name="add" value="Tambah">
    </form>

    <table style="width: 100%;">
        <thead>
        <tr>
            <th scope="col">Cover</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Tahun Buku</th>
            <th scope="col">Kategori</th>
            <th scope="col"></th>
        </tr>
        </thead>
        
        <tbody>
        <?php while( $row = mysqli_fetch_assoc($result) ): ?>
        <tr>
            <td><?= $row["Cover"]; ?></td>
            <td><?= $row["Deskripsi"]; ?></td>
            <td><?= $row["Judul_Buku"]; ?></td>
            <td><?= $row["Tahun_Buku"]; ?></td>
            <td><?= $row["Kategori"]; ?></td>
            <td>
                <a href="update.php?edit_id=<?= $row['id_buku'] ?>">Edit</a>
                <a href="?delete_id=<?= $row['id_buku'] ?>">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
