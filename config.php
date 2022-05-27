<?php
//$conn = mysqli_connect("localhost", "root", "", "refactory");
/*
try
{
    //new PDO('mysql:host=mysql.cms.gre.ac.uk; dbname=mdb_', '', '');
   / $pdo = new PDO('mysql:host=localhost; dbname=refactory', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');

} catch (PDOException $e) {

    $error = 'Unable to connect to database server';
    include 'error.index.php';
    exit();
} */
$dsn  = 'mysql:host=localhost; dbname=refactory';
    $user = 'root';
    $pass = '';
    
    try
    {
        $pdo = new PDO($dsn, $user, $pass);
    }
    catch(PDOException $e)
    {
        echo 'Connnection error! ' . $e->getMessage();
    }
?>