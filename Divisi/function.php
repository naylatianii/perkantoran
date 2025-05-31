<?php
include("../koneksi.php");

// FUNGSI
function insertDivisi($koneksi, $Id_Divisi, $Id_Karyawan, $Id_Inventaris, $Nama_Divisi, $Kepala_Divisi, $Bidang, $Jumlah_Karyawan) {
    $query = "INSERT INTO Divisi (Id_Divisi, Id_Karyawan, Id_Inventaris, Nama_Divisi, Kepala_Divisi, Bidang, Jumlah_Karyawan) 
              VALUES ('$Id_Divisi', '$Id_Karyawan', '$Id_Inventaris', '$Nama_Divisi', '$Kepala_Divisi', '$Bidang', '$Jumlah_Karyawan')";
    return mysqli_query($koneksi, $query);
}

function updateDivisi($koneksi, $Id_Divisi, $Id_Karyawan, $Id_Inventaris, $Nama_Divisi, $Kepala_Divisi, $Bidang, $Jumlah_Karyawan) {
    $query = "UPDATE Divisi 
              SET Id_Karyawan='$Id_Karyawan', Id_Inventaris='$Id_Inventaris', 
                  Nama_Divisi='$Nama_Divisi', Kepala_Divisi='$Kepala_Divisi', Bidang='$Bidang', Jumlah_Karyawan='$Jumlah_Karyawan' 
              WHERE Id_Divisi=$Id_Divisi";
    return mysqli_query($koneksi, $query);
}

function deleteDivisi($koneksi, $Id_Divisi) {
    $Id_Divisi = (int)$Id_Divisi;

    // Hapus dulu data anak yang terkait
    mysqli_query($koneksi, "DELETE FROM jadwal_meeting WHERE Id_Divisi = $Id_Divisi");

    // Baru hapus divisi
    $query = "DELETE FROM Divisi WHERE Id_Divisi = $Id_Divisi";
    return mysqli_query($koneksi, $query);
}

// INSERT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'insert') {
    $Id_Divisi = $_POST["Id_Divisi"];
    $Id_Karyawan = $_POST["Id_Karyawan"];
    $Id_Inventaris = $_POST["Id_Inventaris"];
    $Nama_Divisi = $_POST["Nama_Divisi"];
    $Kepala_Divisi= $_POST["Kepala_Divisi"];
    $Bidang = $_POST["Bidang"];
    $Jumlah_Karyawan = $_POST["Jumlah_Karyawan"];

    if (insertDivisi($koneksi, $Id_Divisi, $Id_Karyawan, $Id_Inventaris, $Nama_Divisi, $Kepala_Divisi, $Bidang, $Jumlah_Karyawan)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan divisi: " . mysqli_error($koneksi);
    }
}

// EDIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'edit') {
    $Id_Divisi = $_POST["Id_Divisi"];
    $Id_Karyawan = $_POST["Id_Karyawan"];
    $Id_Inventaris = $_POST["Id_Inventaris"];
    $Nama_Divisi = $_POST["Nama_Divisi"];
    $Kepala_Divisi= $_POST["Kepala_Divisi"];
    $Bidang = $_POST["Bidang"];
    $Jumlah_Karyawan = $_POST["Jumlah_Karyawan"];

    if (updateDivisi($koneksi, $Id_Divisi, $Id_Karyawan, $Id_Inventaris, $Nama_Divisi, $Kepala_Divisi, $Bidang, $Jumlah_Karyawan)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah: " . mysqli_error($koneksi);
    }
}

// DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'delete') {
    $Id_Divisi = $_GET["Id_Divisi"] ?? null;

    if ($Id_Divisi !== null) {
        if (deleteDivisi($koneksi, $Id_Divisi)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Data gagal dihapus! Error: " . mysqli_error($koneksi);
        }
    }
}
?>
