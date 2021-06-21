<?php
// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "persada");
// Check connection
if (mysqli_connect_errno()){
 echo "Koneksi database gagal : " . mysqli_connect_error();
}


function query($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$nama = htmlspecialchars($data["nama"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$no_telp = htmlspecialchars($data["no_telp"]);
	$email = htmlspecialchars($data["email"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$level = htmlspecialchars($data["level"]);

	// upload gambar
	$foto = upload();
	if( !$foto ) {
		return false;
	}

	// query insert data
	$query =  "INSERT INTO pengguna
					VALUES
				('', '$nama', '$username', '$password', '$no_telp', '$email', '$alamat', '$level', '$foto')
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function upload() {

	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	// cek apakah tidak ada gambar yang diupluad
	if ( $error === 4 ) {
		echo "<script>
				alert('pilih foto terlebih dahulu');
			</script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar');
			</script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar');
			</script>";
		return false;
	}

	// lolos pengecekan gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

	return $namaFileBaru;

}

function hapus($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM pengguna WHERE id = $id");

	return mysqli_affected_rows($koneksi);
}

function ubah($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$no_telp = htmlspecialchars($data["no_telp"]);
	$email = htmlspecialchars($data["email"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$level = htmlspecialchars($data["level"]);
	$fotoLama = htmlspecialchars($data["fotoLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if ( $_FILES['foto']['error'] === 4 ) {
		$foto = $fotoLama;
	} else {
		$foto = upload();
	}

	// query insert data
	$query = "UPDATE pengguna SET
				nama = '$nama',
				username = '$username',
				password = '$password',
				no_telp = '$no_telp',
				email = '$email',
				alamat = '$alamat',
				level = '$level',
				foto = '$foto'
				WHERE id = $id
			";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function cari($keyword) {
	$query = "SELECT * FROM pengguna
		WHERE
		nama LIKE '%$keyword%' OR
		no_telp LIKE '%$keyword%' OR
		email LIKE '%$keyword%' OR
		alamat LIKE '%$keyword%'
	";
	return query($query);
}




// bagian administrasi sekolah (data orangtua)

function tambahorangtua($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$gaji = htmlspecialchars($data["gaji"]);
	$jumlah_anak = htmlspecialchars($data["jumlah_anak"]);

	// upload gambar
	$foto = upload();
	if( !$foto ) {
		return false;
	}

	// query insert data
	$query =  "INSERT INTO orangtua
					VALUES
				('', '$nama', '$alamat', '$gaji', '$jumlah_anak', '$foto')
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusorangtua($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM orangtua WHERE id = $id");

	return mysqli_affected_rows($koneksi);
}

function ubahorangtua($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$gaji = htmlspecialchars($data["gaji"]);
	$jumlah_anak = htmlspecialchars($data["jumlah_anak"]);
	$fotoLama = htmlspecialchars($data["fotoLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if ( $_FILES['foto']['error'] === 4 ) {
		$foto = $fotoLama;
	} else {
		$foto = upload();
	}

	// query insert data
	$query = "UPDATE orangtua SET
				nama = '$nama',
				alamat = '$alamat',
				gaji = '$gaji',
				jumlah_anak = '$jumlah_anak',
				foto = '$foto'
				WHERE id = $id
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function cariorangtua($keywordorangtua) {
	$query = "SELECT * FROM orangtua
		WHERE
		nama LIKE '%$keywordorangtua%' OR
		alamat LIKE '%$keywordorangtua%' OR
		gaji LIKE '%$keywordorangtua%' OR
		jumlah_anak LIKE '%$keywordorangtua%'
	";
	return query($query);
}


// bagian administrasi sekolah (siswa)


function tambahsiswa($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$nama = htmlspecialchars($data["nama"]);
	$nisn = htmlspecialchars($data["nisn"]);
	$kelas = htmlspecialchars($data["kelas"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$id_ortu = htmlspecialchars($data["id_ortu"]);

	// upload gambar
	$foto = upload();
	if( !$foto ) {
		return false;
	}

	// query insert data
	$query =  "INSERT INTO siswa
					VALUES
				('','$nama', '$alamat', '$nisn', '$kelas', '$foto', '$id_ortu')
			";

	if (!mysqli_query($koneksi, $query)) {
  		echo("Error description: " . mysqli_error($koneksi));
	}
	

	return mysqli_affected_rows($koneksi);
}

function hapussiswa($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM siswa WHERE id = $id");

	return mysqli_affected_rows($koneksi);
}

function ubahsiswa($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$nisn = htmlspecialchars($data["nisn"]);
	$kelas = htmlspecialchars($data["kelas"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$fotoLama = htmlspecialchars($data["fotoLama"]);
	$id_ortu = htmlspecialchars($data["id_ortu"]);

	// cek apakah user pilih gambar baru atau tidak
	if ( $_FILES['foto']['error'] === 4 ) {
		$foto = $fotoLama;
	} else {
		$foto = upload();
	}

	// query insert data
	$query = "UPDATE siswa SET
				nama = '$nama',
				nisn = '$nisn',
				kelas = '$kelas',
				alamat = '$alamat',
				foto = '$foto',
				id_ortu = '$id_ortu'
				WHERE id = $id
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function carisiswa($keywordsiswa) {
	$query = "SELECT siswa.nama nama, siswa.kelas kelas, siswa.nisn nisn, siswa.alamat alamat,
	orangtua.nama nama_ortu
	FROM siswa INNER JOIN orangtua ON siswa.id_ortu = orangtua.id
		WHERE
		nama LIKE '%$keywordsiswa%' OR
		nisn LIKE '%$keywordsiswa%' OR
		kelas LIKE '%$keywordsiswa%' OR
		alamat LIKE '%$keywordsiswa%' OR
		nama_ortu LIKE '%$keywordsiswa%'
	";
	return query($query);
}


// bagian administrasi sekolah (Penerima Bantuan)


function tambahpenerimabantuan($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$id_siswa = htmlspecialchars($data["id_siswa"]);
	$jumlah_bantuan = htmlspecialchars($data["jumlah_bantuan"]);

	// query insert data
	$query =  "INSERT INTO penerimabantuan
					VALUES
				('', '$id_siswa', '$jumlah_bantuan')
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapuspenerimabantuan($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM penerimabantuan WHERE id_siswa = $id");

	return mysqli_affected_rows($koneksi);
}

function ubahpenerimabantuan($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$jumlah_bantuan = htmlspecialchars($data["jumlah_bantuan"]);

	// query insert data
	$query = "UPDATE penerimabantuan SET
				jumlah_bantuan = '$jumlah_bantuan'
				WHERE id_siswa = $id
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

// bagian Guru (Nilai Rata Rata Siswa)


function tambahnilairatarata($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$id_siswa = htmlspecialchars($data["id_siswa"]);
	$nilai_rata_rata = htmlspecialchars($data["nilai_rata_rata"]);

	//IF CLAUSE
	if($nilai_rata_rata >= 70 && $nilai_rata_rata <= 100){
		$statusnrr = "Tinggi";
	} elseif ($nilai_rata_rata < 70 && $nilai_rata_rata >= 10){
		$statusnrr = "Rendah";
	} else {
		$statusnrr = "Error";
	}

	// query insert data
	$query =  "INSERT INTO nilairatarata
					VALUES
				('', '$id_siswa', '$nilai_rata_rata', '$statusnrr')
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusnilairatarata($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM nilairatarata WHERE id_siswa = $id");

	return mysqli_affected_rows($koneksi);
}

function ubahnilairatarata($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$nilai_rata_rata = htmlspecialchars($data["nilai_rata_rata"]);

	if($nilai_rata_rata >= 70 && $nilai_rata_rata <= 100){
		$statusnrr = "Tinggi";
	} elseif ($nilai_rata_rata < 70 && $nilai_rata_rata >= 10){
		$statusnrr = "Rendah";
	} else {
		$statusnrr = "Error";
	}

	// query insert data
	$query = "UPDATE nilairatarata SET nilai_rata_rata = '$nilai_rata_rata', status = '$statusnrr' WHERE id_siswa = $id";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function carinilairatarata($keywordnrr) {
	$query = "SELECT siswa.nama nama, siswa.kelas kelas, siswa.nisn nisn, siswa.alamat alamat,
	nilairatarata.nilai_rata_rata nilai_rata_rata
	FROM siswa INNER JOIN nilairatarata ON siswa.id = nilairatarata.id_siswa
		WHERE
		nama LIKE '%$keywordnrr%' OR
		nisn LIKE '%$keywordnrr%' OR
		kelas LIKE '%$keywordnrr%' OR
		alamat LIKE '%$keywordnrr%' OR
		nilai_rata_rata LIKE '%$keywordnrr%'
	";
	return query($query);
}


// bagian Guru (Hasil Nilai Siswa)


function tambahranking($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$nama = htmlspecialchars($data["nama"]);
	$nisn = htmlspecialchars($data["nisn"]);
	$kelas = htmlspecialchars($data["kelas"]);
	$nilai_rata_rata = htmlspecialchars($data["nilai_rata_rata"]);
	$nilai_absensi = htmlspecialchars($data["nilai_absensi"]);
	$nilai_output = htmlspecialchars($data["nilai_output"]);

	// upload gambar
	$foto = upload();
	if( !$foto ) {
		return false;
	}

	// query insert data
	$query =  "INSERT INTO ranking
					VALUES
				('', '$nama', '$nisn', '$kelas', '$nilai_rata_rata', '$nilai_absensi', '$nilai_output', '$foto')
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusranking($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM ranking WHERE id = $id");

	return mysqli_affected_rows($koneksi);
}

function ubahranking($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$nisn = htmlspecialchars($data["nisn"]);
	$kelas = htmlspecialchars($data["kelas"]);
	$nilai_rata_rata = htmlspecialchars($data["nilai_rata_rata"]);
	$nilai_absensi = htmlspecialchars($data["nilai_absensi"]);
	$nilai_output = htmlspecialchars($data["nilai_output"]);
	$fotoLama = htmlspecialchars($data["fotoLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if ( $_FILES['foto']['error'] === 4 ) {
		$foto = $fotoLama;
	} else {
		$foto = upload();
	}

	// query insert data
	$query = "UPDATE ranking SET
				nama = '$nama',
				nisn = '$nisn',
				kelas = '$kelas',
				nilai_rata_rata = '$nilai_rata_rata',
				nilai_absensi = '$nilai_absensi',
				nilai_output = '$nilai_output',
				foto = '$foto'
				WHERE id = $id
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

// bagian Guru (Nilai Absensi Siswa)


function tambahnilaiabsensi($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$id_siswa = htmlspecialchars($data["id_siswa"]);
	$nilai_absensi = htmlspecialchars($data["nilai_absensi"]);

	if($nilai_absensi >= 70 && $nilai_absensi <= 100){
		$statusnrr = "Tinggi";
	} elseif ($nilai_absensi < 70 && $nilai_absensi >= 10){
		$statusnrr = "Rendah";
	} else {
		$statusnrr = "Error";
	}

	// query insert data
	$query =  "INSERT INTO nilaiabsensi
					VALUES
				('', '$id_siswa', '$nilai_absensi', '$statusnrr')
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusnilaiabsensi($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM nilaiabsensi WHERE id_siswa = $id");

	return mysqli_affected_rows($koneksi);
}

function ubahnilaiabsensi($data) {
	global $koneksi;
	// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$nilai_absensi = htmlspecialchars($data["nilai_absensi"]);

	if($nilai_absensi >= 70 && $nilai_absensi <= 100){
		$statusnrr = "Tinggi";
	} elseif ($nilai_absensi < 70 && $nilai_absensi >= 10){
		$statusnrr = "Rendah";
	} else {
		$statusnrr = "Error";
	}

	// query insert data
	$query = "UPDATE nilaiabsensi SET
				nilai_absensi = '$nilai_absensi',
				status = '$statusnrr'
				WHERE id_siswa = $id
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function carinilaiabsensi($keywordnilaiabsensi) {
	$query = "SELECT * FROM nilaiabsensi
		WHERE
		nama LIKE '%$keywordnilaiabsensi%' OR
		nisn LIKE '%$keywordnilaiabsensi%' OR
		kelas LIKE '%$keywordnilaiabsensi%' OR
		nilai_absensi LIKE '%$keywordnilaiabsensi%'
	";
	return query($query);
}


?>