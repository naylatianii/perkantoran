<?php
include("../koneksi.php");

function insertGaji($koneksi, $data) {
    $query = "INSERT INTO Gaji (Id_Gaji, Id_Karyawan, Id_Keuangan, Gaji_Pokok, Potongan_Pajak, Bonus, Total_Gaji)
              VALUES (
                  '{$data['Id_Gaji']}',
                  '{$data['Id_Karyawan']}',
                  '{$data['Id_Keuangan']}',
                  '{$data['Gaji_Pokok']}',
                  '{$data['Potongan_Pajak']}',
                  '{$data['Bonus']}',
                  '{$data['Total_Gaji']}'
              )";
    return mysqli_query($koneksi, $query);
}

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

function deleteGaji($koneksi, $Id_Gaji) {
    $query = "DELETE FROM Gaji WHERE Id_Gaji='$Id_Gaji'";
    return mysqli_query($koneksi, $query);
}

// INSERT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'insert') {
    $data = $_POST;

    $data['Total_Gaji'] = $data['Gaji_Pokok'] - $data['Potongan_Pajak'] + $data['Bonus'];

    if (insertGaji($koneksi, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
    }
}

// EDIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $data = $_POST;
    if (updateGaji($koneksi, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah: " . mysqli_error($koneksi);
    }
}

// DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $Id_Gaji = $_GET["Id_Gaji"];

    if (deleteGaji($koneksi, $Id_Gaji)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus: " . mysqli_error($koneksi);
    }
}
?>