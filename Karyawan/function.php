<?php
include "../koneksi.php";

// FUNGSI
function insertKaryawan($koneksi, $Nama_Lengkap, $Jenis_Kelamin, $TTL, $Jabatan, $No_Hp, $Email, $Tahun_Masuk, $Alamat) {
    $query = "INSERT INTO Karyawan (Nama_Lengkap, Jenis_Kelamin, TTL, Jabatan, No_Hp, Email, Tahun_Masuk, Alamat) VALUES ('$Nama_Lengkap', '$Jenis_Kelamin', '$TTL', '$Jabatan', '$No_Hp', '$Email', '$Tahun_Masuk', '$Alamat')";
    return mysqli_query($koneksi, $query);
}

function updateKaryawan($koneksi, $Nama_Lengkap, $Jenis_Kelamin, $TTL, $Jabatan, $No_Hp, $Email, $Tahun_Masuk, $Alamat) {
    $query = "UPDATE Karyawan SET Nama_Lengkap='$Nama_Lengkap', Jenis_Kelamin='$Jenis_Kelamin', TTL='$TTL', Jabatan='$Jabatan', No_Hp='$No_Hp', Email='$Email', Tahun_Masuk='$Tahun_Masuk', Alamat='$Alamat' WHERE Id_Karyawan=$Id_Karyawan";
    return mysqli_query($koneksi, $query);
}

function deleteKaryawan($koneksi, $Id_Karyawan) {
    $query = "DELETE FROM Karyawan WHERE Id_Karyawan=$Id_Karyawan";
    return mysqli_query($koneksi, $query);
}

// INSERT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'insert') {
    $Nama_Lengkap= $_POST["Nama_Lengkap"];
    $Jenis_Kelamin = $_POST["Jenis_Kelamin"];
    $TTL = $_POST["TTL"];
    $Jabatan = $_POST["Jabatan"];
    $No_Hp = $_POST["No_Hp"];
    $Email = $_POST["Email"];
    $Tahun_Masuk = $_POST["Tahun_Masuk"];
    $Alamat = $_POST["Alamat"];

    if (insertKaryawan($koneksi, $Nama_Lengkap, $Jenis_Kelamin, $TTL, $Jabatan, $No_Hp, $Email, $Tahun_Masuk, $Alamat)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal disimpan";
    }
}

// EDIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'edit') {
    $Nama_Lengkap= $_POST["Nama_Lengkap"];
    $Jenis_Kelamin = $_POST["Jenis_Kelamin"];
    $TTL = $_POST["TTL"];
    $Jabatan = $_POST["Jabatan"];
    $No_Hp = $_POST["No_Hp"];
    $Email = $_POST["Email"];
    $Tahun_Masuk = $_POST["Tahun_Masuk"];
    $Alamat = $_POST["Alamat"];

    if (updateKaryawan($koneksi, $Nama_Lengkap, $Jenis_Kelamin, $TTL, $Jabatan, $No_Hp, $Email, $Tahun_Masuk, $Alamat)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah";
    }
}

// DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'delete') {
    $Id_Karyawan = $_GET["Id_Karyawan"];

    if (deleteKaryawan($koneksi, $Id_Karyawan)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus";
    }
}
?>