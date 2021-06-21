<?php 
usleep(500000);
include '../function.php';

$keywordorangtua = $_GET["keywordorangtua"];

$query = "SELECT * FROM orangtua
		WHERE
		nama LIKE '%$keywordorangtua%' OR
    alamat LIKE '%$keywordorangtua%' OR
    gaji LIKE '%$keywordorangtua%' OR
    jumlah_anak LIKE '%$keywordorangtua%'
		";
$orangtua = query($query);


?>

<table border="0" cellpadding="10" cellspacing="28">
  
  <tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Gaji</th>
    <th>Jumlah Anak</th>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ( $orangtua as $row ) : ?>
  <tr>
    <td><?= $i; ?></td>
    <td>
      <a href="ubahorangtua.php?id=<?= $row["id"]; ?>" class="ubahhapuswarna">Ubah</a> |
      <a href="hapusdataorangtua.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin dihapus?');" class="ubahhapuswarna">Hapus</a>
    </td>
    <td><img src="../img/<?= $row["foto"]; ?>" width="50"></td>
    <td><?= $row["nama"]; ?></td>
    <td><?= $row["gaji"]; ?></td>
    <td><?= $row["jumlah_anak"]; ?></td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>


</table>