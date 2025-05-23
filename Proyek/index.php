<?php
include("koneksi.php");

$query = 'SELECT * FROM proyek;';
$result = mysqli_query($koneksi, $query);

include 'layouts/header.php';
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data proyek</h2>
        <a type="button" class="btn btn-primary" onclick="tambahData()" data-toggle="modal" data-target="#exampleModal">+Tambah</a>
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
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($proyek = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= $proyek->Id_Proyek ?></td>
                    <td><?= $proyek->Id_Klien ?></td>
                    <td><?= $proyek->Id_Karyawan ?></td>
                    <td><?= $proyek->Id_Keuangan ?></td>
                    <td><?= $proyek->Nama_Proyek ?></td>
                    <td><?= $proyek->Tanggal_Mulai ?></td>
                    <td><?= $proyek->Tanggal_Selesai ?></td>
                    <td><?= $proyek->Anggaran ?></td>
                    <td><?= $proyek->Status ?></td>                   
                    <td>
                        <a href="edit.php?id=<?= $proyek->id ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&id=<?= $proyek->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
                    <label for="Id_Proyek">Id Proyek</label>
                    <input type="text" class="form-control" id="Id_Proyek" name="Id_Proyek" placeholder="Masukkan id proyek">
                    <div class="invalid-feedback kategori-nama-ada inv-kategori-nama">
                      &nbsp;
                    </div>
      </div>
      <div class="form-group">
                    <label for="Id_Proyek">Nama Klien</label>
                    <select name="Nama_Klien" id="Nama_Klien" class="form-control">
                        <option value="">Pilih Klien</option>
                        <?php
                        $query_klien = mysqli_query($koneksi, "SELECT * FROM klien");
                        while ($klien = mysqli_fetch_array($query_klien)) {
                          echo "<option value=" . $klien['Id_Klien'] . ">" . $klien['Nama_Klien'] . "</option>";
                        }
                        ?>
                      </select>
                    <div class="invalid-feedback kategori-nama-ada inv-kategori-nama">
                      &nbsp;
                    </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<?php include 'layouts/footer.php'; ?>

