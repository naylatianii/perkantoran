<?php 
include('../layouts/header.php');
include("../koneksi.php");

$Id_Karyawan = (int) $_GET['Id_Karyawan'] ?? null;

if (!$Id_Karyawan) {
    echo "ID Karyawan tidak ditemukan.";
    exit;
}

$query = "SELECT * FROM Karyawan WHERE Id_Karyawan = $Id_Karyawan";
$result = mysqli_query($koneksi, $query);
$Karyawan = mysqli_fetch_assoc($result);

if (!$Karyawan) {
    echo "Karyawan tidak ditemukan.";
    exit;
}
?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="Id_Karyawan" value="<?= $Karyawan['Id_Karyawan'] ?>">


        <div class="mb-3">
            <label for="Nama_Lengkap" class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control" name="Nama_Lengkap" id="Nama_Lengkap" value="<?= htmlspecialchars($Karyawan['Nama_Lengkap']) ?>" placeholder="Masukkan Nama Lengkap">
        </div>

        <div class="mb-3">
            <label for="Jenis_Kelamin" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" name="Jenis_Kelamin" id="Jenis_Kelamin" value="<?= htmlspecialchars($Karyawan['Jenis_Kelamin']) ?>" placeholder="Jenis Kelamin">
        </div>

        <div class="mb-3">
            <label for="TTL" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="TTL" id="TTL" value="<?= htmlspecialchars($Karyawan['TTL']) ?>" >
        </div>

         <div class="mb-3">
            <label for="Jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="Jabatan" id="Jabatan" value="<?= htmlspecialchars($Karyawan['Jabatan']) ?>" placeholder="Jabatan">
        </div>

         <div class="mb-3">
            <label for="No_Hp" class="form-label">Nomor Hp</label>
            <input type="number" class="form-control" name="No_Hp" id="No_Hp" value="<?= htmlspecialchars($Karyawan['No_Hp']) ?>" >
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="text" class="form-control" name="Email" id="Email" value="<?= htmlspecialchars($Karyawan['Email']) ?>" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="Tahun_Masuk" class="form-label">Tahun Bergabung</label>
            <input type="year" class="form-control" name="Tahun_Masuk" id="Tahun_Masuk" value="<?= htmlspecialchars($Karyawan['Tahun_Masuk']) ?>" placeholder="Tahun Bergabung Anda">
        </div>
        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="Alamat" id="Alamat" value="<?= htmlspecialchars($Karyawan['Alamat']) ?>" placeholder="Alamat">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>