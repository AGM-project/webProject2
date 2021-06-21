$(document).ready(function() {
	// hilangkan tombol-cari
	$('#tombol-cari').hide();

	// event ketika keyword ditulis
	$('#keyword').on('keyup', function() {
		// munculkan icon loading
		$('.loader').show();

		// ajak menggunakan load
		// $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

		// $.get()
		$.get('../ajax/pengguna.php?keyword=' + $('#keyword').val(), function(data) {

			$('#container').html(data);
			$('.loader').hide();

		});

	});

});

$(document).ready(function() {
	// hilangkan tombol-cari
	$('#tombol-cari').hide();

	// event ketika keyword ditulis
	$('#keywordorangtua').on('keyup', function() {
		// munculkan icon loading
		$('.loader').show();

		// ajak menggunakan load
		// $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

		// $.get()
		$.get('../ajax/halaman_administrasi_sekolah.php?keywordorangtua=' + $('#keywordorangtua').val(), function(data) {

			$('#container').html(data);
			$('.loader').hide();

		});

	});

});

$(document).ready(function() {
	// hilangkan tombol-cari
	$('#tombol-cari').hide();

	// event ketika keyword ditulis
	$('#keywordsiswa').on('keyup', function() {
		// munculkan icon loading
		$('.loader').show();

		// ajak menggunakan load
		// $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

		// $.get()
		$.get('../ajax/siswa.php?keywordsiswa=' + $('#keywordsiswa').val(), function(data) {

			$('#container').html(data);
			$('.loader').hide();

		});

	});

});

$(document).ready(function() {
	// hilangkan tombol-cari
	$('#tombol-cari').hide();

	// event ketika keyword ditulis
	$('#keywordnrr').on('keyup', function() {
		// munculkan icon loading
		$('.loader').show();

		// ajak menggunakan load
		// $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

		// $.get()
		$.get('../ajax/nilairatarata.php?keywordnrr=' + $('#keywordnrr').val(), function(data) {

			$('#container').html(data);
			$('.loader').hide();

		});

	});

});

$(document).ready(function() {
	// hilangkan tombol-cari
	$('#tombol-cari').hide();

	// event ketika keyword ditulis
	$('#keywordnilaiabsensi').on('keyup', function() {
		// munculkan icon loading
		$('.loader').show();

		// ajak menggunakan load
		// $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

		// $.get()
		$.get('../ajax/nilaiabsensi.php?keywordnilaiabsensi=' + $('#keywordnilaiabsensi').val(), function(data) {

			$('#container').html(data);
			$('.loader').hide();

		});

	});

});