<div class="row">
	<div class="col-12 p-0">
		<div class="breadcrumbs">
			<ul class="breadcrumb-nav ps-3">
				<li><a href="">Dashboard</a></li>
				<li><a href="">Pengguna</a></li>
				<li class="text-primary">Data Pengguna</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<div class="box">
	<div class="d-flex justify-content-between">
		<h3 class="title is-5">
			Data Pengguna
		</h3>
		<a href="?p=user-add" class="btn btn-primary">
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
						<th>Nama Lengkap</th>
						<th>Email</th>
						<th>Jenis Kelamin</th>
						<th>Hak Akses</th>
						<th>Bagian</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$pages = $cheat->pages("SELECT * FROM akun", "user-data");
					foreach ($pages['data'] as $user):
					?>
						<tr>
							<td><?= $pages['no']++; ?></td>
							<td><?= $user['akun_nama']; ?></td>
							<td><?= $user['akun_email']; ?></td>
							<td><?= $user['akun_kelamin']; ?></td>
							<td><?= $user['akun_level']; ?></td>
							<td><?= $user['akun_segmen']; ?></td>
							<td><?= $user['akun_status']; ?></td>
							<td>
								<div class="d-flex gap-2">
									<form action="" method="post" class="is-inline">
										<input type="hidden" name="id" value="<?= $user['akun_id']; ?>">
										<button class="btn btn-sm btn-warning">
											<i class="fa-solid text-white fa-pen-to-square"></i>
										</button>
									</form>
									<form action="?p=user-delete" method="post" class="is-inline">
										<input type="hidden" name="id" value="<?= $user['akun_id']; ?>">
										<button class="btn btn-sm btn-danger">
											<i class="fa-solid text-white fa-trash"></i>
										</button>
									</form>
								</div>
							</td>
						</tr>
					<?php endforeach;
					if ($pages['count'] == 0) echo "<tr><td colspan=\"8\">Tidak ada data</td></tr>";
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
if ($_GET['p'] == 'user-data') {
?>
	<script>
		document.querySelectorAll('.tab').forEach(tab => {
			tab.classList.remove('t-active', 'd-side-active');
		});

		// Tentukan tab dan dropdown yang ingin diaktifkan
		const activeTab = document.querySelectorAll('.tab')[5]; // Misal, tab ke-3
		// const activeDropdown = document.querySelectorAll('.tab-dropdown')[3]; // Misal, dropdown ke-2

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