<link rel="stylesheet" href="./CSS/navbar.css">
<div class="navbar">
    <nav >
        <div class="logo">
          <a href="home.php"><img src="img/logo.png" alt=""></a>
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