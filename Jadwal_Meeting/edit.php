<?php
include('../layouts/header.php');
include("../koneksi.php");

$Id_meeting = (int) ($_GET['Id_meeting'] ?? null);

if (!$Id_meeting) {
    echo "ID Meeting tidak ditemukan.";
    exit;
}

$query = "SELECT * FROM Jadwal_Meeting WHERE Id_meeting = $Id_meeting";
$result = mysqli_query($koneksi, $query);
$jadwal = mysqli_fetch_assoc($result);

if (!$jadwal) {
    echo "Jadwal Meeting tidak ditemukan.";
    exit;
}
?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php?action=edit" method="POST">
        <input type="hidden" name="Id_meeting" value="<?= htmlspecialchars($jadwal['Id_meeting']) ?>">

        <div class="mb-3">
            <label for="Id_Karyawan" class="form-label">ID Karyawan</label>
            <input type="number" class="form-control" name="Id_Karyawan" id="Id_Karyawan" value="<?= htmlspecialchars($jadwal['Id_Karyawan']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="Agenda" class="form-label">Agenda</label>
            <input type="text" class="form-control" name="Agenda" id="Agenda" value="<?= htmlspecialchars($jadwal['Agenda']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="Tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="Tanggal" id="Tanggal" value="<?= htmlspecialchars($jadwal['Tanggal']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="Jam_Mulai" class="form-label">Jam Mulai</label>
            <input type="time" class="form-control" name="Jam_Mulai" id="Jam_Mulai" value="<?= htmlspecialchars($jadwal['Jam_Mulai']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="Jam_Selesai" class="form-label">Jam Selesai</label>
            <input type="time" class="form-control" name="Jam_Selesai" id="Jam_Selesai" value="<?= htmlspecialchars($jadwal['Jam_Selesai']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="Lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="Lokasi" id="Lokasi" value="<?= htmlspecialchars($jadwal['Lokasi']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="Id_Divisi" class="form-label">ID Divisi</label>
            <input type="number" class="form-control" name="Id_Divisi" id="Id_Divisi" value="<?= htmlspecialchars($jadwal['Id_Divisi']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="Id_Ruangan" class="form-label">ID Ruangan</label>
            <input type="number" class="form-control" name="Id_Ruangan" id="Id_Ruangan" value="<?= htmlspecialchars($jadwal['Id_Ruangan']) ?>" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>
