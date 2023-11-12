<?php
session_start();
include("connection.php");
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/profil.css">

    <script  text="text/javascript">
      window.history.forward();
    </script>
</head>
<body>
    <div class="navbar">
        <nav >
            <div class="logo">
              <a href="#"><img src="img/logo.png" alt=""></a>
            </div>
            <ul class="nav-links">
                <?php if ($_SESSION['username'] === "admin") { ?>
                <li><a href="admin.php">Admin</a></li>
                <?php } ?>
                <li><a href="home.php">Beranda</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="kategori.php">Kategori</a></li>
                <li><a href="aktivitas.php">Aktivitas</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
          </nav>
      </div>

      <div class="struktur">
            <h1>Struktur Organisasi</h1>
        <img src="img/Struktur.png" alt="">
      </div>

    <div class="panduan">
        <h1>Panduan Perpustakaan</h1>
        <div class="isi-panduan">
            <p>1. Masuk ke dalam akun anda</p>
            <p>2. Cari buku yang anda ingin pinjam</p>
            <p>3. Klik tombol "Pinjam"</p>
            <p>4. Ambil bukunya dan bawa pulang</p>
        </div>
    </div>

    <div class="aturan">
        <h1>Tata Tertib Perpustakaan</h1>
        <div class="isi-aturan">
            <p>1. Tidak boleh merusak buku</p>
            <p>2. Tidak boleh mengembalikan buku melewati masa peminjaman</p>
            <p>3. Maksimal peminjaman 3 buku</p>
            <p>4. Akan dikenakan denda jika telat mengembalikan / merusak buku</p>
        </div>
    </div>

    <div class="faq">
        <h1>Frequently Answering Question</h1>
        <div class="isi-faq">
            <p>1. Apa itu web perpustakaan online? <br>
                Web ini digunakan untuk mengetahui lebih lanjut tentang perpustakaan ini</p>
            <p>2. Bagaimana cara meminjamnya? <br>
                Hanya perlu mengisi data didalam formulir onlinenya</p>
        </div>
    </div>
</body>
</html>