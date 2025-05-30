<?php
include("../koneksi.php");

$query = 'SELECT * FROM Karyawan;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Karyawan</h2>
        <a type="button" class="btn btn-primary" onclick="tambahData()" data-toggle="modal" data-target="#exampleModal">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Karyawan</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tempat Tanggal Lahir</th>
                <th scope="col">Jabatan</th>
                <th scope="col">No Hp</th>
                <th scope="col">Email</th>
                <th scope="col">Tahun Masuk</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($Karyawan = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= $Karyawan->Id_Karyawan ?></td>
                    <td><?= $Karyawan->Nama_Lengkap?></td>
                    <td><?= $Karyawan->Jenis_Kelamin ?></td>
                    <td><?= $Karyawan->TTL ?></td>
                    <td><?= $Karyawan->Jabatan ?></td>
                    <td><?= $Karyawan->No_Hp ?></td>
                    <td><?= $Karyawan->Email ?></td>
                    <td><?= $Karyawan->Tahun_Masuk ?></td>
                    <td><?= $Karyawan->Alamat ?></td>                   
                    <td>
                        <a href="edit.php?id=<?= $Karyawan->id ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&id=<?= $Karyawan->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
                    <label for="Id_Karyawan">Id Karyawan</label>
                    <input type="text" class="form-control" id="Id_Karyawan" name="Id_Karyawan" placeholder="Masukkan id Karyawan">
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

