<?php 
include '../function.php';

$id = $_GET["id"];

if( hapusnilairatarata($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'halaman_guru.php';
		</script>
		";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'halaman_guru.php';
		</script>
		";
}

?>