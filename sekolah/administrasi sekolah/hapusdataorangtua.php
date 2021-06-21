<?php 
include '../function.php';

$id = $_GET["id"];

if( hapusorangtua($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'halaman_administrasi_sekolah.php';
		</script>
		";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'halaman_administrasi_sekolah.php';
		</script>
		";
}

?>