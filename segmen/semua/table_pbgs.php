<!-- Breadcrumbs -->
<div class="row">
	<div class="col-12 p-0">
		<div class="breadcrumbs">
			<ul class="breadcrumb-nav ps-3">
				<li><a href="">Dashboard</a></li>
				<li><a href="">PBG</a></li>
				<li class="text-primary">Data PBG</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<div class="box">
	<div class="d-flex justify-content-between">
		<h3 class="title is-5">
			Data PBG
		</h3>
		<a href="?p=pbg-add" class="btn btn-primary">
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

	<div class="container card border-0 shadow rounded-4 p-3">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Jenis Konsultasi</th>
						<th>No. Registrasi</th>
						<th>Nama Pemilik</th>
						<th>Alamat Pemilik</th>
						<th>Telepon</th>
						<th>Alamat Bangunan</th>
						<th>Kecamatan</th>
						<th>Kelurahan/Desa</th>
						<th>Fungsi Bangunan</th>
						<th>Tgl. Permohonan</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$pages = $cheat->pages("SELECT * FROM pbg", "pbg-data");
					foreach ($pages['data'] as $pbg):
					?>
						<tr>
							<td><?= $pages['no']++; ?></td>
							<td><?= $jenis[$pbg['pbg_konsultasi'] - 1]; ?></td>
							<td><?= $pbg['pbg_reg']; ?></td>
							<td><?= $pbg['pbg_pemilik']; ?></td>
							<td><?= $pbg['pbg_alamat']; ?></td>
							<td><?= $pbg['pbg_telp']; ?></td>
							<td><?= $pbg['pbg_bangunan']; ?></td>
							<td><?= $pbg['pbg_kecamatan']; ?></td>
							<td><?= $pbg['pbg_desa']; ?></td>
							<td><?= $jenis[$pbg['pbg_fungsi']]; ?></td>
							<td><?= $pbg['pbg_tanggal']; ?></td>
							<td><?= $jenis[$pbg['pbg_status']]; ?></td>
							<td>
								<div class="d-flex gap-2">
									<form action="" method="post" class="is-inline">
										<input type="hidden" name="id" value="<?= $pbg['pbg_id']; ?>">
										<button class="btn btn-sm btn-warning">
											<i class="fa-solid fa-pen-to-square text-white"></i>
										</button>
									</form>
									<form action="?p=pbg-delete" method="post" class="is-inline">
										<input type="hidden" name="id" value="<?= $pbg['pbg_id']; ?>">
										<button class="btn btn-sm btn-danger">
											<i class="fa-solid fa-trash text-white"></i>
										</button>
									</form>
								</div>
							</td>
						</tr>
					<?php endforeach;
					if ($pages['count'] == 0) echo "<tr><td colspan=\"13\">Tidak ada data</td></tr>";
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
if ($_GET['p'] == 'pbg-data') {
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