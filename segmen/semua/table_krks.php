<!-- Breadcrumbs -->
<div class="row">
	<div class="col-12 p-0">
		<div class="breadcrumbs">
			<ul class="breadcrumb-nav ps-3">
				<li><a href="">Dashboard</a></li>
				<li><a href="">KRK</a></li>
				<li class="text-primary">Data KRK</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<div class="box ">
	<div class="d-flex justify-content-between">
		<h3 class="title is-5">
			Data KRK
		</h3>
		<a href="?p=krk-add" class="btn btn-primary">
			<span class="icon-text">
				<span class="icon">
					<i class="fa-solid fa-plus text-white"></i>
				</span>
				<span class="text-white">Tambah</span>
			</span>
		</a>
	</div>
	<hr>
	<?php
	$jenis = [];
	foreach ($cmd->fetchAll("SELECT * FROM jenis") as $j) {
		$jenis[$j['jenis_id']] = $j['jenis_nama'];
	}
	?>

	<div class="card border-0 shadow rounded-4 p-3 ">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Atas Nama Pemohon</th>
						<th>Tanggal Surat</th>
						<th>Tanggal Surat Diterima</th>
						<th>Jenis Permohonan</th>
						<th>Perihal</th>
						<th>Jalan</th>
						<th>Desa/Kelurahan</th>
						<th>Kecamatan</th>
						<th>Disposisi</th>
						<th>Screening</th>
						<th>Surveyor</th>
						<th>Production</th>
						<th>Tanggal Terbit KRK</th>
						<th>Keterangan</th>
						<th>Nomor Berkas</th>
						<th>Verifikasi Kabid</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$pages = $cheat->pages('SELECT * FROM krk', 'krk-data');
					foreach ($pages['data'] as $krk):
					?>
						<tr>
							<td><?= $pages['no']++; ?></td>
							<td><?= $krk['krk_pemohon']; ?></td>
							<td><?= $krk['krk_suratmasuk']; ?></td>
							<td><?= $krk['krk_suratterima']; ?></td>
							<td><?= $krk['krk_permohonan']; ?></td>
							<td><?= $krk['krk_perihal']; ?></td>
							<td><?= $krk['krk_jalan']; ?></td>
							<td><?= $krk['krk_desa']; ?></td>
							<td><?= $krk['krk_kecamatan']; ?></td>
							<td><?= $krk['krk_disposisi']; ?></td>
							<td><?= $cheat->accept($krk['krk_screening']); ?></td>
							<td><?= $cheat->accept($krk['krk_surveyor']); ?></td>
							<td><?= $cheat->accept($krk['krk_production']); ?></td>
							<td><?= $krk['krk_terbit']; ?></td>
							<td><?= $krk['krk_keterangan']; ?></td>
							<td><?= $krk['krk_nomor']; ?></td>
							<td><?= $cheat->accept($krk['krk_verifikasi']); ?></td>
							<td><?= $jenis[$krk['krk_status']]; ?></td>
							<td>
								<div class="d-flex gap-2 ">
									<form action="" method="post" class="is-inline">
										<input type="hidden" name="id" value="<?= $krk['krk_id']; ?>">
										<button class="btn-sm btn-warning btn">
											<i class="fa-solid fa-pen-to-square text-white"></i>
										</button>
									</form>
									<form action="?p=supervision-delete" method="post" class="is-inline">
										<input type="hidden" name="id" value="<?= $krk['krk_id']; ?>">
										<button name="delete" class="btn-sm btn btn-danger ">
											<i class="fa-solid fa-trash text-white"></i>
										</button>
									</form>
								</div>
							</td>
						</tr>
					<?php endforeach;
					if ($pages['count'] == 0) echo "<tr><td colspan=\"19\">Tidak ada data</td></tr>";
					?>
				</tbody>
			</table>
		</div>
		<div class="container">
			<div class="row">
				<div class="col d-flex justify-content-end flex-column align-items-end mt-2">
					<?= $pages['links']; ?>
					<p><?= $pages['detail']; ?></p>
				</div>
			</div>
		</div>
	</div>



</div>

<!-- Active Tab -->
<?php
if ($_GET['p'] == 'krk-data') {
?>
	<script>
		document.querySelectorAll('.tab').forEach(tab => {
			tab.classList.remove('t-active', 'd-side-active');
		});

		// Tentukan tab dan dropdown yang ingin diaktifkan
		const activeTab = document.querySelectorAll('.tab')[1]; // Misal, tab ke-3
		const activeDropdown = document.querySelectorAll('.tab-dropdown')[0]; // Misal, dropdown ke-2

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