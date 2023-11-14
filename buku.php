<?php
require "connection.php";
$result = mysqli_query($connection, "SELECT * FROM buku");

// Create a new record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $cover = $_FILES ["cover"];
    $cover_loc = $_FILES ["cover"]["tmp_name"];
    $cover_name = $_FILES ["cover"]["name"];
    $cover_des = "Buku/" .$cover_name;
    $deskripsi = $_POST["deskripsi"];
    $judul_buku = $_POST["judul_buku"];
    $tahun_buku = $_POST["tahun_buku"];
    $kategori = $_POST["kategori"];

    mysqli_query($connection, "INSERT INTO buku (Cover, Deskripsi, Judul_Buku, Tahun_Buku, Kategori) VALUES ('$cover_des', '$deskripsi', '$judul_buku', '$tahun_buku', '$kategori')");

    move_uploaded_file($cover_loc, 'Buku/'.$cover_name);

    function is_image($file) {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        return in_array($ext, $imageExtensions);
    }
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
        <?php 
            //while( $row = mysqli_fetch_assoc($result) ): 
            include 'connection.php';
            $pic = mysqli_query($connection, "SELECT * FROM buku");
            while($row = mysqli_fetch_array($pic)) {
        ?>
        <tr>
            <td><img src="<?= $row['Cover'] ?>" alt="" width="70px" height="120px"></td>
            <td><?= $row["Deskripsi"]; ?></td>
            <td><?= $row["Judul_Buku"]; ?></td>
            <td><?= $row["Tahun_Buku"]; ?></td>
            <td><?= $row["Kategori"]; ?></td>
            <td>
                <a href="update.php? id_buku=<?= $row['id_buku'] ?>">Edit</a>
                <a href="delete.php? id_buku=<?= $row['id_buku'] ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
