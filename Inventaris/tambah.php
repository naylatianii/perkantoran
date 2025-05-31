<?php include("../koneksi.php"); ?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID Inventaris</label>
            <input type="number" class="form-control" name="id_Inventaris" id="exampleFormControlInput1" placeholder="Masukkan ID Inventaris">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nama Barang/label>
            <input type="text" class="form-control" name="Nama_Barang" id="exampleFormControlInput1" placeholder="Masukkan Nama Barang">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Jumlah</label>
            <input type="text" class="form-control" name="Jumlah" id="exampleFormControlInput1" placeholder="Masukkan Jumlah">
        </div>

         <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Status</label>
            <input type="text" class="form-control" name="Status" id="exampleFormControlInput1" placeholder="Masukkan Status" >
        </div>
        
         <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="Lokasi" id="exampleFormControlInput1" placeholder="Masukkan Lokasi">
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>

<?php include('../layouts/footer.php'); ?>