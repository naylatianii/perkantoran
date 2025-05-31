<?php include("../koneksi.php"); ?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="insert">

        <div class="mb-3">
            <label for="Id_Karyawan" class="form-label">ID Karyawan</label>
            <input type="number" class="form-control" name="Id_Karyawan" id="Id_Karyawan" placeholder="Masukkan ID Karyawan">
        </div>

        <div class="mb-3">
            <label for="Nama_Lengkap" class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control" name="Nama_Lengkap" id="Nama_Lengkap" placeholder="Masukkan Nama Karyawan">
        </div>

        <div class="mb-3">
            <label for="Jenis_Kelamin" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" name="Jenis_Kelamin" id="Jenis_Kelamin" placeholder="Jenis Kelamin">
        </div>

         <div class="mb-3">
            <label for="TTL" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="TTL" id="TTL">
        </div>

         <div class="mb-3">
            <label for="Jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="Jabatan" id="Jabatan" placeholder="Masukkan Jabatan Anda">
        </div>

         <div class="mb-3">
            <label for="No_Hp" class="form-label">Nomor Hp</label>
            <input type="text" class="form-control" name="No_Hp" id="No_Hp">
        </div>
         <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="text" class="form-control" name="Email" id="Email" placeholder="Masukkan Email Anda">
        </div>
         <div class="mb-3">
            <label for="Tahun_Masuk" class="form-label">Tahun Bergabung</label>
            <input type="year" class="form-control" name="Tahun_Masuk" id="Tahun_Masuk" placeholder="Tahun Anda Bergabung">
        </div>
         <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Masukkan Alamat Anda">
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>