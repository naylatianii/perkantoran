<?php
include("../koneksi.php");

$query = 'SELECT * FROM Divisi;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
include('../back_to_dashboard.php');
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Divisi</h2>
          <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah</a>
    </div>
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID Divisi</th>
                <th scope="col">ID Karyawan</th>
                <th scope="col">ID Inventaris</th>
                <th scope="col">Nama Divisi</th>
                <th scope="col">Kepala Divisi</th>
                <th scope="col">Bidang</th>
                <th scope="col">Jumlah Karyawan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($Divisi = mysqli_fetch_object($result)) { ?>
                <tr>
                    <td><?= $Divisi->Id_Divisi ?></td>
                    <td><?= $Divisi->Id_Karyawan?></td>
                    <td><?= $Divisi->Id_Inventaris?></td>
                    <td><?= $Divisi->Nama_Divisi?></td>
                    <td><?= $Divisi->Kepala_Divisi?></td>
                    <td><?= $Divisi->Bidang?></td>
                    <td><?= $Divisi->Jumlah_Karyawan?></td>                  
                    <td style="white-space: nowrap;">
                      <div style="display: flex; gap: 5px;">
                        <a href="edit.php?Id_Divisi=<?= $Divisi->Id_Divisi ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&Id_Divisi=<?= $Divisi->Id_Divisi ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                      </div>
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
      <form action="function.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Divisi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </button>
      </div>
  <input type="hidden" name="action" value="insert">

  <div class="modal-body">
    <div class="mb-3">
      <label for="Id_Divisi" class="form-label">ID Divisi</label>
      <input type="number" class="form-control" name="Id_Divisi" id="Id_Divisi" placeholder="Masukkan ID Divisi">
    </div>

    <div class="mb-3">
      <label for="Id_Karyawan" class="form-label">ID Karyawan</label>
      <input type="number" class="form-control" name="Id_Karyawan" id="Id_Karyawan">
    </div>
    
    <div class="mb-3">
      <label for="Id_Inventaris" class="form-label">ID Inventaris</label>
      <input type="number" class="form-control" name="Id_Inventaris" id="Id_Inventaris">
    </div>

    <div class="mb-3">
      <label for="Nama_Divisi" class="form-label">Nama Divisi</label>
      <input type="text" class="form-control" name="Nama_Divisi" id="Nama_Divisi" placeholder="Masukkan Nama Divisi">
    </div>

    <div class="mb-3">
      <label for="Kepala_Divisi" class="form-label">Kepala Divisi</label>
      <input type="text" class="form-control" name="Kepala_Divisi" id="Kepala_Divisi" placeholder="Jenis Kelamin">
    </div>

    <div class="mb-3">
      <label for="Bidang" class="form-label">Bidang</label>
      <input type="text" class="form-control" name="Bidang" id="Bidang" >
    </div>

    <div class="mb-3">
      <label for="Jumlah_Karyawan" class="form-label">Jumlah_Karyawan</label>
      <input type="number" class="form-control" name="Jumlah_Karyawan" id="Jumlah_Karyawan">
    </div>
  </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button> <!-- Perbaikan: submit -->
        </div>
      </div>
    </form>
  </div>
</div>



<?php include('../layouts/footer.php'); ?>

