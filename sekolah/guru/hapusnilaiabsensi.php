<?php 
include '../function.php';

$id = $_GET["id"];

if( hapusnilaiabsensi($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'nilaiabsensi.php';
		</script>
		";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'nilaiabsensi.php';
		</script>
		";
}

?>