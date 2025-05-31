<?php
include("../koneksi.php");

$query = 'SELECT * FROM Absensi_Karyawan;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Absensi Karyawan</h2>
          <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Karyawan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Agenda</th>
                <th scope="col">Jam Masuk</th>
                <th scope="col">Jam Keluar</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($Absensi_Karyawan = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= $Absensi_Karyawan->Id_Karyawan?></td>
                    <td><?= $Absensi_Karyawan->Tanggal?></td>
                    <td><?= $Absensi_Karyawan->Agenda?></td>
                    <td><?= $Absensi_Karyawan->Jam_Masuk?></td>
                    <td><?= $Absensi_Karyawan->Jam_Keluar?></td>
                    <td><?= $Absensi_Karyawan->Status?></td>                  
                    <td>
                        <a href="edit.php?Id_Karyawan=<?= $Absensi_Karyawan->Id_Karyawan ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&Id_Karyawan=<?= $Absensi_Karyawan->Id_Karyawan ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="function.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Absensi_Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </button>
      </div>
  <input type="hidden" name="action" value="insert">

  <div class="modal-body">
    <div class="mb-3">
      <label for="Id_Karyawan" class="form-label">ID Absensi_Karyawan</label>
      <input type="number" class="form-control" name="Id_Karyawan" id="Id_Karyawan" placeholder="Masukkan ID Absensi_Karyawan">
    </div>
    
    <div class="mb-3">
      <label for="Tanggal" class="form-label">Tanggal</label>
      <input type="date" class="form-control" name="Tanggal" id="Tanggal">
    </div>

    <div class="mb-3">
      <label for="Agenda" class="form-label">Agenda</label>
      <input type="text" class="form-control" name="Agenda" id="Agenda" placeholder="Masukkan Agenda Hari Ini">
    </div>

    <div class="mb-3">
      <label for="Jam_Masuk" class="form-label">Jam Masuk</label>
      <input type="time" class="form-control" name="Jam_Masuk" id="Jam_Masuk" placeholder="Jam Masuk">
    </div>

    <div class="mb-3">
      <label for="Jam_Keluar" class="form-label">Jam Keluar</label>
      <input type="time" class="form-control" name="Jam_Keluar" id="Jam_Keluar" placeholder="Jam Keluar">
    </div>

    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <input type="text" class="form-control" name="Status" id="Status">
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

