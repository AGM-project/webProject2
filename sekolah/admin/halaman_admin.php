<?php 
include '../function.php';
$pengguna = query("SELECT * FROM pengguna");

// pagination
// konfigurasi
$jumlahdataperhalaman = 2;
$jumlahdata = count(query("SELECT * FROM pengguna"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awaldata = ( $jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;

$pengguna = query("SELECT * FROM pengguna LIMIT $awaldata, $jumlahdataperhalaman");

// tombol cari ditekan
if ( isset($_POST["cari"]) ) {
  $pengguna = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User</title>
    <link rel="stylesheet" href="../stylesekolah.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
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
    <li><a href="halaman_admin.php"><i class="fas fa-link"></i>User</a></li>
    <li><a href="../administrasi sekolah/halaman_administrasi_sekolah.php"><i class="fas fa-link"></i>Data Orangtua</a></li>
    <li><a href="../administrasi sekolah/siswa.php"><i class="fas fa-link"></i>Data Siswa</a></li>
    <li><a href="../administrasi sekolah/penerimabantuan.php"><i class="fas fa-link"></i>Penerima Bantuan</a></li>
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
<!-- <div class="header">
  <div class="headerlogout">
  <a href="../logout.php">LOGOUT</a>
</div>
</div> -->
<!-- <div class="headerlogout"><a href="../logout.php">LOGOUT</a></div> -->

<div class="admin">

<h1 class="judul">Daftar Pengguna</h1>
<br>

<a href="tambah.php" class="tambah">Tambah Pengguna</a>
<br><br>

<form action="" method="post">
  
  <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off" id="keyword">
  <button type="submit" name="cari" id="tombol-cari">Cari</button>

  <img src="../img/loader.gif" class="loader">

</form>
<br>

<div id="container">
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

<br>
  <!-- navigasi -->

<?php if( $halamanaktif > 1 ) : ?>
<a href="?halaman=<?= $halamanaktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for($i = 1; $i <= $jumlahhalaman; $i++ ) : ?>
  <?php if( $i == $halamanaktif ) : ?>
  <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: white; background-color: #3c8dbc; border: 4px solid #3c8dbc; padding: 3px;"><?= $i; ?></a>
  <?php else : ?>
  <a href="?halaman=<?= $i; ?>" style="color: black; background-color: #f1f1f1; border: 1px solid black; padding: 6px;"><?= $i; ?></a>
  <?php endif; ?> 
<?php endfor; ?>

<?php if( $halamanaktif < $jumlahhalaman ) : ?>
<a href="?halaman=<?= $halamanaktif + 1; ?>">&raquo;</a>
<?php endif; ?>

<br>

</div>


  </body>
</html>
