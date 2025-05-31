<?php
include("../koneksi.php");

function insertKeuangan($koneksi, $data) {
    $query = "INSERT INTO Keuangan_Perkantoran (Id_Divisi, Jenis_Transaksi, Saldo, Keterangan, Tanggal)
              VALUES (
                  '{$data['Id_Divisi']}',
                  '{$data['Jenis_Transaksi']}',
                  '{$data['Saldo']}',
                  '{$data['Keterangan']}',
                  '{$data['Tanggal']}'
              )";
    return mysqli_query($koneksi, $query);
}

function updateKeuangan($koneksi, $data) {
    $query = "UPDATE Keuangan_Perkantoran SET 
                Id_Divisi='{$data['Id_Divisi']}',
                Jenis_Transaksi='{$data['Jenis_Transaksi']}',
                Saldo='{$data['Saldo']}',
                Keterangan='{$data['Keterangan']}',
                Tanggal='{$data['Tanggal']}'
              WHERE Id_Keuangan='{$data['Id_Keuangan']}'";
    return mysqli_query($koneksi, $query);
}

function deleteKeuangan($koneksi, $Id_Keuangan) {
    $Id_Keuangan = (int)$Id_Keuangan;

    // Cek apakah ada data di tabel proyek yang pakai Id_Keuangan ini
    $cek = mysqli_query($koneksi, "SELECT * FROM proyek WHERE Id_Keuangan = $Id_Keuangan");
    if (mysqli_num_rows($cek) > 0) {
        echo "Maaf, tidak bisa dihapus! Data keuangan masih digunakan di tabel proyek.";
        exit;
    }

    // Jika tidak ada relasi, baru lakukan hapus data keuangan
    $query = "DELETE FROM keuangan_perkantoran WHERE Id_Keuangan = $Id_Keuangan";
    return mysqli_query($koneksi, $query);
}

// INSERT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] === 'insert') {
    $data = $_POST;

    if (insertKeuangan($koneksi, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
    }
}

// EDIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $data = $_POST;
    if (updateKeuangan($koneksi, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah: " . mysqli_error($koneksi);
    }
}

// DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $Id_Keuangan = $_GET["Id_Keuangan"];

    if (deleteKeuangan($koneksi, $Id_Keuangan)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus: " . mysqli_error($koneksi);
    }
}