<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "kantorkerja";

$koneksi = mysqli_connect($host, $user, $password, $database,4307);

if (!$koneksi) {
    error_log("Database connection failed: " . mysqli_connect_error());
    exit;
}
?>
