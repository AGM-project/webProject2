<?php 
usleep(500000);
include '../function.php';

$keywordsiswa = $_GET["keywordsiswa"];

$query = "SELECT * FROM siswa
		WHERE
		nama LIKE '%$keywordsiswa%' OR
    nisn LIKE '%$keywordsiswa%' OR
    kelas LIKE '%$keywordsiswa%' OR
    alamat LIKE '%$keywordsiswa%'
		";
$siswa = query($query);


?>

<table border="0" cellpadding="10" cellspacing="28">
  
  <tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Nisn</th>
    <th>Kelas</th>
    <th>Alamat</th>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ( $siswa as $row ) : ?>
  <tr>
    <td><?= $i; ?></td>
    <td>
      <a href="ubahsiswa.php?id=<?= $row["id"]; ?>" class="ubahhapuswarna">Ubah</a> |
      <a href="hapusdatasiswa.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin dihapus?');" class="ubahhapuswarna">Hapus</a>
    </td>
    <td><img src="../img/<?= $row["foto"]; ?>" width="50"></td>
    <td><?= $row["nama"]; ?></td>
    <td><?= $row["nisn"]; ?></td>
    <td><?= $row["kelas"]; ?></td>
    <td><?= $row["alamat"]; ?></td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>


</table>