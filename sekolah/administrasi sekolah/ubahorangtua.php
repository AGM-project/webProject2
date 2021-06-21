<?php 
include '../function.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$orgt = query("SELECT * FROM orangtua WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil diubah atau tidak
	if ( ubahorangtua($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'halaman_administrasi_sekolah.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'halaman_administrasi_sekolah.php';
		</script>
		";
	}

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ubah Data Orangtua</title>
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

	<div class="ubahcontainer">

	<h1 class="judulubah">Ubah Data Orangtua</h1>
	<br>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $orgt["id"];  ?>">
		<input type="hidden" name="fotoLama" value="<?= $orgt["foto"];  ?>">
		<ul>
			<li>
				<label for="nama">Nama</label><br>
				<input type="text" name="nama" id="nama" required value="<?= $orgt["nama"]; ?>">
			</li>
			<li>
				<label for="alamat">Alamat</label><br>
				<input type="text" name="alamat" id="alamat" value="<?= $orgt["alamat"]; ?>">
			</li>
			<li>
				<label for="gaji">Gaji</label><br>
				<input type="text" name="gaji" id="gaji" value="<?= $orgt["gaji"]; ?>">
			</li>
			<li>
				<label for="jumlah_anak">Jumlah Anak</label><br>
				<input type="text" name="jumlah_anak" id="jumlah_anak" value="<?= $orgt["jumlah_anak"]; ?>">
			</li>
			<li>
				<label for="foto">Foto</label><br>
				<img src="img/<?= $orgt['foto']; ?>" width="40"> <br>
				<input type="file" name="foto" id="foto">
			</li>
			<li>
				<button type="submit" name="submit" class="ubatdatasubmit">Ubah Data!</button>
			</li>
		</ul>

	</form>

	</div>
	
</body>
</html>