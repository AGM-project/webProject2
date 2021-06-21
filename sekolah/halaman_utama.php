<?php 
include 'function.php';

  session_start();

  if(isset($_GET['halaman'])) $halaman = $_GET['halaman'];
    else $halaman = "halaman_utama";

  if(!$_SESSION['username']){
    header('Location:index.php');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styleutama.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header>Smk Vinama 2</header>

  <ul>
    <li><a href="halaman_utama.php"><i class="fas fa-qrcode"></i>Dashboard</a></li>
    <li><a href="admin/halaman_admin.php"><i class="fas fa-link"></i>User</a></li>
    <li><a href="administrasi sekolah/halaman_administrasi_sekolah.php"><i class="fas fa-link"></i>Data Orangtua</a></li>
    <li><a href="administrasi sekolah/siswa.php"><i class="fas fa-link"></i>Data Siswa</a></li>
    <li><a href="administrasi sekolah/penerimabantuan.php"><i class="fas fa-link"></i>Penerima Bantuan</a></li>
    <li><a href="guru/halaman_guru.php"><i class="fas fa-link"></i>Nilai Rata-Rata</a></li>
    <li><a href="guru/nilaiabsensi.php"><i class="fas fa-link"></i>Nilai Absensi</a></li>
    <li><a href="guru/rankingsiswa.php"><i class="fas fa-link"></i>Hasil Nilai</a></li>
    <li><a href="logout.php"><i class="fas fa-door-open"></i></i>Logout</a></li>
  </ul>
</div>

 <section></section>

  </body>
</html>
