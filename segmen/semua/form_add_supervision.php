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

		<div class="columns">
			<div class="column is-half">
				<div class="field">
					<label>Tanggal:</label>
					<div class="control">
						<input name="tanggal" type="date" class="input is-fullwidth">
					</div>
				</div>
			</div>
			<div class="column is-half">
				<div class="field">
					<label>Nomor Surat:</label>
					<div class="control">
						<input name="nosurat" type="text" class="input">
					</div>
				</div>
			</div>
		</div>

		<div class="field">
			<label>Jenis Bangunan:</label>
			<div class="control">
				<div class="select is-fullwidth">
					<select name="jenis">
						<?php foreach ($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='bangunan'") as $bangunan) : ?>
							<option value="<?= $bangunan['jenis_id']; ?>"> <?= $bangunan['jenis_nama']; ?> </option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>

		<div class="field">
			<label>Nama Pemilik:</label>
			<div class="control">
				<input name="nama" type="text" class="input">
			</div>
		</div>

		<div class="field">
			<label>Alamat Bangunan:</label>
			<div class="control">
				<textarea name="alamat" class="textarea"></textarea>
			</div>
		</div>

		<div class="columns">
			<div class="column is-half">
				<div class="field">
					<label>Penilik:</label>
					<div class="control">
						<textarea name="penilik" class="textarea"></textarea>
					</div>
				</div>
			</div>
			<div class="column is-half">
				<div class="field">
					<label>Perihal:</label>
					<div class="control">
						<textarea name="perihal" class="textarea"></textarea>
					</div>
				</div>
			</div>
		</div>

		<div class="columns">
			<div class="column is-half">
				<div class="field">
					<label>Kecamatan:</label>
					<div class="control">
						<input name="kecamatan" type="text" class="input is-fullwidth">
					</div>
				</div>
			</div>
			<div class="column is-half">
				<div class="field">
					<label>Kelurahan/Desa:</label>
					<div class="control">
						<input name="desa" type="text" class="input">
					</div>
				</div>
			</div>
		</div>



		<div class="field">
			<label>Teguran Ke-:</label>
			<div class="control">
				<div class="select is-fullwidth">
					<select name="teguran">
						<?php for ($u = 1; $u <= 3; $u++) : ?>
							<option value="Teguran <?= $u; ?>"> Teguran <?= $u; ?> </option>
						<?php endfor; ?>
					</select>
				</div>
			</div>
		</div>

		<div class="field">
			<label>Keterangan:</label>
			<div class="control">
				<textarea name="keterangan" class="textarea"></textarea>
			</div>
		</div>

		<div class="columns">
			<div class="column is-half">
				<div class="field">
					<label>Tindak Lanjut:</label>
					<div class="control">
						<textarea name="tindakan" class="textarea"></textarea>
					</div>
				</div>
			</div>
			<div class="column is-half">
				<div class="field">
					<label>Hasil Peninjauan:</label>
					<div class="control">
						<textarea name="hasil" class="textarea"></textarea>
					</div>
				</div>
			</div>
		</div>

		<div class="field has-text-right">
			<button name="tambah" class="button is-primary">
				<span class="icon-text">
					<span class="icon">
						<i class="fa-regular  fa-paper-plane"></i>
					</span>
					<span>Tambah</span>
				</span>
			</button>
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