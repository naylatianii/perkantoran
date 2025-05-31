<?php
include("../koneksi.php");

// Fungsi cek apakah Id_Klien sudah ada
function checkIdKlienExists($koneksi, $Id_Klien) {
    $Id_Klien = (int)$Id_Klien;
    $result = mysqli_query($koneksi, "SELECT 1 FROM Klien WHERE Id_Klien = $Id_Klien");
    return mysqli_num_rows($result) > 0;
}

// Fungsi insert Klien
function insertKlien($koneksi, $data) {
    $Id_Klien = (int)$data['Id_Klien'];
    $Nama_Klien = mysqli_real_escape_string($koneksi, $data['Nama_Klien']);
    $Nama_Perusahaan = mysqli_real_escape_string($koneksi, $data['Nama_Perusahaan']);
    $Jam_Mulai = mysqli_real_escape_string($koneksi, $data['Jam_Mulai']);
    $Jam_Selesai = mysqli_real_escape_string($koneksi, $data['Jam_Selesai']);
    $Tanggal_Kunjungan = mysqli_real_escape_string($koneksi, $data['Tanggal_Kunjungan']);

    $query = "INSERT INTO Klien (Id_Klien, Nama_Klien, Nama_Perusahaan, Jam_Mulai, Jam_Selesai, Tanggal_Kunjungan) 
              VALUES ($Id_Klien, '$Nama_Klien', '$Nama_Perusahaan', '$Jam_Mulai', '$Jam_Selesai', '$Tanggal_Kunjungan')";
    
    if (!mysqli_query($koneksi, $query)) {
        return "Error insert Klien: " . mysqli_error($koneksi);
    }
    return true;
}

// Fungsi update Klien
function updateKlien($koneksi, $data) {
    $Id_Klien = (int)$data['Id_Klien'];
    $Nama_Klien = mysqli_real_escape_string($koneksi, $data['Nama_Klien']);
    $Nama_Perusahaan = mysqli_real_escape_string($koneksi, $data['Nama_Perusahaan']);
    $Jam_Mulai = mysqli_real_escape_string($koneksi, $data['Jam_Mulai']);
    $Jam_Selesai = mysqli_real_escape_string($koneksi, $data['Jam_Selesai']);
    $Tanggal_Kunjungan = mysqli_real_escape_string($koneksi, $data['Tanggal_Kunjungan']);

    $query = "UPDATE Klien SET 
                Nama_Klien='$Nama_Klien', 
                Nama_Perusahaan='$Nama_Perusahaan', 
                Jam_Mulai='$Jam_Mulai', 
                Jam_Selesai='$Jam_Selesai', 
                Tanggal_Kunjungan='$Tanggal_Kunjungan' 
              WHERE Id_Klien=$Id_Klien";

    if (!mysqli_query($koneksi, $query)) {
        return "Error update Klien: " . mysqli_error($koneksi);
    }
    return true;
}

// Fungsi delete Klien
function deleteKlien($koneksi, $Id_Klien) {
    $Id_Klien = (int)$Id_Klien;

    // Cek apakah Klien masih digunakan di tabel proyek
    $cek = mysqli_query($koneksi, "SELECT 1 FROM proyek WHERE Id_Klien = $Id_Klien");
    if (mysqli_num_rows($cek) > 0) {
        return "Maaf, tidak bisa dihapus! Klien masih digunakan di tabel proyek.";
    }

    $query = "DELETE FROM Klien WHERE Id_Klien=$Id_Klien";
    if (!mysqli_query($koneksi, $query)) {
        return "Error delete Klien: " . mysqli_error($koneksi);
    }
    return true;
}

// Proses Insert
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'insert') {
    $data = $_POST;

    // Cek ID sudah ada atau belum
    if (checkIdKlienExists($koneksi, $data['Id_Klien'])) {
        echo "ID Klien sudah ada. Gunakan ID lain.";
        exit;
    }

    $result = insertKlien($koneksi, $data);
    if ($result === true) {
        header("Location: index.php");
        exit;
    } else {
        echo $result;
    }
}

// Proses Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $data = $_POST;

    $result = updateKlien($koneksi, $data);
    if ($result === true) {
        header("Location: index.php");
        exit;
    } else {
        echo $result;
    }
}

// Proses Delete
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $Id_Klien = $_GET['Id_Klien'] ?? null;

    if ($Id_Klien === null) {
        echo "ID Klien tidak ditemukan!";
        exit;
    }

    $result = deleteKlien($koneksi, $Id_Klien);
    if ($result === true) {
        header("Location: index.php");
        exit;
    } else {
        echo $result;
    }
}
?>