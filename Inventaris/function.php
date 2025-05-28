<?php
include("../koneksi.php");

// FUNGSI
function insertInventaris($koneksi, $Nama_Barang, $Jumlah, $Status, $Lokasi) {
    $query = "INSERT INTO Inventaris (Nama_Barang, Jumlah, Status, Lokasi) VALUES ('$Nama_Barang', '$Jumlah', '$Status', '$Lokasi')";
    return mysqli_query($koneksi, $query);
}

function updateInventaris($koneksi, $Id_Inventaris, $Nama_Barang, $Jumlah, $Status, $Lokasi) {
    $query = "UPDATE Inventaris SET Nama_Barang='$Nama_Barang', Jumlah='$Jumlah', Status='$Status', Lokasi='$Lokasi', WHERE Id_Klien=$Id_Klien";
    return mysqli_query($koneksi, $query);
}

function deleteInventaris($koneksi, $Id_Inventaris) {
    $query = "DELETE FROM Inventaris WHERE  Id_Inventaris=$Id_Inventaris";
    return mysqli_query($koneksi, $query);
}

// INSERT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'insert') {
    $Nama_Barang = $_POST["Nama_Barang"];
    $Jumlah = $_POST["Jumlah"];
    $Status = $_POST["Status"];
    $Lokasi = $_POST["Lokasi"];

    if (insertInventaris($koneksi, $Nama_Barang, $Jumlah, $Status, $Lokasi)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal disimpan";
    }
}

// EDIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'edit') {
    $Id_Inventaris = $_POST["Id_Inventaris"];
    $Nama_Barang = $_POST["Nama_Barang"];
    $Jumlah = $_POST["Jumlah"];
    $Status = $_POST["Status"];
    $Lokasi = $_POST["Lokasi"];

    if (updateInventaris($koneksi, $Id_Inventaris, $Nama_Barang, $Jumlah, $Status, $Lokasi)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah";
    }
}

// DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'delete') {
    $id = $_GET["Id_Inventaris"];

    if (deleteKlien($koneksi, $Id_Inventaris)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus";
    }
}
?>