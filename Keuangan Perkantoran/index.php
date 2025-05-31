<?php
include("../koneksi.php");

$query = 'SELECT * FROM Keuangan_Perkantoran;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
include('../back_to_dashboard.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Keuangan Perkantoran</h2>
        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Keuangan</th>
                <th scope="col">ID Divisi</th>
                <th scope="col">Jenis Transaksi</th>
                <th scope="col">Saldo</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($Keuangan_Perkantoran = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= $Keuangan_Perkantoran->Id_Keuangan?></td>
                    <td><?= $Keuangan_Perkantoran->Id_Divisi?></td>
                    <td><?= $Keuangan_Perkantoran->Jenis_Transaksi?></td>
                    <td><?= $Keuangan_Perkantoran->Saldo ?></td>
                    <td><?= $Keuangan_Perkantoran->Keterangan ?></td>
                    <td><?= $Keuangan_Perkantoran->Tanggal?></td>
                    <td>
                      <a href="edit.php?Id_Keuangan=<?= $Keuangan_Perkantoran->Id_Keuangan ?>" class="btn btn-warning btn-sm">Edit</a>
                      <a href="function.php?action=delete&Id_Keuangan=<?= $Keuangan_Perkantoran->Id_Keuangan ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Keuangan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="Id_Keuangan" class="form-label">ID Keuangan</label>
                <input type="number" class="form-control" id="Id_Keuangan" name="Id_Keuangan" placeholder="Masukkan ID Keuangan" required>
            </div>

            <div class="mb-3">
                <label for="Id_Divisi" class="form-label">ID Divisi</label>
                <input type="number" class="form-control" id="Id_Divisi" name="Id_Divisi" placeholder="Masukkan ID Divisi" required>
            </div>

            <div class="mb-3">
                <label for="Jenis_Transaksi" class="form-label">Jenis Transaksi</label>
                <select class="form-control" id="Jenis_Transaksi" name="Jenis_Transaksi" required>
                    <option value="">-- Pilih Jenis Transaksi --</option>
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="Saldo" class="form-label">Saldo</label>
                <input type="number" class="form-control" id="Saldo" name="Saldo" placeholder="Masukkan Saldo" required>
            </div>

            <div class="mb-3">
                <label for="Keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="Keterangan" name="Keterangan" placeholder="Masukkan Keterangan" required>
            </div>

            <div class="mb-3">
                <label for="Tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="Tanggal" name="Tanggal" required>
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