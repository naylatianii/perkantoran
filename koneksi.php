<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "Perkantoran";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    error_log("Database connection failed: " . mysqli_connect_error());
    exit;
}
?>