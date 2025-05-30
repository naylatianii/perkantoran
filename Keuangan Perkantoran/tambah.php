<?php 
include('../layouts/header.php'); 
include("../koneksi.php");
?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="insert">


        <div class="mb-3">
            <label for="Id_Keuangan" class="form-label">ID Keuangan</label>
            <input type="number" class="form-control" name="Id_Keuangan" id="Id_Keuangan" placeholder="Masukkan ID Keuangan">
        </div>

        <div class="mb-3">
            <label for="Id_Divisi" class="form-label">Id Divisi</label>
            <input type="number" class="form-control" name="Id_Divisi" id="Id_Divisi" value="<?= htmlspecialchars($Keuangan_Perkantoran['Id_Divisi']) ?>" placeholder="Masukkan Id Divisi">
        </div>

        <div class="mb-3">
            <label for="Jenis_Transaksi" class="form-label">Jenis Transaksi</label>
            <select class="form-control" name="Jenis_Transaksi" id="Jenis_Transaksi" required>
                <option value="">-- Pilih Jenis Transaksi --</option>
                <option value="Pemasukan" <?= ($Keuangan_Perkantoran['Jenis_Transaksi'] ?? '') === 'Pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
                <option value="Pengeluaran" <?= ($Keuangan_Perkantoran['Jenis_Transaksi'] ?? '') === 'Pengeluaran' ? 'selected' : '' ?>>Pengeluaran</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="Saldo" class="form-label">Saldo</label>
            <input type="number" class="form-control" name="Saldo" id="Saldo" value="<?= htmlspecialchars($Keuangan_Perkantoran['Saldo']) ?>" placeholder="Masukkan Saldo">
        </div>

        <div class="mb-3">
            <label for="Keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" name="Keterangan" id="Keterangan" value="<?= htmlspecialchars($Keuangan_Perkantoran['Keterangan']) ?>" placeholder="Masukkan Keterangan">
        </div>

        <div class="mb-3">
            <label for="Tanggal" class="form-label">Total </label>
            <input type="date" class="form-control" name="Tanggal" id="Tanggal" value="<?= htmlspecialchars($Keuangan_Perkantoran['Tanggal']) ?>" placeholder="Masukkan Total">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>