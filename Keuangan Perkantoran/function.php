<?php
include("../koneksi.php");

function insertKeuangan($koneksi, $data) {
    $stmt = $koneksi->prepare("INSERT INTO Keuangan_Perkantoran 
        (Id_Keuangan, Id_Divisi, Jenis_Transaksi, Saldo, Keterangan, Tanggal) 
        VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ississ", 
        $data['Id_Keuangan'], 
        $data['Id_Divisi'], 
        $data['Jenis_Transaksi'], 
        $data['Saldo'], 
        $data['Keterangan'], 
        $data['Tanggal']
    );
    return $stmt->execute();
}

function updateKeuangan($koneksi, $data) {
    $stmt = $koneksi->prepare("UPDATE Keuangan_Perkantoran SET 
        Id_Divisi = ?, 
        Jenis_Transaksi = ?, 
        Saldo = ?, 
        Keterangan = ?, 
        Tanggal = ? 
        WHERE Id_Keuangan = ?");
    $stmt->bind_param(
        "ssissi", 
        $data['Id_Divisi'], 
        $data['Jenis_Transaksi'], 
        $data['Saldo'], 
        $data['Keterangan'], 
        $data['Tanggal'], 
        $data['Id_Keuangan']
    );
    return $stmt->execute();
}

function deleteKeuangan($koneksi, $Id_Keuangan) {
    $Id_Keuangan = (int)$Id_Keuangan;

    // Cek apakah ada data di tabel proyek yang pakai Id_Keuangan ini
    $cek = $koneksi->prepare("SELECT * FROM proyek WHERE Id_Keuangan = ?");
    $cek->bind_param("i", $Id_Keuangan);
    $cek->execute();
    $result = $cek->get_result();

    if ($result->num_rows > 0) {
        echo "Maaf, tidak bisa dihapus! Data keuangan masih digunakan di tabel proyek.";
        exit;
    }

    // Jika tidak ada relasi, baru lakukan hapus data keuangan
    $stmt = $koneksi->prepare("DELETE FROM Keuangan_Perkantoran WHERE Id_Keuangan = ?");
    $stmt->bind_param("i", $Id_Keuangan);
    return $stmt->execute();
}

// INSERT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] === 'insert') {
    $data = [
        'Id_Keuangan' => (int)$_POST['Id_Keuangan'],
        'Id_Divisi' => $_POST['Id_Divisi'],
        'Jenis_Transaksi' => $_POST['Jenis_Transaksi'],
        'Saldo' => (int)$_POST['Saldo'],
        'Keterangan' => $_POST['Keterangan'],
        'Tanggal' => $_POST['Tanggal']
    ];

    if (insertKeuangan($koneksi, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal disimpan: " . $koneksi->error;
    }
}

// EDIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $data = [
        'Id_Keuangan' => (int)$_POST['Id_Keuangan'],
        'Id_Divisi' => $_POST['Id_Divisi'],
        'Jenis_Transaksi' => $_POST['Jenis_Transaksi'],
        'Saldo' => (int)$_POST['Saldo'],
        'Keterangan' => $_POST['Keterangan'],
        'Tanggal' => $_POST['Tanggal']
    ];

    if (updateKeuangan($koneksi, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah: " . $koneksi->error;
    }
}

// DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $Id_Keuangan = (int)$_GET["Id_Keuangan"];

    if (deleteKeuangan($koneksi, $Id_Keuangan)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus: " . $koneksi->error;
    }
}
?>