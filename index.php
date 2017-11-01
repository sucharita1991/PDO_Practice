<?php
$dsn = 'mysql:dbname=sd686;host=sql1.njit.edu';
$user = 'sd686';
$password = 'ZOm1EN5l3';
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected successfully</br>';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage().'</br>';
}
?>