<?php
include("../koneksi.php");

// FUNGSI
function insertRuangan($koneksi, $Id_Meeting, $Id_Inventaris, $Nama_Ruangan, $Kapasitas, $Lokasi, $Fasilitas, $Status) {
    $query = "INSERT INTO Klien (Nama_Klien, Nama_Perusahaan, Jam_Mulai, Jam_Selesai, Tanggal_Kunjungan) VALUES ('$Nama_Klien', '$Nama_Perusahaan', '$Jam_Mulai', '$Jam_Selesai', '$Tanggal_Kunjungan')";
    return mysqli_query($koneksi, $query);
}

function updateKlien($koneksi, $Id_Ruangan, $Id_Meeting, $Id_Inventaris, $Nama_Ruangan, $Kapasitas, $Lokasi, $Fasilitas, $Status) {
    $query = "UPDATE Klien SET Nama_Klien='$Nama_Klien', Nama_Perusahaan='$Nama_Perusahaan', Jam_Mulai='$Jam_Mulai', Jam_Selesai='$Jam_Selesai', Tanggal_Kunjungan='$Tanggal_Kunjungan' WHERE Id_Klien=$Id_Klien";
    return mysqli_query($koneksi, $query);
}

function deleteKlien($koneksi, $Id_Klien) {
    $query = "DELETE FROM Klien WHERE  Id_Klien=$Id_Klien";
    return mysqli_query($koneksi, $query);
}

// INSERT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'insert') {
    $Nama_Klien = $_POST["Nama_Klien"];
    $Nama_Perusahaan = $_POST["Nama_Perusahaan"];
    $Jam_Mulai = $_POST["Jam_Mulai"];
    $Jam_Selesai = $_POST["Jam_Selesai"];
    $Tanggal_Kunjungan = $_POST["Tanggal_Kunjungan"];

    if (insertKlien($koneksi, $Nama_Klien, $Nama_Perusahaan, $Jam_Mulai, $Jam_Selesai, $Tanggal_Kunjungan)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal disimpan";
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
    $id = $_GET["Id_Klien"];

    if (deleteKlien($koneksi, $Id_Klien)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus";
    }
}
?>