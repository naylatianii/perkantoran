<?php 
include('../layouts/header.php');
include("../koneksi.php");

$Id_Proyek = (int) $_GET['Id_Proyek'] ?? null;

if (!$Id_Proyek) {
    echo "ID Proyek tidak ditemukan.";
    exit;
}

$query = "SELECT * FROM Proyek WHERE Id_Proyek = $Id_Proyek";
$result = mysqli_query($koneksi, $query);
$Proyek = mysqli_fetch_assoc($result);

if (!$Proyek) {
    echo "Proyek tidak ditemukan.";
    exit;
}
?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="Id_Proyek" value="<?= $Proyek['Id_Proyek'] ?>">


        <div class="mb-3">
            <label for="Id_Klien" class="form-label">Id Klien</label>
            <input type="number" class="form-control" name="Id_Klien" id="Id_Klien" value="<?= htmlspecialchars($Proyek['Id_Klien']) ?>" placeholder="Masukkan Id Klien">
        </div>

        <div class="mb-3">
            <label for="Id_Karyawan" class="form-label">Id Karyawan</label>
            <input type="number" class="form-control" name="Id_Karyawan" id="Id_Karyawan" value="<?= htmlspecialchars($Proyek['Id_Karyawan']) ?>" placeholder="Masukkan Id Karyawan">
        </div>

        <div class="mb-3">
            <label for="Id_Keuangan" class="form-label">Id Keuangan</label>
            <input type="number" class="form-control" name="Id_Keuangan" id="Id_Keuangan" value="<?= htmlspecialchars($Proyek['Id_Keuangan']) ?>" placeholder="Masukkan Id Keuangan">
        </div>

        <div class="mb-3">
            <label for="Nama_Proyek" class="form-label">Nama Proyek</label>
            <input type="text" class="form-control" name="Nama_Proyek" id="Nama_Proyek" value="<?= htmlspecialchars($Proyek['Nama_Proyek']) ?>" placeholder="Masukkan Nama Proyek">
        </div>

        <div class="mb-3">
            <label for="Tanggal_Mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" name="Tanggal_Mulai" id="Tanggal_Mulai" value="<?= htmlspecialchars($Proyek['Tanggal_Mulai']) ?>" >
        </div>

        <div class="mb-3">
            <label for="Tanggal_Selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control" name="Tanggal_Selesai" id="Tanggal_Selesai" value="<?= htmlspecialchars($Proyek['Tanggal_Selesai']) ?>" >
        </div>

        <div class="mb-3">
            <label for="Anggaran" class="form-label">Anggaran</label>
            <input type="number" class="form-control" name="Anggaran" id="Anggaran" value="<?= htmlspecialchars($Proyek['Anggaran']) ?>" placeholder="Masukkan Anggaran">
        </div>

        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <input type="Status" class="form-control" name="Status" id="Status" value="<?= htmlspecialchars($Proyek['Status']) ?>" placeholder="Masukkan Status">
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>