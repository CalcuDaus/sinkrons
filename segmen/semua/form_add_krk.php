<!-- Breadcrumbs -->
<div class="row">
	<div class="col-12 p-0">
		<div class="breadcrumbs">
			<ul class="breadcrumb-nav ps-3">
				<li><a href="">Dashboard</a></li>
				<li><a href="">KRK</a></li>
				<li class="text-primary">Tambah Data KRK</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<div class="box">
	<h3 class="title is-5">Tambah Data KRK</h3>
	<hr>

	<?php
	if (isset($_POST['tambah'])) {
		$pemohon = isset($_POST['pemohon']) ? $_POST['pemohon'] : 0;
		$masuk = isset($_POST['masuk']) ? $_POST['masuk'] : "";
		$terima = isset($_POST['terima']) ? $_POST['terima'] : "";
		$permohonan = isset($_POST['permohonan']) ? $_POST['permohonan'] : 0;
		$perihal = isset($_POST['perihal']) ? $_POST['perihal'] : "";
		$jalan = isset($_POST['jalan']) ? $_POST['jalan'] : "-";
		$desa = isset($_POST['desa']) ? $_POST['desa'] : "-";
		$kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : "-";
		$disposisi = isset($_POST['disposisi']) ? $_POST['disposisi'] : "-";
		$screening = isset($_POST['screening']) ? $_POST['screening'] : "n";
		$surveyor = isset($_POST['surveyor']) ? $_POST['surveyor'] : "n";
		$production = isset($_POST['production']) ? $_POST['production'] : "n";
		$keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : "-";
		$terbit = isset($_POST['terbit']) ? $_POST['terbit'] : 0;
		$nomor = isset($_POST['nomor']) ? $_POST['nomor'] : "-";
		$verifikasi = isset($_POST['verifikasi']) ? $_POST['verifikasi'] : "n";
		$status = isset($_POST['status']) ? $_POST['status'] : 1;

		$notif = "Data Tidak sesuai!";

		if (
			!empty($pemohon) && !empty($masuk) && !empty($terima) && !empty($permohonan)
			&& !empty($perihal) && !empty($jalan)
		) {

			if ($cmd->query("INSERT INTO krk VALUES (
				NULL, '$pemohon', '$masuk', '$terima', '$permohonan', '$perihal', '$jalan',
				'$desa', '$kecamatan', '$disposisi',
				'$screening', '$surveyor', '$production', '$terbit',
				'$keterangan', '$nomor', '$verifikasi', '$status'
			)")) {
				$notif = "<p>Data telah ditambahkan!</p>";
			} else $notif = "Data tidak dapat ditambahkan!";
		}

		echo $notif;
	}
	?>
	<div class="container card border-0 shadow rounded-4 p-3">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="row mt-3">
				<div class="col">
					<label>Nama Pemohon:</label>
					<input name="pemohon" type="text" class="form-control">
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-6">
					<label>Tanggal Surat:</label>
					<input name="masuk" type="date" class="form-control">
				</div>
				<div class="col-md-6">
					<label>Tanggal Surat Diterima:</label>
					<input name="terima" type="date" class="form-control">
				</div>
			</div>
			<div class="row mt-3">
				<div class="col">
					<label>Tanggal Surat Diterima:</label>
					<input name="terima" type="date" class="form-control">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col">
					<label>Jenis Bangunan:</label>
					<select name="permohonan" class="form-select">
						<?php foreach ($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='bangunan'") as $bangunan) : ?>
							<option value="<?= $bangunan['jenis_id']; ?>"> <?= $bangunan['jenis_nama']; ?> </option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-6">
					<label>Perihal:</label>
					<textarea name="perihal" class="form-control"></textarea>
				</div>
				<div class="col-md-6">
					<label>Jalan:</label>
					<textarea name="jalan" class="form-control"></textarea>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-md-6">
					<label>Kelurahan/Desa:</label>
					<input name="desa" type="text" class="form-control">
				</div>
				<div class="col-md-6">
					<label>Kecamatan:</label>
					<input name="kecamatan" type="text" class="form-control">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col">
					<label>Disposisi:</label>
					<textarea name="disposisi" class="form-control"></textarea>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-md-4">
					<label>Screning:</label>
					<select name="screening" class="form-select">
						<option disabled selected> -- </option>
						<option value="y"> Sudah</option>
						<option value="n"> Belum</option>
					</select>
				</div>
				<div class="col-md-4">
					<label>Surveyor:</label>
					<select name="surveyor" class="form-select">
						<option disabled selected> -- </option>
						<option value="y"> Sudah</option>
						<option value="n"> Belum</option>
					</select>
				</div>
				<div class="col-md-4">
					<label>Production:</label>
					<select name="production" class="form-select">
						<option disabled selected> -- </option>
						<option value="y"> Sudah</option>
						<option value="n"> Belum</option>
					</select>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col">
					<label>Keterangan:</label>
					<textarea name="keterangan" class="form-control"></textarea>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col">
					<label>Tanggal Terbit KRK:</label>
					<input name="terbit" type="date" class="form-control">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-md-4">
					<div class="field">
						<label>Nomor Berkas:</label>
						<div class="control">
							<input name="nomor" type="text" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="field">
						<label>Verifikasi Kabid PL:</label>
						<div class="control">
							<div class="select is-fullwidth">
								<select name="verifikasi" class="form-select">
									<option disabled selected> -- </option>
									<option value="y"> Sudah</option>
									<option value="n"> Belum</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="field">
						<label>Status:</label>
						<div class="control">
							<div class="select is-fullwidth">
								<select name="status" class="form-select">
									<?php foreach ($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='krk'") as $ks) : ?>
										<option value="<?= $ks['jenis_id']; ?>"> <?= $ks['jenis_nama']; ?> </option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col">
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
if ($_GET['p'] == 'krk-add') {
?>
	<script>
		document.querySelectorAll('.tab').forEach(tab => {
			tab.classList.remove('t-active', 'd-side-active');
		});
		// Tentukan tab active
		const activeTab = document.querySelectorAll('.tab')[1];
		const activeDropdown = document.querySelectorAll('.tab-dropdown')[0];
		// Tambahkan class aktif pada tab 
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