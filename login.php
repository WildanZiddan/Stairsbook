<?php
session_start();
if(isset($_SESSION['username']))
{
    $_SESSION['username'] = $_SERVER['REQUEST_URI'];
    $_SESSION['username'] = true;
    header("Location:home.php");
    exit;
}

include("connection.php");
if (isset($_POST['Login'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = $_POST['password'];
    $select = "SELECT * FROM admin WHERE username = '$username' && password = '$password'";
    $result = mysqli_query($connection, $select);

    if(mysqli_num_rows($result) > 0 ){
        $row = mysqli_fetch_array($result);
        $name = $row['username'];
        $_SESSION['username'] = $name;
        header('location:home.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="./CSS/login.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form class="form" action="" method="post">
            <input type="text" name="username" class="input"  placeholder="Nama" required><br><br>

            <input type="password" name="password" placeholder="Kata sandi" class="input" ><br><br>

            <input type="submit" name="Login" value="Login" class="input button">
        </form>
    </div>
</body>
</html>