<?php
include("../koneksi.php");

// Fungsi cek apakah Id_Ruangan sudah ada
function checkIdRuanganExists($koneksi, $Id_Ruangan) {
    $Id_Ruangan = (int)$Id_Ruangan;
    $result = mysqli_query($koneksi, "SELECT 1 FROM Ruangan WHERE Id_Ruangan = $Id_Ruangan");
    return mysqli_num_rows($result) > 0;
}

// Fungsi cek apakah Id_Inventaris ada di tabel inventaris
function checkIdInventarisExists($koneksi, $Id_Inventaris) {
    $Id_Inventaris = (int)$Id_Inventaris;
    $result = mysqli_query($koneksi, "SELECT 1 FROM inventaris WHERE Id_Inventaris = $Id_Inventaris");
    return mysqli_num_rows($result) > 0;
}

// Fungsi insert Ruangan
function insertRuangan($koneksi, $data) {
    $Id_Ruangan     = (int)$data['Id_Ruangan'];
    $Id_Inventaris  = (int)$data['Id_Inventaris'];
    $Nama_Ruangan   = mysqli_real_escape_string($koneksi, $data['Nama_Ruangan']);
    $Kapasitas      = (int)$data['Kapasitas'];
    $Fasilitas      = mysqli_real_escape_string($koneksi, $data['Fasilitas']);
    $Lokasi         = mysqli_real_escape_string($koneksi, $data['Lokasi']);
    $Status         = mysqli_real_escape_string($koneksi, $data['Status']);

    $query = "INSERT INTO Ruangan (Id_Ruangan, Id_Inventaris, Nama_Ruangan, Kapasitas, Fasilitas, Lokasi, Status)
              VALUES ($Id_Ruangan, $Id_Inventaris, '$Nama_Ruangan', $Kapasitas, '$Fasilitas', '$Lokasi', '$Status')";

    return mysqli_query($koneksi, $query);
}

// Fungsi update Ruangan
function updateRuangan($koneksi, $data) {
    $Id_Ruangan     = (int)$data['Id_Ruangan'];
    $Id_Inventaris  = (int)$data['Id_Inventaris'];
    $Nama_Ruangan   = mysqli_real_escape_string($koneksi, $data['Nama_Ruangan']);
    $Kapasitas      = (int)$data['Kapasitas'];
    $Fasilitas      = mysqli_real_escape_string($koneksi, $data['Fasilitas']);
    $Lokasi         = mysqli_real_escape_string($koneksi, $data['Lokasi']);
    $Status         = mysqli_real_escape_string($koneksi, $data['Status']);

    $query = "UPDATE Ruangan SET 
                Id_Inventaris = $Id_Inventaris,
                Nama_Ruangan = '$Nama_Ruangan',
                Kapasitas = $Kapasitas,
                Fasilitas = '$Fasilitas',
                Lokasi = '$Lokasi',
                Status = '$Status'
              WHERE Id_Ruangan = $Id_Ruangan";

    return mysqli_query($koneksi, $query);
}

// Fungsi delete Ruangan
function deleteRuangan($koneksi, $Id_Ruangan) {
    $Id_Ruangan = (int)$Id_Ruangan;

    $query = "DELETE FROM Ruangan WHERE Id_Ruangan = $Id_Ruangan";
    return mysqli_query($koneksi, $query);
}

// PROSES INSERT
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'insert') {
    $data = $_POST;

    if (empty($data['Id_Ruangan']) || empty($data['Id_Inventaris'])) {
        echo "Id_Ruangan dan Id_Inventaris harus diisi!";
        exit;
    }

    if (checkIdRuanganExists($koneksi, $data['Id_Ruangan'])) {
        echo "Id_Ruangan sudah terpakai!";
        exit;
    }

    if (!checkIdInventarisExists($koneksi, $data['Id_Inventaris'])) {
        echo "Id_Inventaris tidak ditemukan!";
        exit;
    }

    if (insertRuangan($koneksi, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan ruangan! " . mysqli_error($koneksi);
    }
}

// PROSES UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $data = $_POST;

    if (empty($data['Id_Ruangan']) || empty($data['Id_Inventaris'])) {
        echo "Id_Ruangan dan Id_Inventaris harus diisi!";
        exit;
    }

    if (!checkIdInventarisExists($koneksi, $data['Id_Inventaris'])) {
        echo "Id_Inventaris tidak ditemukan!";
        exit;
    }

    if (updateRuangan($koneksi, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengubah ruangan! " . mysqli_error($koneksi);
    }
}

// PROSES DELETE
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $Id_Ruangan = $_GET["Id_Ruangan"];

    if (deleteRuangan($koneksi, $Id_Ruangan)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus ruangan! " . mysqli_error($koneksi);
    }
}
?>