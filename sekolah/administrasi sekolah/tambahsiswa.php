<?php 
include '../function.php';
// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil di tambahkan atau tidak
	if (tambahsiswa($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'siswa.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan!');
		</script>
		";
	}

}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tambah Data Siswa</title>
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

	<h1>Tambah Data Siswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama Siswa</label><br>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="id_ortu">Anak dari </label><br>
				
				<select name="id_ortu" id="id_ortu">
				  <option disabled selected> Pilih Ortu </option>
				 <?php 
				  $ortu=query("SELECT * FROM orangtua");
				  foreach ( $ortu as $row ) :
				 ?>
				   <option value="<?=$row['id'];?>"><?= $row["nama"];?></option> 
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
				<input type="text" name="nisn" id="nisn">
			</li>
			<li>
				<label for="kelas">Kelas</label><br>
				<input type="text" name="kelas" id="kelas">
			</li>
			<li>
				<label for="alamat">Alamat</label><br>
				<input type="text" name="alamat" id="alamat">
			</li>
			<li>
				<label for="foto">Foto</label><br>
				<input type="file" name="foto" id="foto">
			</li>
			<li>
				<button type="submit" name="submit" class="ubatdatasubmit">Tambah Data!</button>
			</li>
		</ul>

	</form>

	</div>
	
</body>
</html>