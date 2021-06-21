<?php 
include '../function.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$rank = query("SELECT * FROM ranking WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil diubah atau tidak
	if ( ubahranking($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'rankingsiswa.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'rankingsiswa.php';
		</script>
		";
	}

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ubah Hasil Nilai Siswa</title>
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

	<div class="ubahcontainer">

	<h1 class="judulubah">Ubah Hasil Nilai Siswa</h1>
	<br>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $rank["id"];  ?>">
		<input type="hidden" name="fotoLama" value="<?= $rank["foto"];  ?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $rank["nama"]; ?>">>
			</li>
			<li>
				<label for="nisn">Nisn : </label>
				<input type="text" name="nisn" id="nisn" value="<?= $rank["nisn"]; ?>">>
			</li>
			<li>
				<label for="kelas">Kelas : </label>
				<input type="text" name="kelas" id="kelas" value="<?= $rank["kelas"]; ?>">>
			</li>
			<li>
				<label for="nilai_rata_rata">Nilai Rata-Rata</label><br>
				<select name="nilai_rata_rata" id="nilai_rata_rata">
				  <option>Tinggi</option>
				  <option>Rendah</option>
				</select>
			</li>
			<li>
				<label for="nilai_absensi">Nilai Absensi</label><br>
				<select name="nilai_absensi" id="nilai_absensi">
				  <option>Tinggi</option>
				  <option>Rendah</option>
				</select>
			</li>
			<li>
				<label for="nilai_output">Nilai Output</label><br>
				<select name="nilai_output" id="nilai_output">
				  <option>Berprestasi</option>
				  <option>Tidak Berprestasi</option>
				</select>
			</li>
			<li>
				<label for="foto">Foto</label><br>
				<img src="img/<?= $rank['foto']; ?>" width="40"> <br>
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