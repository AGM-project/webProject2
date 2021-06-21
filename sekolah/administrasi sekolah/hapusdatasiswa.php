<?php 
include '../function.php';

$id = $_GET["id"];

if( hapussiswa($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'siswa.php';
		</script>
		";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'siswa.php';
		</script>
		";
}

?>