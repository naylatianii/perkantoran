<?php
ob_start(); // Aktifkan output buffering supaya header() bisa berjalan tanpa masalah
include("../koneksi.php");

// --- Cek apakah Id_Karyawan, Id_Divisi, dan Id_Ruangan valid ---
function checkIdExists($koneksi, $table, $column, $value) {
    $value = mysqli_real_escape_string($koneksi, $value);
    $query = "SELECT 1 FROM $table WHERE $column = '$value'";
    $result = mysqli_query($koneksi, $query);
    return mysqli_num_rows($result) > 0;
}

// --- Fungsi insert Jadwal_Meeting ---
function insertJadwalMeeting($koneksi, $data) {
    $query = "INSERT INTO Jadwal_Meeting (
                Id_meeting, Id_Karyawan, Agenda, Tanggal, Jam_Mulai, Jam_Selesai, Lokasi, Id_Divisi, Id_Ruangan
            ) VALUES (
                '".mysqli_real_escape_string($koneksi, $data['Id_meeting'])."',
                '".mysqli_real_escape_string($koneksi, $data['Id_Karyawan'])."',
                '".mysqli_real_escape_string($koneksi, $data['Agenda'])."',
                '".mysqli_real_escape_string($koneksi, $data['Tanggal'])."',
                '".mysqli_real_escape_string($koneksi, $data['Jam_Mulai'])."',
                '".mysqli_real_escape_string($koneksi, $data['Jam_Selesai'])."',
                '".mysqli_real_escape_string($koneksi, $data['Lokasi'])."',
                '".mysqli_real_escape_string($koneksi, $data['Id_Divisi'])."',
                '".mysqli_real_escape_string($koneksi, $data['Id_Ruangan'])."'
            )";

    if (!mysqli_query($koneksi, $query)) {
        echo "Error insert Jadwal_Meeting: " . mysqli_error($koneksi);
        exit;
    }
    return true;
}

// --- Fungsi update Jadwal_Meeting ---
function updateJadwalMeeting($koneksi, $data) {
    $query = "UPDATE Jadwal_Meeting SET
                Id_Karyawan = '".mysqli_real_escape_string($koneksi, $data['Id_Karyawan'])."',
                Agenda = '".mysqli_real_escape_string($koneksi, $data['Agenda'])."',
                Tanggal = '".mysqli_real_escape_string($koneksi, $data['Tanggal'])."',
                Jam_Mulai = '".mysqli_real_escape_string($koneksi, $data['Jam_Mulai'])."',
                Jam_Selesai = '".mysqli_real_escape_string($koneksi, $data['Jam_Selesai'])."',
                Lokasi = '".mysqli_real_escape_string($koneksi, $data['Lokasi'])."',
                Id_Divisi = '".mysqli_real_escape_string($koneksi, $data['Id_Divisi'])."',
                Id_Ruangan = '".mysqli_real_escape_string($koneksi, $data['Id_Ruangan'])."'
              WHERE Id_meeting = '".mysqli_real_escape_string($koneksi, $data['Id_meeting'])."'";

    if (!mysqli_query($koneksi, $query)) {
        echo "Error update Jadwal_Meeting: " . mysqli_error($koneksi);
        exit;
    }
    return true;
}

// --- Fungsi delete Jadwal_Meeting ---
function deleteJadwalMeeting($koneksi, $Id_meeting) {
    $Id_meeting = mysqli_real_escape_string($koneksi, $Id_meeting);
    $query = "DELETE FROM Jadwal_Meeting WHERE Id_meeting = '$Id_meeting'";

    if (!mysqli_query($koneksi, $query)) {
        echo "Error delete Jadwal_Meeting: " . mysqli_error($koneksi);
        exit;
    }
    return true;
}

// --- PROSES INSERT ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'insert') {
    $data = $_POST;

    // Validasi sederhana
    if (empty($data['Id_meeting'])) {
        echo "Id_meeting harus diisi.";
        exit;
    }

    $checkId = mysqli_query($koneksi, "SELECT 1 FROM Jadwal_Meeting WHERE Id_meeting = '".mysqli_real_escape_string($koneksi, $data['Id_meeting'])."'");
    if (mysqli_num_rows($checkId) > 0) {
        echo "Id_meeting sudah digunakan.";
        exit;
    }

    if (!checkIdExists($koneksi, 'karyawan', 'Id_Karyawan', $data['Id_Karyawan'])) {
        echo "Id_Karyawan tidak ditemukan.";
        exit;
    }

    if (!checkIdExists($koneksi, 'divisi', 'Id_Divisi', $data['Id_Divisi'])) {
        echo "Id_Divisi tidak ditemukan.";
        exit;
    }

    if (!checkIdExists($koneksi, 'ruangan', 'Id_Ruangan', $data['Id_Ruangan'])) {
        echo "Id_Ruangan tidak ditemukan.";
        exit;
    }

    insertJadwalMeeting($koneksi, $data);

    header("Location: index.php");
    exit;
}

// --- PROSES UPDATE ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'edit') {
    $data = $_POST;

    if (!checkIdExists($koneksi, 'Jadwal_Meeting', 'Id_meeting', $data['Id_meeting'])) {
        echo "Id_meeting tidak ditemukan.";
        exit;
    }

    if (!checkIdExists($koneksi, 'karyawan', 'Id_Karyawan', $data['Id_Karyawan'])) {
        echo "Id_Karyawan tidak ditemukan.";
        exit;
    }

    if (!checkIdExists($koneksi, 'divisi', 'Id_Divisi', $data['Id_Divisi'])) {
        echo "Id_Divisi tidak ditemukan.";
        exit;
    }

    if (!checkIdExists($koneksi, 'ruangan', 'Id_Ruangan', $data['Id_Ruangan'])) {
        echo "Id_Ruangan tidak ditemukan.";
        exit;
    }

    updateJadwalMeeting($koneksi, $data);

    header("Location: index.php");
    exit;
}

// --- PROSES DELETE ---
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    if (!isset($_GET['Id_meeting']) || empty($_GET['Id_meeting'])) {
        echo "Id_meeting tidak disediakan.";
        exit;
    }

    deleteJadwalMeeting($koneksi, $_GET['Id_meeting']);

    header("Location: index.php");
    exit;
}
?>
