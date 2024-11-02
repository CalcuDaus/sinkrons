<div class="row">
	<div class="col-12 p-0">
		<div class="breadcrumbs">
			<ul class="breadcrumb-nav ps-3">
				<li><a href="">Dashboard</a></li>
				<li><a href="">Referensi</a></li>
				<li class="text-primary">Data Fungsi Bangunan</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<div class="box">

	<div class="d-flex justify-content-between">
		<h3 class="title is-5">
			Data Fungsi Bangunan
		</h3>
		<a href="?p=bangunan-add" class="btn btn-primary">
			<span class="icon-text">
				<span class="icon">
					<i class="fa-solid fa-plus text-white"></i>
				</span>
				<span class="text-white">Tambah</span>
			</span>
		</a>
	</div>
	<hr>
	<div class="container card border-0 shadow rounded-4 p-3">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Fungsi Bangunan</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$pages = $cheat->pages("SELECT * FROM jenis WHERE jenis_kelompok='bangunan'", "ref-bangunan");
					foreach ($pages['data'] as $user):
					?>
						<tr>
							<td><?= $pages['no']++; ?></td>
							<td><?= $user['jenis_nama']; ?></td>
							<td>
								<div class="d-flex gap-2">
									<form action="" method="post" class="is-inline">
										<input type="hidden" name="id" value="<?= $user['jenis_id']; ?>">
										<button class="btn btn-sm btn-warning">
											<i class="fa-solid fa-pen-to-square text-white"></i>
										</button>
									</form>
									<form action="?p=jenis-delete" method="post" class="is-inline">
										<input type="hidden" name="id" value="<?= $user['jenis_id']; ?>">
										<button class="btn btn-sm btn-danger">
											<i class="fa-solid fa-trash text-white"></i>
										</button>
									</form>
								</div>
							</td>
						</tr>
					<?php endforeach;
					if ($pages['count'] == 0) echo "<tr><td colspan=\"3\">Tidak ada data</td></tr>";
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
if ($_GET['p'] == 'ref-bangunan') {
?>
	<script>
		document.querySelectorAll('.tab').forEach(tab => {
			tab.classList.remove('t-active', 'd-side-active');
		});

		// Tentukan tab dan dropdown yang ingin diaktifkan
		const activeTab = document.querySelectorAll('.tab')[4]; // Misal, tab ke-3
		const activeDropdown = document.querySelectorAll('.tab-dropdown')[3]; // Misal, dropdown ke-2

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