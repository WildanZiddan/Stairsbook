<?php include("header.php");
      if ($_SESSION['username'] !== "admin") {
          header("Location: home.php");
          exit();
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/admin.css">

    <script text="text/javascript">
      window.history.forward();
    </script>
</head>
<body>
  <?php include("navbar-admin.php"); ?>
    <div class="home">
        <h1 class="title">Selamat datang di halaman Admin</h1>
        <p class="subtitle">Ini halaman admin yang memiliki fitur CRUD</p>
    </div>
</body>
</html>