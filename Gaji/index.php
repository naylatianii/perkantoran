<?php
include("../koneksi.php");

$query = 'SELECT * FROM Gaji;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Gaji</h2>
        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Gaji</th>
                <th scope="col">ID Karyawan</th>
                <th scope="col">ID Keuangan</th>
                <th scope="col">Gaji Pokok</th>
                <th scope="col">Potongan Pajak</th>
                <th scope="col">Bonus</th>
                <th scope="col">Total Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($Gaji = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= $Gaji->Id_Gaji ?></td>
                    <td><?= $Gaji->Id_Karyawan ?></td>
                    <td><?= $Gaji->Id_Keuangan ?></td>
                    <td><?= $Gaji->Gaji_Pokok ?></td>
                    <td><?= $Gaji->Potongan_Pajak ?></td>
                    <td><?= $Gaji->Bonus ?></td>
                    <td><?= $Gaji->Total_Gaji ?></td>
                    <td>
                        <a href="edit.php?Id_Gaji=<?= $Gaji->Id_Gaji ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&Id_Gaji=<?= $Gaji->Id_Gaji ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Gaji</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="Id_Gaji" class="form-label">ID Gaji</label>
                <input type="number" class="form-control" id="Id_Gaji" name="Id_Gaji" placeholder="Masukkan ID Gaji" required>
            </div>

            <div class="mb-3">
                <label for="Id_Karyawan" class="form-label">ID Karyawan</label>
                <input type="number" class="form-control" id="Id_Karyawan" name="Id_Karyawan" placeholder="Masukkan ID Karyawan" required>
            </div>

            <div class="mb-3">
                <label for="Id_Keuangan" class="form-label">ID Keuangan</label>
                <input type="number" class="form-control" id="Id_Keuangan" name="Id_Keuangan" placeholder="Masukkan ID Keuangan" required>
            </div>

            <div class="mb-3">
                <label for="Gaji_Pokok" class="form-label">Gaji Pokok</label>
                <input type="number" class="form-control" id="Gaji_Pokok" name="Gaji_Pokok" placeholder="Masukkan Gaji Pokok" required>
            </div>

            <div class="mb-3">
                <label for="Potongan_Pajak" class="form-label">Potongan Pajak</label>
                <input type="number" class="form-control" id="Potongan_Pajak" name="Potongan_Pajak" placeholder="Masukkan Potongan Pajak" required>
            </div>

            <div class="mb-3">
                <label for="Bonus" class="form-label">Bonus</label>
                <input type="number" class="form-control" id="Bonus" name="Bonus" placeholder="Masukkan Bonus" required>
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