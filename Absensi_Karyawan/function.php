<?php
include("../koneksi.php");

function insertAbsensi($koneksi, $Id_Karyawan, $Tanggal, $Agenda, $Jam_Masuk, $Jam_Keluar, $Status) {
    $query = "INSERT INTO Absensi_Karyawan (Id_Karyawan, Tanggal, Agenda, Jam_Masuk, Jam_Keluar, Status)
              VALUES ('$Id_Karyawan', '$Tanggal', '$Agenda', '$Jam_Masuk', '$Jam_Keluar', '$Status')";
    return mysqli_query($koneksi, $query);
}

function updateAbsensi($koneksi, $Id_Karyawan, $Tanggal, $Agenda, $Jam_Masuk, $Jam_Keluar, $Status) {
    $query = "UPDATE Absensi_Karyawan
              SET Agenda='$Agenda', Jam_Masuk='$Jam_Masuk', Jam_Keluar='$Jam_Keluar', Status='$Status'
              WHERE Id_Karyawan='$Id_Karyawan' AND Tanggal='$Tanggal'";
    return mysqli_query($koneksi, $query);
}

function deleteAbsensi($koneksi, $Id_Karyawan, $Tanggal) {
    $query = "DELETE FROM Absensi_Karyawan WHERE Id_Karyawan='$Id_Karyawan' AND Tanggal='$Tanggal'";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST["action"] ?? '';
    $Id_Karyawan = $_POST["Id_Karyawan"] ?? '';
    $Tanggal = $_POST["Tanggal"] ?? '';
    $Agenda = $_POST["Agenda"] ?? '';
    $Jam_Masuk = $_POST["Jam_Masuk"] ?? '';
    $Jam_Keluar = $_POST["Jam_Keluar"] ?? '';
    $Status = $_POST["Status"] ?? '';

    if (empty($Id_Karyawan) || empty($Tanggal)) {
        echo "ID Karyawan dan Tanggal tidak boleh kosong!";
        exit;
    }

    if ($action == 'insert') {
        if (insertAbsensi($koneksi, $Id_Karyawan, $Tanggal, $Agenda, $Jam_Masuk, $Jam_Keluar, $Status)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal menambahkan absensi: " . mysqli_error($koneksi);
        }
    } elseif ($action == 'edit') {
        if (updateAbsensi($koneksi, $Id_Karyawan, $Tanggal, $Agenda, $Jam_Masuk, $Jam_Keluar, $Status)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal mengedit absensi: " . mysqli_error($koneksi);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'delete') {
    $Id_Karyawan = $_GET["Id_Karyawan"] ?? '';
    $Tanggal = $_GET["Tanggal"] ?? '';

    if (deleteAbsensi($koneksi, $Id_Karyawan, $Tanggal)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus! Error: " . mysqli_error($koneksi);
    }
}
?>
