<!-- Breadcrumbs -->
<div class="row">
	<div class="col-12 p-0">
		<div class="breadcrumbs">
			<ul class="breadcrumb-nav ps-3">
				<li><a href="">Dashboard</a></li>
				<li><a href="">PBG</a></li>
				<li class="text-primary">Tambah Data PBG</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<div class="box">
	<h3 class="title is-5">Tambah Data PBG</h3>
	<hr>

	<?php
	if (isset($_POST['tambah'])) {
		$konsultasi = isset($_POST['konsultasi']) ? $_POST['konsultasi'] : 0;
		$registrasi = isset($_POST['registrasi']) ? $_POST['registrasi'] : 0;
		$pemilik = isset($_POST['pemilik']) ? $_POST['pemilik'] : 0;
		$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : 0;
		$telp = isset($_POST['telp']) ? $_POST['telp'] : "-";
		$bangunan = isset($_POST['bangunan']) ? $_POST['bangunan'] : 0;
		$kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : 0;
		$desa = isset($_POST['desa']) ? $_POST['desa'] : 0;
		$fungsi = isset($_POST['fungsi']) ? $_POST['fungsi'] : 0;
		$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : 0;
		$status = isset($_POST['status']) ? $_POST['status'] : 0;

		$notif = "Data Tidak sesuai!";

		if (
			!empty($konsultasi) && !empty($registrasi) && !empty($pemilik) && !empty($alamat) && !empty($bangunan)
			&& !empty($kecamatan) && !empty($desa) && !empty($fungsi) && !empty($tanggal)
		) {

			if ($cmd->query("INSERT INTO pbg VALUES (
				NULL, '$konsultasi', '$registrasi', '$pemilik', '$alamat', '$telp', '$bangunan',
				'$kecamatan', '$desa', '$fungsi',
				'$tanggal', '$status'
			)")) {
				$cheat->log($data['akun_id'], "add", "Menambahkan Data PBG baru [id-" . $cmd->id() . "]");
				$notif = "<p>Data telah ditambahkan!</p>";
			} else $notif = "Data tidak dapat ditambahkan!";
		}

		echo $notif;
	}
	?>
	<div class="container card border-0 shadow rounded-4 p-3">
		<form action="" method="post" enctype="multipart/form-data">

			<div class="row mt-2">
				<div class="col">
					<label>Jenis Konsultasi:</label>
					<select name="konsultasi" class="form-select">
						<?php foreach ($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='konsultasi'") as $konsultasi) : ?>
							<option value="<?= $konsultasi['jenis_id']; ?>"> <?= $konsultasi['jenis_nama']; ?> </option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="row mt-2">
				<div class="col-md-6">
					<label>Nomor Registrasi:</label>
					<input name="registrasi" type="date" class="form-control">
				</div>
				<div class="col-md-6">
					<label>Nama Pemilik:</label>
					<input name="pemilik" type="text" class="form-control">
				</div>
			</div>

			<div class="row mt-2">
				<div class="col">
					<label>No. Telepon:</label>
					<input name="telp" type="number" class="form-control">
				</div>
			</div>

			<div class="row mt-2">
				<div class="col">
					<label>Alamat Pemilik:</label>
					<textarea name="alamat" class="form-control"></textarea>
				</div>
			</div>

			<div class="row mt-2">
				<div class="col">
					<label>Alamat Bangunan:</label>
					<textarea name="bangunan" class="form-control"></textarea>
				</div>
			</div>

			<div class="row mt-2">
				<div class="col-md-6">
					<label>Kecamatan:</label>
					<input name="kecamatan" type="text" class="form-control">
				</div>
				<div class="col-md-6">
					<label>Kelurahan/Desa:</label>
					<input name="desa" type="text" class="form-control">
				</div>
			</div>

			<div class="row mt-2">
				<div class="col">
					<label>Fungsi Bangunan Gedung:</label>
					<select name="fungsi" class="form-select">
						<?php foreach ($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='bangunan'") as $konsultasi) : ?>
							<option value="<?= $konsultasi['jenis_id']; ?>"> <?= $konsultasi['jenis_nama']; ?> </option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="row mt-2">
				<div class="col-md-6">
					<label>Tanggal Permohonan:</label>
					<input name="tanggal" type="date" class="form-control">
				</div>
				<div class="col-md-6">
					<label>Status:</label>
					<select name="status" class="form-select">
						<?php foreach ($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='status'") as $konsultasi) : ?>
							<option value="<?= $konsultasi['jenis_id']; ?>"> <?= $konsultasi['jenis_nama']; ?> </option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="row mt-2">
				<div class="col d-flex justify-content-end">
					<button name="tambah" class="btn btn-primary">
						<span class="icon-text">
							<span class="icon">
								<i class="fa-regular text-white fa-paper-plane"></i>
							</span>
							<span class="text-white">Tambah</span>
						</span>
					</button>
				</div>
			</div>

		</form>
	</div>
</div>

<!-- Active Tab -->
<?php
if ($_GET['p'] == 'pbg-add') {
?>
	<script>
		document.querySelectorAll('.tab').forEach(tab => {
			tab.classList.remove('t-active', 'd-side-active');
		});

		// Tentukan tab dan dropdown yang ingin diaktifkan
		const activeTab = document.querySelectorAll('.tab')[2]; // Misal, tab ke-3
		const activeDropdown = document.querySelectorAll('.tab-dropdown')[1]; // Misal, dropdown ke-2

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