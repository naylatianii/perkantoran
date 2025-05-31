<?php
include("../koneksi.php");

// Fungsi cek apakah Id_Karyawan ada di tabel karyawan
function checkIdKaryawanExists($koneksi, $Id_Karyawan) {
    $Id_Karyawan = (int)$Id_Karyawan;
    $result = mysqli_query($koneksi, "SELECT 1 FROM karyawan WHERE Id_Karyawan = $Id_Karyawan");
    return mysqli_num_rows($result) > 0;
}

// Fungsi cek apakah Id_Keuangan ada di tabel keuangan_perkantoran
function checkIdKeuanganExists($koneksi, $Id_Keuangan) {
    $Id_Keuangan = (int)$Id_Keuangan;
    $result = mysqli_query($koneksi, "SELECT 1 FROM keuangan_perkantoran WHERE Id_Keuangan = $Id_Keuangan");
    return mysqli_num_rows($result) > 0;
}

// Fungsi insert data keuangan dan kembalikan Id_Keuangan yang baru
function insertKeuangan($koneksi, $data) {
    $query = "INSERT INTO keuangan_perkantoran (Id_Divisi, Jenis_Transaksi, Saldo, Keterangan, Tanggal)
              VALUES (
                  '{$data['Id_Divisi']}',
                  '{$data['Jenis_Transaksi']}',
                  '{$data['Saldo']}',
                  '{$data['Keterangan']}',
                  '{$data['Tanggal']}'
              )";

    if (mysqli_query($koneksi, $query)) {
        return mysqli_insert_id($koneksi); // kembalikan Id_Keuangan baru
    } else {
        return false;
    }
}

// Fungsi insert Gaji
function insertGaji($koneksi, $data) {
    $query = "INSERT INTO Gaji (Id_Karyawan, Id_Keuangan, Gaji_Pokok, Potongan_Pajak, Bonus, Total_Gaji)
              VALUES (
                  '{$data['Id_Karyawan']}',
                  '{$data['Id_Keuangan']}',
                  '{$data['Gaji_Pokok']}',
                  '{$data['Potongan_Pajak']}',
                  '{$data['Bonus']}',
                  '{$data['Total_Gaji']}'
              )";

    return mysqli_query($koneksi, $query);
}

// Fungsi update Gaji
function updateGaji($koneksi, $data) {
    $query = "UPDATE Gaji SET 
                Id_Karyawan='{$data['Id_Karyawan']}',
                Id_Keuangan='{$data['Id_Keuangan']}',
                Gaji_Pokok='{$data['Gaji_Pokok']}',
                Potongan_Pajak='{$data['Potongan_Pajak']}',
                Bonus='{$data['Bonus']}',
                Total_Gaji='{$data['Total_Gaji']}'
              WHERE Id_Gaji='{$data['Id_Gaji']}'";
    return mysqli_query($koneksi, $query);
}

// Fungsi delete Gaji
function deleteGaji($koneksi, $Id_Gaji) {
    $Id_Gaji = (int)$Id_Gaji;

    $result = mysqli_query($koneksi, "SELECT Id_Keuangan FROM Gaji WHERE Id_Gaji = $Id_Gaji");
    if (!$result || mysqli_num_rows($result) == 0) {
        echo "Data gaji tidak ditemukan.";
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    $Id_Keuangan = (int)$row['Id_Keuangan'];

    $cek = mysqli_query($koneksi, "SELECT * FROM keuangan_perkantoran WHERE Id_Keuangan = $Id_Keuangan");
    if (mysqli_num_rows($cek) > 0) {
        echo "Maaf, tidak bisa dihapus! Data gaji masih digunakan di keuangan perkantoran.";
        exit;
    }

    // Baru hapus data gaji
    $query = "DELETE FROM Gaji WHERE Id_Gaji = $Id_Gaji";
    if (!mysqli_query($koneksi, $query)) {
        echo "Error saat hapus data: " . mysqli_error($koneksi);
        exit;
    }
    return true;
}

// PROSES INSERT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] === 'insert') {
    $data = $_POST;

    // Cek Id_Karyawan valid
    if (!checkIdKaryawanExists($koneksi, $data['Id_Karyawan'])) {
        echo "Id_Karyawan tidak valid atau belum ada di tabel karyawan.";
        exit;
    }

    // Hitung Total_Gaji
    $data['Total_Gaji'] = $data['Gaji_Pokok'] - $data['Potongan_Pajak'] + $data['Bonus'];

    // Cek Id_Keuangan, kalau belum ada insert baru
    if (!isset($data['Id_Keuangan']) || !checkIdKeuanganExists($koneksi, $data['Id_Keuangan'])) {
        $keuanganData = [
            'Id_Divisi' => '1',  // Ganti sesuai Id_Divisi yang valid
            'Jenis_Transaksi' => 'Gaji Karyawan',
            'Saldo' => $data['Total_Gaji'],
            'Keterangan' => 'Pembayaran gaji karyawan dengan Id_Karyawan ' . $data['Id_Karyawan'],
            'Tanggal' => date('Y-m-d')
        ];

        $newIdKeuangan = insertKeuangan($koneksi, $keuanganData);
        if (!$newIdKeuangan) {
            echo "Gagal menyimpan data keuangan: " . mysqli_error($koneksi);
            exit;
        }

        $data['Id_Keuangan'] = $newIdKeuangan;
    }

    if (insertGaji($koneksi, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
    }
}

// PROSES UPDATE
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $data = $_POST;

    // Hitung ulang Total_Gaji
    $data['Total_Gaji'] = $data['Gaji_Pokok'] - $data['Potongan_Pajak'] + $data['Bonus'];

    if (updateGaji($koneksi, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah: " . mysqli_error($koneksi);
    }
}

// PROSES DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $Id_Gaji = $_GET["Id_Gaji"];

    if (deleteGaji($koneksi, $Id_Gaji)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus: " . mysqli_error($koneksi);
    }
}
?>