<?php 
usleep(500000);
include '../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM pengguna
		WHERE
		nama LIKE '%$keyword%' OR
		no_telp LIKE '%$keyword%' OR
		email LIKE '%$keyword%' OR
		alamat LIKE '%$keyword%'
		";
$pengguna = query($query);


?>

<table border="0" cellpadding="10" cellspacing="28">
	
  <tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>No Telp</th>
    <th>Email</th>
    <th>Alamat</th>
    <th>Level</th>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ( $pengguna as $row ) : ?>
  <tr>
    <td><?= $i; ?></td>
    <td>
      <a href="ubah.php?id=<?= $row["id"]; ?>" class="ubahhapuswarna">Ubah</a> |
      <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin dihapus?');" class="ubahhapuswarna">Hapus</a>
    </td>
    <td><img src="../img/<?= $row["foto"]; ?>" width="50"></td>
    <td><?= $row["nama"]; ?></td>
    <td><?= $row["no_telp"]; ?></td>
    <td><?= $row["email"]; ?></td>
    <td><?= $row["alamat"]; ?></td>
    <td><?= $row["level"]; ?></td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>


</table>