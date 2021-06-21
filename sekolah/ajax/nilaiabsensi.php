<?php 
usleep(500000);
include '../function.php';

$keywordnilaiabsensi = $_GET["keywordnilaiabsensi"];

$query = "SELECT * FROM nilaiabsensi
		WHERE
		nama LIKE '%$keywordnilaiabsensi%' OR
    nisn LIKE '%$keywordnilaiabsensi%' OR
    kelas LIKE '%$keywordnilaiabsensi%' OR
    nilai_absensi LIKE '%$keywordnilaiabsensi%'
		";
$nilaiabsensi = query($query);


?>

<table border="0" cellpadding="10" cellspacing="28">
  
  <tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Nisn</th>
    <th>Kelas</th>
    <th>Nilai Absensi</th>
  </tr>
 <?php $i = 1; ?>
  <?php foreach ( $nilaiabsensi as $row ) : ?>
  <tr>
    <td><?= $i; ?></td>
    <td>
      <a href="ubahnilaiabsensi.php?id=<?= $row["id"]; ?>" class="ubahhapuswarna">Ubah</a> |
      <a href="hapusnilaiabsensi.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin dihapus?');" class="ubahhapuswarna">Hapus</a>
    </td>
    <td><img src="../img/<?= $row["foto"]; ?>" width="50"></td>
    <td><?= $row["nama"]; ?></td>
    <td><?= $row["nisn"]; ?></td>
    <td><?= $row["kelas"]; ?></td>
    <td><?= $row["nilai_absensi"]; ?></td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>


</table>