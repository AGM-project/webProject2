<?php 
include '../function.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$swa = query("SELECT siswa.id id_siswa, siswa.nama nama, siswa.kelas kelas, siswa.nisn nisn, siswa.foto foto, siswa.alamat alamat,
  orangtua.id id_ortu, orangtua.nama nama_ortu
 FROM siswa LEFT JOIN orangtua ON siswa.id_ortu = orangtua.id WHERE siswa.id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil diubah atau tidak
	if ( ubahsiswa($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'siswa.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'siswa.php';
		</script>
		";
	}

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ubah Data Siswa</title>
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

	<h1 class="judulubah">Ubah Data Siswa</h1>
	<br>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $swa["id_siswa"];  ?>">
		<input type="hidden" name="fotoLama" value="<?= $swa["foto"];  ?>">
		<ul>
			<li>
				<label for="nama">Nama Siswa</label><br>
				<input type="text" name="nama" id="nama" required value="<?= $swa["nama"]; ?>">
			</li>

			<li>
				<label for="ortu">Anak dari </label><br>
				
				<select name="id_ortu" id="ortu">
				  <option value="<?= $swa["id_ortu"];?>" selected><?= $swa["nama_ortu"]; ?></option>
				 <?php 
				  $ortu=query("SELECT * FROM orangtua");
				  foreach ( $ortu as $row ) :
				 ?>
				   <option value="<?=$row['id']?>"><?= $row['nama']?></option> 
				 <?php
				  endforeach;
				 ?>
				</select>

				<!-- Yang ini pake datalist
				<input list="id_ortu" name="id_ortu">
				<datalist id="id_ortu">
				  <option disabled selected>Pilih Orang Tua</option>
				 <?php 
				  $ortu=query("SELECT * FROM orangtua");
				  foreach ( $ortu as $row ) :
				 ?>
				   <option value="<?=$row['id']?>"><?= $row['nama']?></option> 
				 <?php
				  endforeach;
				 ?>
				</datalist>
				-->
			</li>

			<li>
				<label for="nisn">Nisn</label><br>
				<input type="text" name="nisn" id="nisn" value="<?= $swa["nisn"]; ?>">
			</li>
			<li>
				<label for="kelas">Kelas</label><br>
				<input type="text" name="kelas" id="kelas" value="<?= $swa["kelas"]; ?>">
			</li>
			<li>
				<label for="alamat">Alamat</label><br>
				<input type="text" name="alamat" id="alamat" value="<?= $swa["alamat"]; ?>">
			</li>
			<li>
				<label for="foto">Foto</label><br>
				<img src="img/<?= $swa['foto']; ?>" width="40"> <br>
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