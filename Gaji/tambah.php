<?php include("../koneksi.php"); ?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="insert">

        <div class="mb-3">
            <label for="Id_Gaji" class="form-label">Id Gaji</label>
            <input type="number" class="form-control" name="Id_Gaji" id="Id_Gaji" value="<?= htmlspecialchars($Gaji['Id_Gaji']) ?>" placeholder="Masukkan Id Gaji">
        </div>

        <div class="mb-3">
            <label for="Id_Karyawan" class="form-label">Id Karyawan</label>
            <input type="number" class="form-control" name="Id_Karyawan" id="Id_Karyawan" value="<?= htmlspecialchars($Gaji['Id_Karyawan']) ?>" placeholder="Masukkan Id Karyawan">
        </div>

        <div class="mb-3">
            <label for="Id_Keuangan" class="form-label">Id Keuangan</label>
            <input type="number" class="form-control" name="Id_Keuangan" id="Id_Keuangan" value="<?= htmlspecialchars($Gaji['Id_Keuangan']) ?>" placeholder="Masukkan Id Keuangan">
        </div>

        <div class="mb-3">
            <label for="Gaji_Pokok" class="form-label">Gaji Pokok</label>
            <input type="number" class="form-control" name="Gaji_Pokok" id="Gaji_Pokok" value="<?= htmlspecialchars($Gaji['Gaji_Pokok']) ?>" placeholder="Masukkan Gaji Pokok">
        </div>

        <div class="mb-3">
            <label for="Potongan_Pajak" class="form-label">Potongan Pajak</label>
            <input type="number" class="form-control" name="Potongan_Pajak" id="Potongan_Pajak" value="<?= htmlspecialchars($Gaji['Potongan_Pajak']) ?>" placeholder="Masukkan Potongan Pajak">
        </div>

        <div class="mb-3">
            <label for="Bonus" class="form-label">Bonus</label>
            <input type="number" class="form-control" name="Bonus" id="Bonus" value="<?= htmlspecialchars($Gaji['Bonus']) ?>" placeholder="Masukkan Bonus">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>