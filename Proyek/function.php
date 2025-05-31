<?php
include("../koneksi.php");

// Fungsi cek apakah Id_Klien ada di tabel klien
function checkIdKlienExists($koneksi, $Id_Klien) {
    $Id_Klien = (int)$Id_Klien;
    $result = mysqli_query($koneksi, "SELECT 1 FROM klien WHERE Id_Klien = $Id_Klien");
    return mysqli_num_rows($result) > 0;
}

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

// Fungsi insert proyek
function insertProyek($koneksi, $data) {
    if (!checkIdKlienExists($koneksi, $data['Id_Klien'])) {
        echo "Error: Id_Klien tidak valid atau belum terdaftar.";
        return false;
    }
    if (!checkIdKaryawanExists($koneksi, $data['Id_Karyawan'])) {
        echo "Error: Id_Karyawan tidak valid atau belum terdaftar.";
        return false;
    }
    if (!checkIdKeuanganExists($koneksi, $data['Id_Keuangan'])) {
        echo "Error: Id_Keuangan tidak valid atau belum terdaftar.";
        return false;
    }

    $Id_Proyek = (int)$data['Id_Proyek'];
    $Id_Klien = (int)$data['Id_Klien'];
    $Id_Karyawan = (int)$data['Id_Karyawan'];
    $Id_Keuangan = (int)$data['Id_Keuangan'];
    $Nama_Proyek = mysqli_real_escape_string($koneksi, $data['Nama_Proyek']);
    $Tanggal_Mulai = mysqli_real_escape_string($koneksi, $data['Tanggal_Mulai']);
    $Tanggal_Selesai = mysqli_real_escape_string($koneksi, $data['Tanggal_Selesai']);
    $Anggaran = mysqli_real_escape_string($koneksi, $data['Anggaran']);
    $Status = mysqli_real_escape_string($koneksi, $data['Status']);

    $query = "INSERT INTO proyek (Id_Proyek, Id_Klien, Id_Karyawan, Id_Keuangan, Nama_Proyek, Tanggal_Mulai, Tanggal_Selesai, Anggaran, Status)
              VALUES ($Id_Proyek, $Id_Klien, $Id_Karyawan, $Id_Keuangan, '$Nama_Proyek', '$Tanggal_Mulai', '$Tanggal_Selesai', '$Anggaran', '$Status')";

    if (mysqli_query($koneksi, $query)) {
        return true;
    } else {
        echo "Error insert: " . mysqli_error($koneksi);
        return false;
    }
}

// Fungsi update proyek
function updateProyek($koneksi, $data) {
    if (!checkIdKlienExists($koneksi, $data['Id_Klien'])) {
        echo "Error: Id_Klien tidak valid atau belum terdaftar.";
        return false;
    }
    if (!checkIdKaryawanExists($koneksi, $data['Id_Karyawan'])) {
        echo "Error: Id_Karyawan tidak valid atau belum terdaftar.";
        return false;
    }
    if (!checkIdKeuanganExists($koneksi, $data['Id_Keuangan'])) {
        echo "Error: Id_Keuangan tidak valid atau belum terdaftar.";
        return false;
    }

    $Id_Proyek = (int)$data['Id_Proyek'];
    $Id_Klien = (int)$data['Id_Klien'];
    $Id_Karyawan = (int)$data['Id_Karyawan'];
    $Id_Keuangan = (int)$data['Id_Keuangan'];
    $Nama_Proyek = mysqli_real_escape_string($koneksi, $data['Nama_Proyek']);
    $Tanggal_Mulai = mysqli_real_escape_string($koneksi, $data['Tanggal_Mulai']);
    $Tanggal_Selesai = mysqli_real_escape_string($koneksi, $data['Tanggal_Selesai']);
    $Anggaran = mysqli_real_escape_string($koneksi, $data['Anggaran']);
    $Status = mysqli_real_escape_string($koneksi, $data['Status']);

    $query = "UPDATE proyek SET 
                Id_Klien = $Id_Klien,
                Id_Karyawan = $Id_Karyawan,
                Id_Keuangan = $Id_Keuangan,
                Nama_Proyek = '$Nama_Proyek',
                Tanggal_Mulai = '$Tanggal_Mulai',
                Tanggal_Selesai = '$Tanggal_Selesai',
                Anggaran = '$Anggaran',
                Status = '$Status'
              WHERE Id_Proyek = $Id_Proyek";

    if (mysqli_query($koneksi, $query)) {
        return true;
    } else {
        echo "Error update: " . mysqli_error($koneksi);
        return false;
    }
}

// Fungsi delete proyek
function deleteProyek($koneksi, $Id_Proyek) {
    $Id_Proyek = (int)$Id_Proyek;

    $query = "DELETE FROM proyek WHERE Id_Proyek = $Id_Proyek";
    if (mysqli_query($koneksi, $query)) {
        return true;
    } else {
        echo "Error delete! " . mysqli_error($koneksi);
        return false;
    }
}

// PROSES INSERT atau UPDATE
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

// PROSES DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $Id_Proyek = $_GET["Id_Proyek"];

    if (deleteProyek($koneksi, $Id_Proyek)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus: " . mysqli_error($koneksi);
    }
}
?>