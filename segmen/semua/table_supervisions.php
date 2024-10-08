<div class="box">

	<h3 class="title is-5">
		Data Pengawasan
	</h3>
	<hr>

	<?php
	$jenis = [];
	foreach ($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='bangunan'") as $j) {
		$jenis[$j['jenis_id']] = $j['jenis_nama'];
	}
	?>

	<div class="table-responsive">
		<table class="table table-striped ">
			<thead>
				<tr>
					<th>#</th>
					<th>Tanggal</th>
					<th>Nomor Surat</th>
					<th>Jenis Bangunan</th>
					<th>Nama Pemilik</th>
					<th>Alamat Bangunan</th>
					<th>Penilik</th>
					<th>Perihal</th>
					<th>Kecamatan</th>
					<th>Kelurahan/Desa</th>
					<th>Teguran</th>
					<th>Keterangan</th>
					<th>Tindak Lanjut</th>
					<th>Hasil Tinjauan</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$no = 1;
				foreach ($cmd->fetchAll("SELECT * FROM pengawasan") as $awas):
				?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $awas['awas_tanggal']; ?></td>
						<td><?= $awas['awas_nosurat']; ?></td>
						<td><?= $jenis[$awas['awas_jenis']]; ?></td>
						<td><?= $awas['awas_nama']; ?></td>
						<td><?= $awas['awas_alamat']; ?></td>
						<td><?= $awas['awas_penilik']; ?></td>
						<td><?= $awas['awas_perihal']; ?></td>
						<td><?= $awas['awas_kecamatan']; ?></td>
						<td><?= $awas['awas_desa']; ?></td>
						<td><?= $awas['awas_teguran']; ?></td>
						<td><?= $awas['awas_keterangan']; ?></td>
						<td><?= $awas['awas_tindakan']; ?></td>
						<td><?= $awas['awas_hasil']; ?></td>
						<td>
							<div class="d-flex gap-1">
								<form action="" method="post" class="is-inline">
									<input type="hidden" name="id" value="<?= $awas['awas_id']; ?>">
									<button class="btn btn-warning">
										<i class="fa-solid fa-pen-to-square text-white"></i>
									</button>
								</form>
								<form action="?p=supervision-delete" method="post" class="is-inline">
									<input type="hidden" name="id" value="<?= $awas['awas_id']; ?>">
									<button name="delete" class="btn btn-danger ">
										<i class="fa-solid fa-trash text-white"></i>
									</button>
								</form>
							</div>
						</td>
					</tr>
				<?php endforeach;
				if ($no == 1) echo "<tr><td colspan=\"15\">Tidak ada data</td></tr>";
				?>
			</tbody>
		</table>
	</div>

	<?php
	$cheat = new Cheat();
	$cheat->pages();
	?>
</div>
<!-- Active Tab -->
<?php
if ($_GET['p'] == 'supervision-data') {
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