<?php
include("../koneksi.php");

$query = 'SELECT * FROM Inventaris;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Inventaris</h2>
        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Inventaris</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Status</th>
                <th scope="col">Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($Inventaris = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= htmlspecialchars($Inventaris->id_Inventaris) ?></td>
                    <td><?= htmlspecialchars($Inventaris->Nama_Barang) ?></td>
                    <td><?= htmlspecialchars($Inventaris->Jumlah) ?></td>
                    <td><?= htmlspecialchars($Inventaris->Status) ?></td>
                    <td><?= htmlspecialchars($Inventaris->Lokasi) ?></td>
                    <td>
                        <a href="edit.php?id_Inventaris=<?= $Inventaris->id_Inventaris ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&id_Inventaris=<?= $Inventaris->id_Inventaris ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Inventaris</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="id_Inventaris" class="form-label">ID Inventaris</label>
                <input type="text" class="form-control" id="id_Inventaris" name="id_Inventaris" placeholder="Masukkan ID Inventaris" required>
            </div>
            <div class="mb-3">
                <label for="Nama_Barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="Nama_Barang" name="Nama_Barang" placeholder="Masukkan Nama Barang" required>
            </div>
            <div class="mb-3">
                <label for="Jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="Jumlah" name="Jumlah" placeholder="Masukkan Jumlah" required>
            </div>
            <div class="mb-3">
                <label for="Status" class="form-label">Status</label>
                <input type="text" class="form-control" id="Status" name="Status" placeholder="Masukkan Status" required>
            </div>
            <div class="mb-3">
                <label for="Lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="Lokasi" name="Lokasi" placeholder="Masukkan Lokasi" required>
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
