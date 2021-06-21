<?php 
include '../function.php';

$id = $_GET["id"];

if( hapusranking($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'rankingsiswa.php';
		</script>
		";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'rankingsiswa.php';
		</script>
		";
}

?>