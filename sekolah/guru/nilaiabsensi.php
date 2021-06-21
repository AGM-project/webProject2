<?php 
include '../function.php';

// pagination
// konfigurasi
$jumlahdataperhalaman = 2;
$jumlahdata = count(query("SELECT * FROM siswa"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awaldata = ( $jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;

$nilaiabsensi = query("SELECT siswa.id id_siswa, siswa.nama nama, siswa.kelas kelas, siswa.nisn nisn, siswa.foto foto, siswa.alamat alamat,
  nilaiabsensi.id id_absensi, nilaiabsensi.nilai_absensi nilai_absensi, nilaiabsensi.status
 FROM siswa LEFT JOIN nilaiabsensi ON siswa.id = nilaiabsensi.id_siswa LIMIT $awaldata, $jumlahdataperhalaman");

// tombol cari ditekan
if ( isset($_POST["carinilaiabsensi"]) ) {
  $nilaiabsensi = carinilaiabsensi($_POST["keywordnilaiabsensi"]);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Nilai Absensi</title>
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

<h1 class="judul">Daftar Nilai Absensi Siswa</h1>
<br>

<a href="tambahnilaiabsensi.php" class="tambah">Tambah Nilai Absensi Siswa</a>
<br><br>

<form action="" method="post">
  
  <input type="text" name="keywordnilaiabsensi" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off" id="keywordnilaiabsensi">
  <button type="submit" name="carinilaiabsensi" id="tombol-cari">Cari</button>

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
    <th>Nisn</th>
    <th>Kelas</th>
    <th>Nilai Absensi</th>
    <th>Status</th>
  </tr>
 <?php $i = 1; ?>
  <?php foreach ( $nilaiabsensi as $row ) : ?>
  <tr>
    <td><?= $i; ?></td>
    <td>
      <?php 
        if(!empty($row["nilai_absensi"])){
        echo"<a href='ubahnilaiabsensi.php?id=".$row["id_siswa"]."class='ubahhapuswarna'>Ubah</a>";
      }?>
      <!-- <a href="hapusnilaiabsensi.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin dihapus?');" class="ubahhapuswarna">Hapus</a> -->
    </td>
    <td><img src="../img/<?= $row["foto"]; ?>" width="50"></td>
    <td><?= $row["nama"]; ?></td>
    <td><?= $row["nisn"]; ?></td>
    <td><?= $row["kelas"]; ?></td>
    <td><?= $row["nilai_absensi"]; ?></td>
    <td><?= $row["status"]; ?></td>
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
