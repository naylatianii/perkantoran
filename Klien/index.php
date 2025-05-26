<?php
include("../koneksi.php");

$query = 'SELECT * FROM Klien;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Klien</h2>
        <a type="button" class="btn btn-primary" onclick="tambahData()" data-toggle="modal" data-target="#exampleModal">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Klien</th>
                <th scope="col">Nama klien</th>
                <th scope="col">Nama Perusahaan</th>
                <th scope="col">Jam Mulai</th>
                <th scope="col">Jam Selesai</th>
                <th scope="col">Tanggal Kunjungan</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($Klien = mysqli_fetch_object($result)) { ?>
                <tr>
   <td><?= $klien->Id_Klien ?></td>
                    <td><?= $klien->Nama_Klien ?></td>
                    <td><?= $klien->Jam_Mulai ?></td>
                    <td><?= $klien->Jam_Selesai ?></td>
                    <td><?= $klien->Tanggal_Kunjungan ?></td>
                    <td><?= $klien->Status ?></td>              
                    <td>
                        <a href="edit.php?id=<?= $Klien->id ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&id=<?= $Klien->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
                    <label for="Id_Klien">Id Klien</label>
                    <input type="text" class="form-control" id="Id_Klien" name="Id_Klien" placeholder="Masukkan id Klien">
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



<?php include('../layouts/footer.php'); ?>