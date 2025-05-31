<?php
include('../layouts/header.php');
include("../koneksi.php");

$Id_Karyawan = $_GET['Id_Karyawan'] ?? null;
$Tanggal = $_GET['Tanggal'] ?? null;

if (!$Id_Karyawan || !$Tanggal) {
    echo "ID Karyawan atau Tanggal tidak ditemukan.";
    exit;
}

$query = "SELECT * FROM Absensi_Karyawan WHERE Id_Karyawan='$Id_Karyawan' AND Tanggal='$Tanggal'";
$result = mysqli_query($koneksi, $query);
$absensi = mysqli_fetch_assoc($result);

if (!$absensi) {
    echo "Data absensi tidak ditemukan.";
    exit;
}
?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="Id_Karyawan" value="<?= htmlspecialchars($absensi['Id_Karyawan']) ?>">
        <input type="hidden" name="Tanggal" value="<?= htmlspecialchars($absensi['Tanggal']) ?>">

        <div class="mb-3">
            <label class="form-label">Agenda</label>
            <input type="text" class="form-control" name="Agenda" value="<?= htmlspecialchars($absensi['Agenda']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Masuk</label>
            <input type="time" class="form-control" name="Jam_Masuk" value="<?= $absensi['Jam_Masuk'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Keluar</label>
            <input type="time" class="form-control" name="Jam_Keluar" value="<?= $absensi['Jam_Keluar'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" name="Status" value="<?= htmlspecialchars($absensi['Status']) ?>">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>
