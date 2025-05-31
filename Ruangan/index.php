<?php
include("../koneksi.php");

$query = 'SELECT * FROM Ruangan;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
include('../back_to_dashboard.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Ruangan</h2>
        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahRuangan">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Ruangan</th>
                <th scope="col">ID Inventaris</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Fasilitas</th>
                <th scope="col">Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($Ruangan = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= htmlspecialchars($Ruangan->Id_Ruangan) ?></td>
                    <td><?= htmlspecialchars($Ruangan->Id_Inventaris) ?></td>
                    <td><?= htmlspecialchars($Ruangan->Nama_Ruangan) ?></td>
                    <td><?= htmlspecialchars($Ruangan->Kapasitas) ?></td>
                    <td><?= htmlspecialchars($Ruangan->Lokasi) ?></td>
                    <td><?= htmlspecialchars($Ruangan->Fasilitas) ?></td>
                    <td><?= htmlspecialchars($Ruangan->Status) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $Ruangan->Id_Ruangan ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&Id_Ruangan=<?= $Ruangan->Id_Ruangan ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

<!-- Modal Tambah Data Ruangan -->
<div class="modal fade" id="modalTambahRuangan" tabindex="-1" aria-labelledby="modalTambahRuanganLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="function.php?action=insert" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahRuanganLabel">Tambah Data Ruangan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="Id_Ruangan" class="form-label">ID Ruangan</label>
                <input type="text" class="form-control" id="Id_Ruangan" name="Id_Ruangan" required>
            </div>
            <div class="mb-3">
                <label for="Id_Inventaris" class="form-label">ID Inventaris</label>
                <input type="text" class="form-control" id="Id_Inventaris" name="Id_Inventaris" required>
            </div>
            <div class="mb-3">
                <label for="Nama_Ruangan" class="form-label">Nama Ruangan</label>
                <input type="text" class="form-control" id="Nama_Ruangan" name="Nama_Ruangan" required>
            </div>
            <div class="mb-3">
                <label for="Kapasitas" class="form-label">Kapasitas</label>
                <input type="number" class="form-control" id="Kapasitas" name="Kapasitas" required>
            </div>
            <div class="mb-3">
                <label for="Lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="Lokasi" name="Lokasi" required>
            </div>
            <div class="mb-3">
                <label for="Fasilitas" class="form-label">Fasilitas</label>
                <textarea class="form-control" id="Fasilitas" name="Fasilitas" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label for="Status" class="form-label">Status</label>
                <input type="text" class="form-control" id="Status" name="Status" placeholder="Masukkan status (misal: Tersedia)" required>
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