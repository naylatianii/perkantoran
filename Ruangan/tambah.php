<?php include("../koneksi.php"); ?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID Ruangan</label>
            <input type="number" class="form-control" name="Id_Ruangan" id="exampleFormControlInput1" placeholder="Masukkan ID Ruangan">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID Meeting</label>
            <input type="number" class="form-control" name="Id_Meeting" id="exampleFormControlInput1" placeholder="Masukkan Id Meeting">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Id Inventaris</label>
            <input type="number" class="form-control" name="Id_Inventaris" id="exampleFormControlInput1" placeholder="Masukkan Id Inventaris">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nama Ruangan</label>
            <input type="text" class="form-control" name="Nama_Ruangan" id="exampleFormControlInput1" placeholder="Masukkan Nama Ruangan">
        </div>
         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" name="Kapasitas" id="exampleFormControlInput1" placeholder="Masukkan Kapasitas Ruangan">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="Lokasi" id="exampleFormControlInput1" placeholder="Masukkan Lokasi Ruangan">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Fasilitas</label>
            <input type="text" class="form-control" name="Fasilitas" id="exampleFormControlInput1" placeholder="Masukkan Fasilitas">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Status</label>
            <input type="text" class="form-control" name="Status" id="exampleFormControlInput1" placeholder="Masukkan Status Ruangan">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>