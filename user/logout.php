<?php
session_start();
include'../config.php';
$id = $_SESSION['nama'];

unset($_SESSION['nama']);
header('location: ../index.php');
?>