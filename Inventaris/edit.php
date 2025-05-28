<?php 
include('../layouts/header.php');
include("../koneksi.php");

$id = $_GET['Id_Inventaris'] ?? null;

if (!$Id_Inventaris) {
    echo "ID Inventaris tidak ditemukan.";
    exit;
}

$query = "SELECT * FROM Klien WHERE Id_Inventaris = $Id_Inventaris";
$result = mysqli_query($koneksi, $query);
$Klien = mysqli_fetch_assoc($result);

if (!$Inventaris) {
    echo "Inventaris tidak ditemukan.";
    exit;
}
?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="Id_Inventaris" value="<?= $Inventaris['Id_Inventaris'] ?>">


        <div class="mb-3">
            <label for="Nama_Barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="Nama_Barang" id="Nama_Barang" value="<?= htmlspecialchars($Inventaris['Nama_Barang']) ?>" placeholder="Masukkan Nama Barang">
        </div>

        <div class="mb-3">
            <label for="Jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="Jumlah" id="Jumlah" value="<?= htmlspecialchars($Inventaris['Jumlah']) ?>" placeholder="Masukkan Jumlah">
        </div>

        <div class="mb-3">
            <label for="Lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="Lokasi" id="Lokasi" value="<?= htmlspecialchars($Inventaris['Lokasi']) ?>" >
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>