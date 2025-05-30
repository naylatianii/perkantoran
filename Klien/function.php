<?php
include("../koneksi.php");

// FUNGSI
function insertKlien($koneksi, $Nama_Klien, $Nama_Perusahaan, $Jam_Mulai, $Jam_Selesai, $Tanggal_Kunjungan) {
    $query = "INSERT INTO Klien (Nama_Klien, Nama_Perusahaan, Jam_Mulai, Jam_Selesai, Tanggal_Kunjungan) 
              VALUES ('$Nama_Klien', '$Nama_Perusahaan', '$Jam_Mulai', '$Jam_Selesai', '$Tanggal_Kunjungan')";
    return mysqli_query($koneksi, $query);
}

function updateKlien($koneksi, $Id_Klien, $Nama_Klien, $Nama_Perusahaan, $Jam_Mulai, $Jam_Selesai, $Tanggal_Kunjungan) {
    $query = "UPDATE Klien 
              SET Nama_Klien='$Nama_Klien', Nama_Perusahaan='$Nama_Perusahaan', 
                  Jam_Mulai='$Jam_Mulai', Jam_Selesai='$Jam_Selesai', Tanggal_Kunjungan='$Tanggal_Kunjungan' 
              WHERE Id_Klien=$Id_Klien";
    return mysqli_query($koneksi, $query);
}

function deleteKlien($koneksi, $Id_Klien) {
    $Id_Klien = (int)$Id_Klien;

    $cek = mysqli_query($koneksi, "SELECT * FROM proyek WHERE Id_Klien = $Id_Klien");
    if (mysqli_num_rows($cek) > 0) {
        echo "Maaf, tidak bisa dihapus! Klien masih digunakan di tabel proyek.";
        exit;
    }

    $query = "DELETE FROM Klien WHERE Id_Klien=$Id_Klien";
    return mysqli_query($koneksi, $query);
}

// INSERT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'insert') {
    $Id_Klien = $_POST["Id_Klien"];
    $Nama_Klien = $_POST["Nama_Klien"];
    $Nama_Perusahaan = $_POST["Nama_Perusahaan"];
    $Jam_Mulai = $_POST["Jam_Mulai"];
    $Jam_Selesai = $_POST["Jam_Selesai"];
    $Tanggal_Kunjungan = $_POST["Tanggal_Kunjungan"];

    $query = "INSERT INTO Klien (Id_Klien, Nama_Klien, Nama_Perusahaan, Jam_Mulai, Jam_Selesai, Tanggal_Kunjungan) 
              VALUES ('$Id_Klien', '$Nama_Klien', '$Nama_Perusahaan', '$Jam_Mulai', '$Jam_Selesai', '$Tanggal_Kunjungan')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan klien: " . mysqli_error($koneksi);
    }
}

// EDIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'edit') {
    $Id_Klien = $_POST["Id_Klien"];
    $Nama_Klien = $_POST["Nama_Klien"];
    $Nama_Perusahaan = $_POST["Nama_Perusahaan"];
    $Jam_Mulai = $_POST["Jam_Mulai"];
    $Jam_Selesai = $_POST["Jam_Selesai"];
    $Tanggal_Kunjungan = $_POST["Tanggal_Kunjungan"];

    if (updateKlien($koneksi, $Id_Klien, $Nama_Klien, $Nama_Perusahaan, $Jam_Mulai, $Jam_Selesai, $Tanggal_Kunjungan)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah";
    }
}

// DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'delete') {
    $Id_Klien = $_GET["Id_Klien"] ?? null;

    if ($Id_Klien !== null) {
        deleteKlien($koneksi, $Id_Klien);
        header("Location: index.php");
        exit;
    } else {
        echo "ID Klien tidak ditemukan!";
    }
}
?>