<?php
include("../koneksi.php");

$query = 'SELECT * FROM Karyawan;';
$result = mysqli_query($koneksi, $query);

include '../layouts/header.php';
?>

<section class="p-4 ml-5 mr-5 w-75">
    <div class="d-flex flex-row justify-content-between">
        <h2>Data Karyawan</h2>
        <a href="tambah.php" class="btn btn-primary p-2">+Tambah</a>
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

<?php include '../layouts/footer.php'; ?>

