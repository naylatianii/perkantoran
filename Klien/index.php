<?php
include("../koneksi.php");

$query = 'SELECT * FROM Klien;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Klien</h2>
        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Klien</th>
                <th scope="col">Nama Klien</th>
                <th scope="col">Nama Perusahaan</th>
                <th scope="col">Jam Mulai</th>
                <th scope="col">Jam Selesai</th>
                <th scope="col">Tanggal Kunjungan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($Klien = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= htmlspecialchars($Klien->Id_Klien) ?></td>
                    <td><?= htmlspecialchars($Klien->Nama_Klien) ?></td>
                    <td><?= htmlspecialchars($Klien->Nama_Perusahaan) ?></td>
                    <td><?= htmlspecialchars($Klien->Jam_Mulai) ?></td>
                    <td><?= htmlspecialchars($Klien->Jam_Selesai) ?></td>
                    <td><?= htmlspecialchars($Klien->Tanggal_Kunjungan) ?></td>            
                    <td>
                        <a href="edit.php?Id_Klien=<?= $Klien->Id_Klien ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&Id_Klien=<?= $Klien->Id_Klien ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Klien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="Id_Klien" class="form-label">ID Klien</label>
                <input type="text" class="form-control" id="Id_Klien" name="Id_Klien" placeholder="Masukkan ID Klien" required>
            </div>
            <div class="mb-3">
                <label for="Nama_Klien" class="form-label">Nama Klien</label>
                <input type="text" class="form-control" id="Nama_Klien" name="Nama_Klien" placeholder="Masukkan Nama Klien" required>
            </div>
            <div class="mb-3">
                <label for="Nama_Perusahaan" class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control" id="Nama_Perusahaan" name="Nama_Perusahaan" placeholder="Masukkan Nama Perusahaan" required>
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
                <label for="Tanggal_Kunjungan" class="form-label">Tanggal Kunjungan</label>
                <input type="date" class="form-control" id="Tanggal_Kunjungan" name="Tanggal_Kunjungan" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include('../layouts/footer.php'); ?>