<?php include("../koneksi.php"); ?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="insert">

        <div class="mb-3">
                <label for="Id_meeting" class="form-label">ID Meeting</label>
                <input type="number" class="form-control" id="Id_meeting" name="Id_meeting" placeholder="Masukkan ID Meeting" required>
            </div>

            <div class="mb-3">
                <label for="Id_Karyawan" class="form-label">ID Karyawan</label>
                <input type="number" class="form-control" id="Id_Karyawan" name="Id_Karyawan" placeholder="Masukkan ID Karyawan" required>
            </div>

            <div class="mb-3">
                <label for="Agenda" class="form-label">Agenda</label>
                <input type="text" class="form-control" id="Agenda" name="Agenda" placeholder="Masukkan Agenda" required>
            </div>

            <div class="mb-3">
                <label for="Tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="Tanggal" name="Tanggal" required>
            </div>

            <div class="mb-3">
                <label for="Jam_Mulai" class="form-label">Jam Mulai</label>
                <input type="time" class="form-control" id="Jam_Mulai" name="Jam_Mulai" required>
            </div>

             <div class="mb-3">
                <label for="Jam_Selesai" class="form-label">Jam Selesai</label>
                <input type="time" class="form-control" id="Jam_Selesai" name="Jam_Selesai" required>
            </div>

             <div class="mb-3">
                <label for="Lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="Lokasi" name="Lokasi" required>
            </div>

             <div class="mb-3">
                <label for="Id_Divisi" class="form-label">ID DIVISI</label>
                <input type="number" class="form-control" id="Id_Divisi" name="Id_Divisi" required>
            </div>

             <div class="mb-3">
                <label for="Id_Ruangan" class="form-label">ID Ruangan</label>
                <input type="number" class="form-control" id="Id_Ruangan" name="Id_Ruangan" required>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include('../layouts/footer.php'); ?>