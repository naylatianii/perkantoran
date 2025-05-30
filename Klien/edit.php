<?php 
include('../layouts/header.php');
include("../koneksi.php");

$Id_Klien = (int) $_GET['Id_Klien'] ?? null;

if (!$Id_Klien) {
    echo "ID Klien tidak ditemukan.";
    exit;
}

$query = "SELECT * FROM Klien WHERE Id_Klien = $Id_Klien";
$result = mysqli_query($koneksi, $query);
$Klien = mysqli_fetch_assoc($result);

if (!$Klien) {
    echo "Klien tidak ditemukan.";
    exit;
}
?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="Id_Klien" value="<?= $Klien['Id_Klien'] ?>">


        <div class="mb-3">
            <label for="Nama_Klien" class="form-label">Nama Klien</label>
            <input type="text" class="form-control" name="Nama_Klien" id="Nama_Klien" value="<?= htmlspecialchars($Klien['Nama_Klien']) ?>" placeholder="Masukkan Nama Klien">
        </div>

        <div class="mb-3">
            <label for="Nama_Perusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" name="Nama_Perusahaan" id="Nama_Perusahaan" value="<?= htmlspecialchars($Klien['Nama_Perusahaan']) ?>" placeholder="Masukkan Nama Perusahaan">
        </div>

        <div class="mb-3">
            <label for="Jam_Mulai" class="form-label">Jam Mulai</label>
            <input type="time" class="form-control" name="Jam_Mulai" id="Jam_Mulai" value="<?= htmlspecialchars($Klien['Jam_Mulai']) ?>" >
        </div>

         <div class="mb-3">
            <label for="Jam_Selesai" class="form-label">Jam Selesai</label>
            <input type="time" class="form-control" name="Jam_Selesai" id="Jam_Selesai" value="<?= htmlspecialchars($Klien['Jam_Selesai']) ?>" >
        </div>

         <div class="mb-3">
            <label for="Tanggal_Kunjungan" class="form-label">Tanggal Kunjungan</label>
            <input type="date" class="form-control" name="Tanggal_Kunjungan" id="Tanggal_Kunjungan" value="<?= htmlspecialchars($Klien['Tanggal_Kunjungan']) ?>" >
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>