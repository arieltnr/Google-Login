<?php
include'../config.php';
session_start();
if(empty($_SESSION['nama'])){
    header('location: ../index.php');
}
ob_start();
$id = $_SESSION['nama'];

?>

<h3> Hallo! <?php echo $id; ?> </h3>
<a href="logout.php" class="btn btn-danger" onclick="return confirm('Yakin Logout???')">Log Out