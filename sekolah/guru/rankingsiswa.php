<?php 
include '../function.php';
// pagination
// konfigurasi
$jumlahdataperhalaman = 2;
$jumlahdata = count(query("SELECT * FROM siswa"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awaldata = ( $jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;

$ranking = query("SELECT siswa.id id_siswa, siswa.nama nama, siswa.kelas kelas, siswa.nisn nisn, siswa.foto foto, siswa.alamat alamat,
  nilaiabsensi.status status_absensi, nilairatarata.status status_rata_rata
 FROM siswa LEFT JOIN nilairatarata ON siswa.id = nilairatarata.id_siswa LEFT JOIN nilaiabsensi ON siswa.id = nilaiabsensi.id_siswa LIMIT $awaldata, $jumlahdataperhalaman");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hasil Nilai</title>
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
    <li><a href="../administrasi sekolah/halaman_administrasi_sekolah.php"><i class="fas fa-link"></i>Data Orangtua</a></li>
    <li><a href="../administrasi sekolah/siswa.php"><i class="fas fa-link"></i>Data Siswa</a></li>
    <li><a href="../administrasi sekolah/penerimabantuan.php"><i class="fas fa-link"></i>Penerima Bantuan</a></li>
    <li><a href="halaman_guru.php"><i class="fas fa-link"></i>Nilai Rata-Rata</a></li>
    <li><a href="nilaiabsensi.php"><i class="fas fa-link"></i>Nilai Absensi</a></li>
    <li><a href="rankingsiswa.php"><i class="fas fa-link"></i>Hasil Nilai</a></li>
    <li><a href="../logout.php"><i class="fas fa-door-open"></i></i>Logout</a></li>
  </ul>
</div>

<div class="navbar">
<ul class="navbarul">
  <li class="navbarli"><img src="../img/vinama.jpg" width="50"></li>
</ul>
</div>

<div class="guru">

<h1 class="judul">Daftar Hasil Nilai Siswa</h1>
<br>

<!-- <a href="tambahranking.php" class="tambah">Tambah Hasil Nilai Siswa</a>
<br><br> -->

<table border="0" cellpadding="10" cellspacing="28">
  
  <tr>
    <th>Peringkat</th>
<!--     <th>Aksi</th> -->
    <th>Gambar</th>
    <th>Nama</th>
    <th>Nisn</th>
    <th>Kelas</th>
    <th>Nilai Rata-Rata</th>
    <th>Nilai Absensi</th>
    <th>Nilai Output</th>
  </tr>
 <?php $i = 1; ?>
  <?php foreach ( $ranking as $row ) : ?>
  <tr>
    <td><?= $i; ?></td>
<!--     <td>
      <a href="ubahranking.php?id=<?= $row["id"]; ?>" class="ubahhapuswarna">Ubah</a> |
      <a href="hapusranking.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin dihapus?');" class="ubahhapuswarna">Hapus</a>
    </td> -->
    <td><img src="../img/<?= $row["foto"]; ?>" width="50"></td>
    <td><?= $row["nama"]; ?></td>
    <td><?= $row["nisn"]; ?></td>
    <td><?= $row["kelas"]; ?></td>
    <td><?= $row["status_rata_rata"]; ?></td>
    <td><?= $row["status_absensi"]; ?></td>
    <td><?php

    if($row['status_rata_rata'] === "Tinggi" && $row['status_absensi'] === "Tinggi"){
      echo "Berprestasi";
    } else {
      echo "Tidak Berprestasi";
    }
    ?>

  </td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>


</table>



  </body>
</html>
