<?php 
include '../function.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$pgn = query("SELECT * FROM pengguna WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil diubah atau tidak
	if ( ubah($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'halaman_admin.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'halaman_admin.php';
		</script>
		";
	}

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ubah data Pengguna</title>
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

	<div class="ubahcontainer">

	<h1 class="judulubah">Ubah data Pengguna</h1>
	<br>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $pgn["id"];  ?>">
		<input type="hidden" name="fotoLama" value="<?= $pgn["foto"];  ?>">
		<ul>
			<li>
				<label for="nama">Nama</label><br>
				<input type="text" name="nama" id="nama" required value="<?= $pgn["nama"]; ?>">
			</li>
			<li>
				<label for="username">Username</label><br>
				<input type="text" name="username" id="username" value="<?= $pgn["username"]; ?>">
			</li>
			<li>
				<label for="password">Password</label><br>
				<input type="text" name="password" id="password" value="<?= $pgn["password"]; ?>">
			</li>
			<li>
				<label for="no_telp">No Telp</label><br>
				<input type="text" name="no_telp" id="no_telp" value="<?= $pgn["no_telp"]; ?>">
			</li>
			<li>
				<label for="email">Email</label><br>
				<input type="text" name="email" id="email" value="<?= $pgn["email"]; ?>">
			</li>
			<li>
				<label for="alamat">Alamat</label><br>
				<input type="text" name="alamat" id="alamat" value="<?= $pgn["alamat"]; ?>">
			</li>
			<li>
				<label for="level">Level</label><br>
				<select name="level" id="level">
				  <option>admin</option>
				  <option>administrasi sekolah</option>
				  <option>guru</option>
				</select>
			</li>
			<li>
				<label for="foto">Foto</label><br>
				<img src="img/<?= $pgn['foto']; ?>" width="40"> <br>
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