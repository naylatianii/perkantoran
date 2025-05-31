<?php 
include('../layouts/header.php');
include("../koneksi.php");

$id_Inventaris= $_GET['id_Inventaris'] ?? null;

if (!$id_Inventaris) {
    echo "ID Inventaris tidak ditemukan.";
    exit;
}

$query = "SELECT * FROM Inventaris WHERE id_Inventaris = $id_Inventaris";
$result = mysqli_query($koneksi, $query);
$Inventaris = mysqli_fetch_assoc($result);

if (!$Inventaris) {
    echo "Inventaris tidak ditemukan.";
    exit;
}
?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id_Inventaris" value="<?= $Inventaris['id_Inventaris'] ?>">

        <div class="mb-3">
            <label for="Nama_Barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="Nama_Barang" id="Nama_Barang" value="<?= htmlspecialchars($Inventaris['Nama_Barang']) ?>" placeholder="Masukkan Nama Barang">
        </div>

        <div class="mb-3">
            <label for="Jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="Jumlah" id="Jumlah" value="<?= htmlspecialchars($Inventaris['Jumlah']) ?>" placeholder="Masukkan Jumlah">
        </div>

        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <input type="text" class="form-control" name="Status" id="Status" value="<?= htmlspecialchars($Inventaris['Status']) ?>" placeholder="Masukkan Status">
        </div>

        <div class="mb-3">
            <label for="Lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="Lokasi" id="Lokasi" value="<?= htmlspecialchars($Inventaris['Lokasi']) ?>" placeholder="Masukkan Lokasi">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>