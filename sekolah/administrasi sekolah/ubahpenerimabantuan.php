<?php 
include '../function.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$pb = query("SELECT siswa.id id_siswa, siswa.nama nama, siswa.kelas kelas, siswa.nisn nisn, siswa.foto foto, siswa.alamat alamat,
  penerimabantuan.id id_bantuan, penerimabantuan.jumlah_bantuan jumlah_bantuan
 FROM siswa LEFT JOIN penerimabantuan ON siswa.id = penerimabantuan.id_siswa WHERE siswa.id = '$id'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil diubah atau tidak
	if ( ubahpenerimabantuan($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'penerimabantuan.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
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
    <title>Ubah Data Penerima Bantuan</title>
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

	<h1 class="judulubah">Ubah Data Penerima Bantuan</h1>
	<br>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $pb["id_siswa"];  ?>">
		<ul>
			<li>
				<label for="nama">Nama</label><br>
				<input type="text" name="nama" id="nama" required value="<?= $pb["nama"]; ?>" readonly>
			</li>
			<li>
				<label for="jumlah_bantuan">Jumlah Bantuan</label><br>
				<select name="jumlah_bantuan" id="jumlah_bantuan">
				<option value="<?= $pb["jumlah_bantuan"]; ?>" selected>Rp.&nbsp;<?= number_format($pb["jumlah_bantuan"], 0, ".", "."); ?> (selected)</option>
				  <option value="1000000">Rp.&nbsp;1.000.000</option>
				  <option value="2000000">Rp.&nbsp;2.000.000</option>
				  <option value="3000000">Rp.&nbsp;3.000.000</option>
				</select>
			</li>
			<li>
				<button type="submit" name="submit" class="ubatdatasubmit">Ubah Data!</button>
			</li>
		</ul>

	</form>

	</div>
	
</body>
</html>