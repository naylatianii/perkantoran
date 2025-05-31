<?php 
include('../layouts/header.php');
include("../koneksi.php");

$Id_Divisi = (int) $_GET['Id_Divisi'] ?? null;

if (!$Id_Divisi) {
    echo "ID Divisi tidak ditemukan.";
    exit;
}

$query = "SELECT * FROM Divisi WHERE Id_Divisi = $Id_Divisi";
$result = mysqli_query($koneksi, $query);
$Divisi = mysqli_fetch_assoc($result);

if (!$Divisi) {
    echo "Divisi tidak ditemukan.";
    exit;
}
?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="Id_Divisi" value="<?= $Divisi['Id_Divisi'] ?>">

        <div class="mb-3">
            <label for="Id_Karyawan" class="form-label">Id Karyawan</label>
            <input type="number" class="form-control" name="Id_Karyawan" id="Id_Karyawan" value="<?= htmlspecialchars($Divisi['Id_Karyawan']) ?>" placeholder="Masukkan Id Karyawan">
        </div>

        <div class="mb-3">
            <label for="Id_Inventaris" class="form-label">Id Inventaris</label>
            <input type="number" class="form-control" name="Id_Inventaris" id="Id_Inventaris" value="<?= htmlspecialchars($Divisi['Id_Inventaris']) ?>" placeholder="Masukkan Id Inventaris">
        </div>

        <div class="mb-3">
            <label for="Nama_Divisi" class="form-label">Nama Divisi</label>
            <input type="text" class="form-control" name="Nama_Divisi" id="Nama_Divisi" value="<?= htmlspecialchars($Divisi['Nama_Divisi']) ?>" placeholder="Masukkan Nama Divisi">
        </div>

        <div class="mb-3">
            <label for="Kepala_Divisi" class="form-label">Kepala Divisi</label>
            <input type="text" class="form-control" name="Kepala_Divisi" id="Kepala_Divisi" value="<?= htmlspecialchars($Divisi['Kepala_Divisi']) ?>" placeholder="Masukkan Nama Kepala Divisi">
        </div>

        <div class="mb-3">
            <label for="Bidang" class="form-label">Bidang</label>
            <input type="text" class="form-control" name="Bidang" id="Bidang" value="<?= htmlspecialchars($Divisi['Bidang']) ?>" placeholder="Masukkan Bidang">
        </div>

        <div class="mb-3">
            <label for="Jumlah_Karyawan" class="form-label">Jumlah Karyawan</label>
            <input type="number" class="form-control" name="Jumlah_Karyawan" id="Jumlah_Karyawan" value="<?= htmlspecialchars($Divisi['Jumlah_Karyawan']) ?>" placeholder="Masukkan Jumlah Karyawan">
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>