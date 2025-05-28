<?php 
include('../layouts/header.php');
include("../koneksi.php");

$id = $_GET['Id_Ruangan'] ?? null;

if (!$Id_Ruangan) {
    echo "ID Ruangan tidak ditemukan.";
    exit;
}

$query = "SELECT * FROM Klien WHERE Id_Ruangan = $Id_Ruangan";
$result = mysqli_query($koneksi, $query);
$Ruangan = mysqli_fetch_assoc($result);

if (!$Ruangan) {
    echo "Ruangan tidak ditemukan.";
    exit;
}
?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="Id_Ruangan" value="<?= $Ruangan['Id_Ruangan'] ?>">


        <div class="mb-3">
            <label for="Id_Meeting" class="form-label">Id Meeting</label>
            <input type="number" class="form-control" name="Id_Meeting" id="Id_Meeting" value="<?= htmlspecialchars($Ruangan['Id_Meeting']) ?>" placeholder="Masukkan Id Meeting">
        </div>

        <div class="mb-3">
            <label for="Id_Inventaris" class="form-label">Id Inventaris</label>
            <input type="number" class="form-control" name="Id_Inventaris" id="Id_Inventaris" value="<?= htmlspecialchars($Ruangan['Id_Inventaris']) ?>" placeholder="Masukkan Id Inventaris">
        </div>

        <div class="mb-3">
            <label for="Nama_Ruangan" class="form-label">Nama_Ruangan</label>
            <input type="text" class="form-control" name="Nama_Ruangan" id="Nama_Ruangan" value="<?= htmlspecialchars($Ruangan['Nama_Ruangan']) ?>" >
        </div>

        <div class="mb-3">
            <label for="Kapasitas" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" name="Kapasitas" id="Kapasitas" value="<?= htmlspecialchars($Ruangan['Kapasitas']) ?>" >
        </div>

        <div class="mb-3">
            <label for="Lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="Lokasi" id="Lokasi" value="<?= htmlspecialchars($Ruangan['Lokasi']) ?>" >
        </div>

        <div class="mb-3">
            <label for="Fasilitas" class="form-label">Fasilitas</label>
            <input type="text" class="form-control" name="Fasilitas" id="Fasilitas" value="<?= htmlspecialchars($Ruangan['Fasilitas']) ?>" >
        </div>

        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <input type="text" class="form-control" name="Status" id="Status" value="<?= htmlspecialchars($Ruangan['Status']) ?>" >
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>