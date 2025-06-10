<?php
include("../koneksi.php");

$query = 'SELECT * FROM Karyawan;';
$result = mysqli_query($koneksi, $query);

include('../layouts/header.php');
include('../back_to_dashboard.php'); 

?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Karyawan</h2>
          <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah</a>
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
                <th>Aksi</th> 
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
                    <td style="white-space: nowrap;">
                      <div style="display: flex; gap: 5px;">
                        <a href="edit.php?Id_Karyawan=<?= $Karyawan->Id_Karyawan ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="function.php?action=delete&Id_Karyawan=<?= $Karyawan->Id_Karyawan ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </button>
      </div>
      <form action="function.php" method="POST">
  <input type="hidden" name="action" value="insert">

  <div class="modal-body">
    <div class="mb-3">
      <label for="Id_Karyawan" class="form-label">ID Karyawan</label>
      <input type="number" class="form-control" name="Id_Karyawan" id="Id_Karyawan" placeholder="Masukkan ID Karyawan">
    </div>

    <div class="mb-3">
      <label for="Nama_Lengkap" class="form-label">Nama Karyawan</label>
      <input type="text" class="form-control" name="Nama_Lengkap" id="Nama_Lengkap" placeholder="Masukkan Nama Karyawan">
    </div>

    <div class="mb-3">
      <label for="Jenis_Kelamin" class="form-label">Jenis Kelamin</label>
      <input type="text" class="form-control" name="Jenis_Kelamin" id="Jenis_Kelamin" placeholder="Jenis Kelamin">
    </div>

    <div class="mb-3">
      <label for="TTL" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control" name="TTL" id="TTL">
    </div>

    <div class="mb-3">
      <label for="Jabatan" class="form-label">Jabatan</label>
      <input type="text" class="form-control" name="Jabatan" id="Jabatan" placeholder="Masukkan Jabatan Anda">
    </div>

    <div class="mb-3">
      <label for="No_Hp" class="form-label">Nomor Hp</label>
      <input type="text" class="form-control" name="No_Hp" id="No_Hp">
    </div>

    <div class="mb-3">
      <label for="Email" class="form-label">Email</label>
      <input type="text" class="form-control" name="Email" id="Email" placeholder="Masukkan Email Anda">
    </div>

    <div class="mb-3">
      <label for="Tahun_Masuk" class="form-label">Tahun Bergabung</label>
      <input type="text" class="form-control" name="Tahun_Masuk" id="Tahun_Masuk" placeholder="Tahun Anda Bergabung">
    </div>

    <div class="mb-3">
      <label for="Alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Masukkan Alamat Anda">
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

