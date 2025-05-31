<?php
include("../koneksi.php");

$query = 'SELECT * FROM Proyek;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
include('../back_to_dashboard.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Proyek</h2>
        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Proyek</th>
                <th scope="col">ID Klien</th>
                <th scope="col">ID Karyawan</th>
                <th scope="col">ID Keuangan</th>
                <th scope="col">Nama Proyek</th>
                <th scope="col">Tanggal Mulai</th>
                <th scope="col">Tanggal Selesai</th>
                <th scope="col">Anggaran</th>
                <th scope="col">Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($Proyek = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= htmlspecialchars($Proyek->Id_Proyek) ?></td>
                    <td><?= htmlspecialchars($Proyek->Id_Klien) ?></td>
                    <td><?= htmlspecialchars($Proyek->Id_Karyawan) ?></td>
                    <td><?= htmlspecialchars($Proyek->Id_Keuangan) ?></td>
                    <td><?= htmlspecialchars($Proyek->Nama_Proyek) ?></td>
                    <td><?= htmlspecialchars($Proyek->Tanggal_Mulai) ?></td>
                    <td><?= htmlspecialchars($Proyek->Tanggal_Selesai) ?></td>
                    <td><?= htmlspecialchars($Proyek->Anggaran) ?></td>
                    <td><?= htmlspecialchars($Proyek->Status) ?></td>
                    <td>
                        <a href="edit.php?Id_Proyek=<?= $Proyek->Id_Proyek ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&Id_Proyek=<?= $Proyek->Id_Proyek ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

<!-- Modal Tambah Data Proyek -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="function.php?action=insert" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Proyek</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="Id_Proyek" class="form-label">ID Proyek</label>
                <input type="text" class="form-control" id="Id_Proyek" name="Id_Proyek" placeholder="Masukkan ID Proyek" required>
            </div>
            <div class="mb-3">
                <label for="Id_Klien" class="form-label">ID Klien</label>
                <input type="text" class="form-control" id="Id_Klien" name="Id_Klien" placeholder="Masukkan ID Klien" required>
            </div>
            <div class="mb-3">
                <label for="Id_Karyawan" class="form-label">ID Karyawan</label>
                <input type="text" class="form-control" id="Id_Karyawan" name="Id_Karyawan" placeholder="Masukkan ID Karyawan" required>
            </div>
            <div class="mb-3">
                <label for="Id_Keuangan" class="form-label">ID Keuangan</label>
                <input type="text" class="form-control" id="Id_Keuangan" name="Id_Keuangan" placeholder="Masukkan ID Keuangan" required>
            </div>
            <div class="mb-3">
                <label for="Nama_Proyek" class="form-label">Nama Proyek</label>
                <input type="text" class="form-control" id="Nama_Proyek" name="Nama_Proyek" placeholder="Masukkan Nama Proyek" required>
            </div>
            <div class="mb-3">
                <label for="Tanggal_Mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="Tanggal_Mulai" name="Tanggal_Mulai" required>
            </div>
            <div class="mb-3">
                <label for="Tanggal_Selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="Tanggal_Selesai" name="Tanggal_Selesai" required>
            </div>
            <div class="mb-3">
                <label for="Anggaran" class="form-label">Anggaran</label>
                <input type="number" class="form-control" id="Anggaran" name="Anggaran" placeholder="Masukkan Anggaran" required>
            </div>
            <div class="mb-3">
                <label for="Status" class="form-label">Status</label>
                <input type="text" class="form-control" id="Status" name="Status" placeholder="Masukkan Status" required>
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