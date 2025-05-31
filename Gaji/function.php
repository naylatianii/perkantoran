<?php
include("../koneksi.php");

// --- Fungsi cek apakah Id_Karyawan ada di tabel karyawan ---
function checkIdKaryawanExists($koneksi, $Id_Karyawan) {
    $Id_Karyawan = (int)$Id_Karyawan;
    $result = mysqli_query($koneksi, "SELECT 1 FROM karyawan WHERE Id_Karyawan = $Id_Karyawan");
    return mysqli_num_rows($result) > 0;
}

// --- Fungsi cek apakah Id_Keuangan ada di tabel keuangan_perkantoran ---
function checkIdKeuanganExists($koneksi, $Id_Keuangan) {
    $Id_Keuangan = (int)$Id_Keuangan;
    $result = mysqli_query($koneksi, "SELECT 1 FROM keuangan_perkantoran WHERE Id_Keuangan = $Id_Keuangan");
    return mysqli_num_rows($result) > 0;
}

// --- Fungsi insert data keuangan dan kembalikan Id_Keuangan baru ---
function insertKeuangan($koneksi, $data) {
    $query = "INSERT INTO keuangan_perkantoran (Id_Divisi, Jenis_Transaksi, Saldo, Keterangan, Tanggal)
              VALUES (
                  '".mysqli_real_escape_string($koneksi, $data['Id_Divisi'])."',
                  '".mysqli_real_escape_string($koneksi, $data['Jenis_Transaksi'])."',
                  '".mysqli_real_escape_string($koneksi, $data['Saldo'])."',
                  '".mysqli_real_escape_string($koneksi, $data['Keterangan'])."',
                  '".mysqli_real_escape_string($koneksi, $data['Tanggal'])."'
              )";

    if (mysqli_query($koneksi, $query)) {
        return mysqli_insert_id($koneksi);
    } else {
        echo "Error insert keuangan: " . mysqli_error($koneksi);
        exit;
    }
}

// --- Fungsi insert Gaji dengan manual Id_Gaji ---
function insertGaji($koneksi, $data) {
    $Id_Gaji = mysqli_real_escape_string($koneksi, $data['Id_Gaji']);
    $Id_Karyawan = mysqli_real_escape_string($koneksi, $data['Id_Karyawan']);
    $Id_Keuangan = mysqli_real_escape_string($koneksi, $data['Id_Keuangan']);
    $Gaji_Pokok = mysqli_real_escape_string($koneksi, $data['Gaji_Pokok']);
    $Potongan_Pajak = mysqli_real_escape_string($koneksi, $data['Potongan_Pajak']);
    $Bonus = mysqli_real_escape_string($koneksi, $data['Bonus']);
    $Total_Gaji = mysqli_real_escape_string($koneksi, $data['Total_Gaji']);

    $query = "INSERT INTO Gaji (Id_Gaji, Id_Karyawan, Id_Keuangan, Gaji_Pokok, Potongan_Pajak, Bonus, Total_Gaji)
              VALUES ('$Id_Gaji', '$Id_Karyawan', '$Id_Keuangan', '$Gaji_Pokok', '$Potongan_Pajak', '$Bonus', '$Total_Gaji')";

    if (!mysqli_query($koneksi, $query)) {
        echo "Error insert Gaji: " . mysqli_error($koneksi);
        exit;
    }
    return true;
}

