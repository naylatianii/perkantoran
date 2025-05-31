<?php
include("../koneksi.php");

$query = 'SELECT * FROM Jadwal_Meeting;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
include('../back_to_dashboard.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Jadwal Meeting</h2>
        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Meeting</th>
                <th scope="col">ID Karyawan</th>
                <th scope="col">Agenda</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam Mulai</th>
                <th scope="col">Jam Selesai</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Id_Divisi</th>
                <th scope="col">Id_Ruangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($Jadwal_Meeting = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= $Jadwal_Meeting->Id_meeting?></td>
                    <td><?= $Jadwal_Meeting->Id_Karyawan?></td>
                    <td><?= $Jadwal_Meeting->Agenda?></td>
                    <td><?= $Jadwal_Meeting->Tanggal ?></td>
                    <td><?= $Jadwal_Meeting->Jam_Mulai ?></td>
                    <td><?= $Jadwal_Meeting->Jam_Selesai?></td>
                    <td><?= $Jadwal_Meeting->Lokasi?></td>
                    <td><?= $Jadwal_Meeting->Id_Divisi?></td>
                    <td><?= $Jadwal_Meeting->Id_Ruangan?></td>
                    <td>
                      <a href="edit.php?Id_meeting=<?= $Jadwal_Meeting->Id_meeting ?>" class="btn btn-warning btn-sm">Edit</a>
                      <a href="function.php?action=delete&Id_meeting=<?= $Jadwal_Meeting->Id_meeting ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

<!-- Modal Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="function.php?action=insert" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Meeting</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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