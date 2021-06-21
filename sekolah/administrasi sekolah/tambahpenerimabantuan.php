<?php 
include '../function.php';
// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil di tambahkan atau tidak
	if ( tambahpenerimabantuan($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'penerimabantuan.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'penerimabantuan.php';
		</script>
		";
	}

}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tambah Data Penerima Bantuan</title>
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
    <header>Smk Vinama</header>

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

	<div class="tambahdatacontainer">

	<h1>Tambah Data Penerima Bantuan</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="id_siswa">Nama [kelas] (nisn)</label><br>
				<select name="id_siswa" id="id_siswa">
				   <option disabled selected> --Pilih Siswa-- </option>
				 <?php 
				  $siswa=query("SELECT * FROM siswa");
				  foreach ( $siswa as $row ) :
				 ?>
				   <option value="<?=$row['id']?>"><?= $row['nama']?>
				   &nbsp;[<?= $row['kelas']?>]
				   &nbsp;(<?= $row['nisn']?>)</option> 
				 <?php
				  endforeach;
				 ?>
				</select>
			</li>
			<li>
				<label for="jumlah_bantuan">Jumlah Bantuan</label><br>
				<select name="jumlah_bantuan" id="jumlah_bantuan">
				  <option value="1000000">RP. 1.000.000</option>
				  <option value="2000000">RP. 2.000.000</option>
				  <option value="3000000">RP. 3.000.000</option>
				</select>
			</li>
			<li>
				<button type="submit" name="submit" class="ubatdatasubmit">Tambah Data!</button>
			</li>
		</ul>

	</form>

	</div>
	
</body>
</html>