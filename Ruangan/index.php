<?php
include("../koneksi.php");

$query = 'SELECT * FROM Ruangan;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Ruangan</h2>
        <a type="button" class="btn btn-primary" onclick="tambahData()" data-toggle="modal" data-target="#exampleModal">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Ruangan</th>
                <th scope="col">ID Meeting</th>
                <th scope="col">ID Inventaris</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Fasilitas</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($Ruangan = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= $Ruangan->Id_Ruangan ?></td>
                    <td><?= $Ruangan->Id_Meeting?></td>
                    <td><?= $Ruangan->Id_Inventaris?></td>
                    <td><?= $Ruangan->Nama_Ruangan?></td>
                    <td><?= $Ruangan->Kapasitas ?></td>
                    <td><?= $Ruangan->Lokasi ?></td>
                    <td><?= $Ruangan->Fasilitas ?></td>
                    <td><?= $Ruangan->Status ?></td>
                    <td>
                        <a href="edit.php?id=<?= ->id ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&id=<?= ->Id_Inventaris ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
                    <label for="Id_Ruangan">Id Ruangan</label>
                    <input type="text" class="form-control" id="Id_Ruangan name="Id_Ruangan" placeholder="Masukkan id Ruangan">
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