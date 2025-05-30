<?php
include("../koneksi.php");

function insertProyek($koneksi, $data) {
    $query = "INSERT INTO proyek (Id_Proyek, Id_Klien, Id_Karyawan, Id_Keuangan, Nama_Proyek, Tanggal_Mulai, Tanggal_Selesai, Anggaran, Status)
              VALUES (
                  '{$data['Id_Proyek']}',
                  '{$data['Id_Klien']}',
                  '{$data['Id_Karyawan']}',
                  '{$data['Id_Keuangan']}',
                  '{$data['Nama_Proyek']}',
                  '{$data['Tanggal_Mulai']}',
                  '{$data['Tanggal_Selesai']}',
                  '{$data['Anggaran']}',
                  '{$data['Status']}'
              )";
    return mysqli_query($koneksi, $query);
}

function updateProyek($koneksi, $data) {
    $query = "UPDATE proyek SET 
                Id_Klien='{$data['Id_Klien']}',
                Id_Karyawan='{$data['Id_Karyawan']}',
                Id_Keuangan='{$data['Id_Keuangan']}',
                Nama_Proyek='{$data['Nama_Proyek']}',
                Tanggal_Mulai='{$data['Tanggal_Mulai']}',
                Tanggal_Selesai='{$data['Tanggal_Selesai']}',
                Anggaran='{$data['Anggaran']}',
                Status='{$data['Status']}'
              WHERE Id_Proyek='{$data['Id_Proyek']}'";
    return mysqli_query($koneksi, $query);
}

function deleteProyek($koneksi, $Id_Proyek) {
    $query = "DELETE FROM proyek WHERE Id_Proyek='$Id_Proyek'";
    return mysqli_query($koneksi, $query);
}

// INSERT
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;

    if (isset($data['action']) && $data['action'] === 'edit') {
        if (updateProyek($koneksi, $data)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Data gagal diubah: " . mysqli_error($koneksi);
        }
    } else {
        if (insertProyek($koneksi, $data)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Data gagal disimpan: " . mysqli_error($koneksi);
        }
    }
}

// EDIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $data = $_POST;
    if (updateProyek($koneksi, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah: " . mysqli_error($koneksi);
    }
}

// DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'delete') {
    $Id_Proyek = $_GET["Id_Proyek"];

    if (deleteProyek($koneksi, $Id_Proyek)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus: " . mysqli_error($koneksi);
    }
}
?>
