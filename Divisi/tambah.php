<?php include("../koneksi.php"); ?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="insert">

    <div class="mb-3">
      <label for="Id_Divisi" class="form-label">ID Divisi</label>
      <input type="number" class="form-control" name="Id_Divisi" id="Id_Divisi" placeholder="Masukkan ID Divisi">
    </div>

    <div class="mb-3">
      <label for="Id_Karyawan" class="form-label">ID Karyawan</label>
      <input type="number" class="form-control" name="Id_Karyawan" id="Id_Karyawan">
    </div>
    
    <div class="mb-3">
      <label for="Id_Inventaris" class="form-label">ID Inventaris</label>
      <input type="number" class="form-control" name="Id_Inventaris" id="Id_Inventaris">
    </div>

    <div class="mb-3">
      <label for="Nama_Divisi" class="form-label">Nama Divisi</label>
      <input type="text" class="form-control" name="Nama_Divisi" id="Nama_Divisi" placeholder="Masukkan Nama Divisi">
    </div>

    <div class="mb-3">
      <label for="Kepala_Divisi" class="form-label">Kepala Divisi</label>
      <input type="text" class="form-control" name="Kepala_Divisi" id="Kepala_Divisi" placeholder="Jenis Kelamin">
    </div>

    <div class="mb-3">
      <label for="Bidang" class="form-label">Bidang</label>
      <input type="text" class="form-control" name="Bidang" id="Bidang" >
    </div>

    <div class="mb-3">
      <label for="Jumlah_Karyawan" class="form-label">Jumlah_Karyawan</label>
      <input type="number" class="form-control" name="Jumlah_Karyawan" id="Jumlah_Karyawan">
    </div>
  </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button> <!-- Perbaikan: submit -->
        </div>
      </div>
    </form>
  </div>
</div>



<?php include('../layouts/footer.php'); ?>

