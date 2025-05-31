<?php include("../koneksi.php"); ?>

<section class="p-4 ml-5 mr-5 w-50">
    <form action="function.php" method="POST">
        <input type="hidden" name="action" value="insert">

    <div class="mb-3">
            <label for="Id_Karyawan" class="form-label">ID Karyawan</label>
            <input type="number" class="form-control" name="Id_Karyawan" id="Id_Karyawan" placeholder="Masukkan ID Karyawan" required>
          </div>

          <div class="mb-3">
            <label for="Tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="Tanggal" id="Tanggal" required>
          </div>

          <div class="mb-3">
            <label for="Agenda" class="form-label">Agenda</label>
            <input type="text" class="form-control" name="Agenda" id="Agenda" placeholder="Masukkan Agenda Hari Ini" required>
          </div>

          <div class="mb-3">
            <label for="Jam_Masuk" class="form-label">Jam Masuk</label>
            <input type="time" class="form-control" name="Jam_Masuk" id="Jam_Masuk" required>
          </div>

          <div class="mb-3">
            <label for="Jam_Keluar" class="form-label">Jam Keluar</label>
            <input type="time" class="form-control" name="Jam_Keluar" id="Jam_Keluar" required>
          </div>

          <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <select class="form-control" name="Status" id="Status" required>
              <option value="">-- Pilih Status --</option>
              <option value="Hadir">Hadir</option>
              <option value="Izin">Izin</option>
              <option value="Sakit">Sakit</option>
              <option value="Alpha">Alpha</option>
            </select>
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