// --- Fungsi update Gaji ---
function updateGaji($koneksi, $data) {
    $Id_Gaji = mysqli_real_escape_string($koneksi, $data['Id_Gaji']);
    $Id_Karyawan = mysqli_real_escape_string($koneksi, $data['Id_Karyawan']);
    $Id_Keuangan = mysqli_real_escape_string($koneksi, $data['Id_Keuangan']);
    $Gaji_Pokok = mysqli_real_escape_string($koneksi, $data['Gaji_Pokok']);
    $Potongan_Pajak = mysqli_real_escape_string($koneksi, $data['Potongan_Pajak']);
    $Bonus = mysqli_real_escape_string($koneksi, $data['Bonus']);
    $Total_Gaji = mysqli_real_escape_string($koneksi, $data['Total_Gaji']);

    $query = "UPDATE Gaji SET
                Id_Karyawan = '$Id_Karyawan',
                Id_Keuangan = '$Id_Keuangan',
                Gaji_Pokok = '$Gaji_Pokok',
                Potongan_Pajak = '$Potongan_Pajak',
                Bonus = '$Bonus',
                Total_Gaji = '$Total_Gaji'
              WHERE Id_Gaji = '$Id_Gaji'";

    if (!mysqli_query($koneksi, $query)) {
        echo "Error update Gaji: " . mysqli_error($koneksi);
        exit;
    }
    return true;
}

// --- Fungsi delete Gaji dan cek relasi ke keuangan_perkantoran ---
function deleteGaji($koneksi, $Id_Gaji) {
    $Id_Gaji = (int)$Id_Gaji;

    // Cek apakah data Gaji ada
    $result = mysqli_query($koneksi, "SELECT Id_Keuangan FROM Gaji WHERE Id_Gaji = $Id_Gaji");
    if (!$result) {
        echo "Query error: " . mysqli_error($koneksi);
        exit;
    }

    if (mysqli_num_rows($result) == 0) {
        echo "Data Gaji dengan Id_Gaji = $Id_Gaji tidak ditemukan.";
        exit;
    }

    // Hapus data Gaji
    if (!mysqli_query($koneksi, "DELETE FROM Gaji WHERE Id_Gaji = $Id_Gaji")) {
        echo "Gagal hapus data Gaji: " . mysqli_error($koneksi);
        exit;
    }
    
    // Tidak menghapus data keuangan_perkantoran
    return true;
}

// --- PROSES INSERT ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] === 'insert') {
    $data = $_POST;

    if (empty($data['Id_Gaji'])) {
        echo "Id_Gaji harus diisi manual.";
        exit;
    }

    // Cek apakah Id_Gaji unik
    $checkIdGaji = mysqli_query($koneksi, "SELECT 1 FROM Gaji WHERE Id_Gaji = '".mysqli_real_escape_string($koneksi, $data['Id_Gaji'])."'");
    if (mysqli_num_rows($checkIdGaji) > 0) {
        echo "Id_Gaji sudah digunakan.";
        exit;
    }

    if (!checkIdKaryawanExists($koneksi, $data['Id_Karyawan'])) {
        echo "Id_Karyawan tidak valid.";
        exit;
    }

    $data['Total_Gaji'] = $data['Gaji_Pokok'] - $data['Potongan_Pajak'] + $data['Bonus'];

    if (!isset($data['Id_Keuangan']) || !checkIdKeuanganExists($koneksi, $data['Id_Keuangan'])) {
        $keuanganData = [
            'Id_Divisi' => '1',
            'Jenis_Transaksi' => 'Gaji Karyawan',
            'Saldo' => $data['Total_Gaji'],
            'Keterangan' => 'Pembayaran gaji karyawan Id ' . $data['Id_Karyawan'],
            'Tanggal' => date('Y-m-d')
        ];

        $newIdKeuangan = insertKeuangan($koneksi, $keuanganData);
        $data['Id_Keuangan'] = $newIdKeuangan;
    }

    insertGaji($koneksi, $data);
    header("Location: index.php");
    exit;
}

// --- PROSES UPDATE ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $data = $_POST;

    $data['Total_Gaji'] = $data['Gaji_Pokok'] - $data['Potongan_Pajak'] + $data['Bonus'];

    updateGaji($koneksi, $data);
    header("Location: index.php");
    exit;
}

// --- PROSES DELETE ---
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    if (!isset($_GET['Id_Gaji']) || empty($_GET['Id_Gaji'])) {
        echo "Id_Gaji tidak disediakan.";
        exit;
    }

    $Id_Gaji = $_GET['Id_Gaji'];
    deleteGaji($koneksi, $Id_Gaji);
    header("Location: index.php");
    exit;
}
?>