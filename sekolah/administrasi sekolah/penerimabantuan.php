<?php 
include '../function.php';

// pagination
// konfigurasi
$jumlahdataperhalaman = 2;
$jumlahdata = count(query("SELECT * FROM siswa"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awaldata = ( $jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;

$penerimabantuan = query("SELECT siswa.id id_siswa, siswa.nama nama, siswa.kelas kelas, siswa.nisn nisn, siswa.foto foto, siswa.alamat alamat,
  penerimabantuan.id id_bantuan, penerimabantuan.jumlah_bantuan jumlah_bantuan
 FROM siswa LEFT JOIN penerimabantuan ON siswa.id = penerimabantuan.id_siswa  LIMIT $awaldata, $jumlahdataperhalaman");

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Penerima Bantuan</title>
    <link rel="stylesheet" href="../stylesekolah.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <!-- <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label> -->
    <div class="sidebar">
    <header>Smk Vinama 2</header>

  <ul>
    <li><a href="../halaman_utama.php"><i class="fas fa-qrcode"></i>Dashboard</a></li>
    <li><a href="../admin/halaman_admin.php"><i class="fas fa-link"></i>User</a></li>
    <li><a href="halaman_administrasi_sekolah.php"><i class="fas fa-link"></i>Data Orangtua</a></li>
    <li><a href="siswa.php"><i class="fas fa-link"></i>Data Siswa</a></li>
    <li><a href="penerimabantuan.php"><i class="fas fa-link"></i>Penerima Bantuan</a></li>
    <li><a href="../guru/halaman_guru.php"><i class="fas fa-link"></i>Nilai Rata-Rata</a></li>
    <li><a href="../guru/nilaiabsensi.php"><i class="fas fa-link"></i>Nilai Absensi</a></li>
    <li><a href="../guru/rankingsiswa.php"><i class="fas fa-link"></i>Hasil Nilai</a></li>
    <li><a href="../logout.php"><i class="fas fa-door-open"></i></i>Logout</a></li>
  </ul>
</div>

<div class="navbar">
<ul class="navbarul">
  <li class="navbarli"><img src="../img/vinama.jpg" width="50"></li>
</ul>
</div>

<div class="penerimabantuan">

<h1 class="judul">Daftar Penerima Bantuan</h1>
<br>

<a href="tambahpenerimabantuan.php" class="tambah">Tambah Penerima Bantuan</a>
<br><br>

<table border="0" cellpadding="10" cellspacing="28">
  
  <tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Nisn</th>
    <th>Kelas</th>
    <th>Alamat</th>
    <th>Jumlah Bantuan</th>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ( $penerimabantuan as $row ) : ?>
  <tr>
    <td><?= $i; ?></td>
    <td>
      <?php 
        if(!empty($row["jumlah_bantuan"])){
        echo"<a href='ubahpenerimabantuan.php?id=".$row["id_siswa"]."class='ubahhapuswarna'>Ubah</a>";
      }?>
      <!-- <a href="hapusdatapenerimabantuan.php?id=<?= $row["id_siswa"]; ?>" onclick="return confirm('yakin ingin dihapus?');" class="ubahhapuswarna">Hapus</a> -->
    </td>
    <td><img src="../img/<?= $row["foto"]; ?>" width="50"></td>
    <td><?= $row["nama"]; ?></td>
    <td><?= $row["nisn"]; ?></td>
    <td><?= $row["kelas"]; ?></td>
    <td><?= $row["alamat"]; ?></td>
    <td>Rp. &nbsp;<?= number_format($row["jumlah_bantuan"], 0, ".", "."); ?></td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>


</table>



  </body>
</html>
