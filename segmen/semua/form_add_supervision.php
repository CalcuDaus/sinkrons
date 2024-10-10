<!-- Breadcrumbs -->
<div class="row">
	<div class="col-12 p-0">
		<div class="breadcrumbs ">
			<ul class="breadcrumb-nav ps-3">
				<li><a href="">Dashboard</a></li>
				<li><a href="">Pengawasan</a></li>
				<li class="text-primary">Tambah Data Pegawasan</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<div class="box">
	<h3 class="title is-5">Tambah Data Pengawasan</h3>
	<hr>
	<?php
	if (isset($_POST['tambah'])) {
		$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : 0;
		$nosurat = isset($_POST['nosurat']) ? $_POST['nosurat'] : 1;
		$jenis = isset($_POST['jenis']) ? $_POST['jenis'] : 1;
		$nama = isset($_POST['nama']) ? $_POST['nama'] : 0;
		$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : 0;
		$penilik = isset($_POST['penilik']) ? $_POST['penilik'] : "-";
		$perihal = isset($_POST['perihal']) ? $_POST['perihal'] : "-";
		$kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : 0;
		$desa = isset($_POST['desa']) ? $_POST['desa'] : 0;
		$teguran = isset($_POST['teguran']) ? $_POST['teguran'] : "Teguran 1";
		$keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : "-";
		$tindakan = isset($_POST['tindakan']) ? $_POST['tindakan'] : "-";
		$hasil = isset($_POST['hasil']) ? $_POST['hasil'] : "-";

		$notif = "Data Tidak sesuai!";

		if (
			!empty($tanggal) && !empty($nosurat) && !empty($nama) && !empty($alamat)
			&& !empty($kecamatan) && !empty($desa)
		) {

			if ($cmd->query("INSERT INTO pengawasan VALUES (
				NULL, '$tanggal', '$nosurat', '$jenis', '$nama', '$alamat', '$penilik',
				'$perihal', '$kecamatan', '$desa',
				'$teguran', '$keterangan', '$tindakan',
				'$hasil'
			)")) {
				$notif = "<p>Data telah ditambahkan!</p>";
			} else $notif = "Data tidak dapat ditambahkan!";
		}

		echo $notif;
	}
	?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<label class="form-label">Tanggal:</label>
					<input name="tanggal" type="date" class="form-control">
					<label class="form-label">Nomor Surat:</label>
					<input name="nosurat" type="text" class="form-control">
					<label class="form-label">Jenis Bangunan:</label>
					<select name="jenis" class="form-select">
						<?php foreach ($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='bangunan'") as $bangunan) : ?>
							<option value="<?= $bangunan['jenis_id']; ?>"> <?= $bangunan['jenis_nama']; ?> </option>
						<?php endforeach; ?>
					</select>
					<label class="form-label">Nama Pemilik:</label>
					<input name="nama" type="text" class="form-control">
					<label class="form-label">Alamat Bangunan:</label>
					<textarea name="alamat" class="form-control"></textarea>
					<label class="form-label">Penilik:</label>
					<textarea name="penilik" class="form-control"></textarea>
				</div>
				<div class="col-6">
					<label class="form-label" for="perihal">Perihal:</label>
					<textarea name="perihal" class="form-control" id="perihal"></textarea>
					<label class="form-label" for="kecamatan">Kecamatan:</label>
					<input name="kecamatan" type="text" class="form-control">
					<label class="form-label" for="desa">Kelurahan/Desa:</label>
					<input name="desa" type="text" class="form-control" id="desa">
					<label class="form-label">Teguran : </label>
					<select name="teguran" class="form-select">
						<?php for ($u = 1; $u <= 3; $u++) : ?>
							<option value="Teguran <?= $u; ?>"> Teguran <?= $u; ?> </option>
						<?php endfor; ?>
					</select>
					<label class="form-label" for="keterangan">Keterangan:</label>
					<textarea name="keterangan" class="form-control" id="keterangan"></textarea>
					<label class="form-label" for="tindakan">Tindak Lanjut:</label>
					<textarea name="tindakan" class="form-control" id="tindakan"></textarea>
					<label class="form-label" for="hasil">Hasil Peninjauan:</label>
					<textarea name="hasil" class="form-control" id="hasil"></textarea>
					<button name="tambah" class="btn btn-primary mt-2">
						<span class="icon-text">
							<span class="icon">
								<i class="fa-regular text-white fa-paper-plane"></i>
							</span>
							<span class="text-white">Tambah</span>
						</span>
					</button>
				</div>
			</div>


		</div>
</div>
</div>



</form>
</div>

<!-- Active Tab -->
<?php
if ($_GET['p'] == 'supervision-add') {
?>
	<script>
		document.querySelectorAll('.tab').forEach(tab => {
			tab.classList.remove('t-active', 'd-side-active');
		});
		// Tentukan tab dan dropdown yang ingin diaktifkan
		const activeTab = document.querySelectorAll('.tab')[3]; // Misal, tab ke-3
		const activeDropdown = document.querySelectorAll('.tab-dropdown')[2]; // Misal, dropdown ke-2
		// Tambahkan class aktif pada tab yang diinginkan
		activeTab.classList.add('d-side-active', 't-active');
		// Buat animasi transisi pada dropdown
		activeDropdown.style.height = activeDropdown.scrollHeight + "px";
		activeDropdown.addEventListener('transitionend', function handleTransitionEnd() {
			activeDropdown.style.height = 'auto';
			activeDropdown.removeEventListener('transitionend', handleTransitionEnd);
		});
	</script>
<?php
}
?>