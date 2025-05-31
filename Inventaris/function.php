<?php
include("../koneksi.php");

// FUNGSI
function insertInventaris($koneksi, $id_Inventaris, $Nama_Barang, $Jumlah, $Status, $Lokasi) {
    $stmt = $koneksi->prepare("INSERT INTO Inventaris (id_Inventaris, Nama_Barang, Jumlah, Status, Lokasi) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isiss", $id_Inventaris, $Nama_Barang, $Jumlah, $Status, $Lokasi);
    $execute = $stmt->execute();
    $stmt->close();
    return $execute;
}

function updateInventaris($koneksi, $id_Inventaris, $Nama_Barang, $Jumlah, $Status, $Lokasi) {
    $query = "UPDATE Inventaris SET Nama_Barang='$Nama_Barang', Jumlah='$Jumlah', Status='$Status', Lokasi='$Lokasi' WHERE id_Inventaris=$id_Inventaris";
    return mysqli_query($koneksi, $query);
}

function deleteInventaris($koneksi, $id_Inventaris) {
    $id_Inventaris = (int)$id_Inventaris;

    // Cek apakah data masih digunakan di tabel divisi
    $cek = $koneksi->prepare("SELECT 1 FROM divisi WHERE Id_Inventaris = ?");
    $cek->bind_param("i", $id_Inventaris);
    $cek->execute();
    $result = $cek->get_result();

    if ($result->num_rows > 0) {
        $cek->close();
        $result->close();
        echo "Maaf, tidak bisa dihapus! Data inventaris masih digunakan di tabel divisi.";
        exit;
    }

    $cek->close();
    $result->close();

    // Jika aman, lanjut hapus
    $stmt = $koneksi->prepare("DELETE FROM Inventaris WHERE id_Inventaris = ?");
    $stmt->bind_param("i", $id_Inventaris);
    $execute = $stmt->execute();
    $stmt->close();

    return $execute;
}

// INSERT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'insert') {
    $id_Inventaris = (int)$_POST["id_Inventaris"];  
    $Nama_Barang = $_POST["Nama_Barang"];
    $Jumlah = (int)$_POST["Jumlah"];
    $Status = $_POST["Status"];
    $Lokasi = $_POST["Lokasi"];

    if (insertInventaris($koneksi, $id_Inventaris, $Nama_Barang, $Jumlah, $Status, $Lokasi)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal disimpan: " . $koneksi->error;
    }
}

// EDIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id_Inventaris = $_POST["id_Inventaris"];
    $Nama_Barang = $_POST["Nama_Barang"];
    $Jumlah = $_POST["Jumlah"];
    $Status = $_POST["Status"];
    $Lokasi = $_POST["Lokasi"];

    if (updateInventaris($koneksi, $id_Inventaris, $Nama_Barang, $Jumlah, $Status, $Lokasi)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah";
    }
}

// DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET["id_Inventaris"];

    if (deleteInventaris($koneksi, $id)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus";
    }
}
?>