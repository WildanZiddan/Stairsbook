<?php
session_start();
include("connection.php");
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}
?>