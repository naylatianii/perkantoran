<?php
include("../koneksi.php");

if (isset($_GET['id'])) {
    $Id_Ruangan = $_GET['id'];
    $query = "SELECT * FROM Ruangan WHERE Id_Ruangan = $Id_Ruangan";
    $result = mysqli_query($koneksi, $query);
    $Ruangan = mysqli_fetch_object($result);
}

include('../layouts/header.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <h2>Edit Data Ruangan</h2>
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="Id_Ruangan" value="<?= $Ruangan->Id_Ruangan ?>">
        <div class="mb-3">
            <label for="Id_Inventaris" class="form-label">ID Inventaris</label>
            <input type="text" class="form-control" name="Id_Inventaris" value="<?= $Ruangan->Id_Inventaris ?>" required>
        </div>
        <div class="mb-3">
            <label for="Nama_Ruangan" class="form-label">Nama Ruangan</label>
            <input type="text" class="form-control" name="Nama_Ruangan" value="<?= $Ruangan->Nama_Ruangan ?>" required>
        </div>
        <div class="mb-3">
            <label for="Kapasitas" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" name="Kapasitas" value="<?= $Ruangan->Kapasitas ?>" required>
        </div>
        <div class="mb-3">
            <label for="Fasilitas" class="form-label">Fasilitas</label>
            <input type="text" class="form-control" name="Fasilitas" value="<?= $Ruangan->Fasilitas ?>" required>
        </div>
        <div class="mb-3">
            <label for="Lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="Lokasi" value="<?= $Ruangan->Lokasi ?>" required>
        </div>
        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <input type="text" class="form-control" name="Status" value="<?= $Ruangan->Status ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>