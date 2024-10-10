<div class="box">

	<h3 class="title is-5">
		Data Pengguna
	</h3>
	<hr>
	<a href="?p=user-add" class="btn btn-primary mb-2">Tambah</a>
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
			$no = 1;
			foreach ($cmd->fetchAll("SELECT * FROM akun") as $user):
			?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $user['akun_nama']; ?></td>
					<td><?= $user['akun_email']; ?></td>
					<td><?= $user['akun_kelamin']; ?></td>
					<td><?= $user['akun_level']; ?></td>
					<td><?= $user['akun_segmen']; ?></td>
					<td><?= $user['akun_status']; ?></td>
					<td>
						<div class="container d-flex gap-1">
							<form action="" method="post" class="is-inline">
								<input type="hidden" name="id" value="<?= $user['akun_id']; ?>">
								<button class="btn btn-warning ">
									<i class="fa-solid fa-pen-to-square text-white"></i>
								</button>
							</form>
							<form action="" method="post" class="is-inline">
								<input type="hidden" name="id" value="<?= $user['akun_id']; ?>">
								<button class="btn btn-danger">
									<i class="fa-solid fa-trash text-white"></i>
								</button>
							</form>
						</div>
					</td>
				</tr>
			<?php endforeach;
			if ($no == 1) echo "<tr><td colspan=\"8\">Tidak ada data</td></tr>";
			?>
		</tbody>
	</table>

	<?php
	$cheat = new Cheat();
	$cheat->pages();
	?>
</div>


<!-- Active Tab -->
<?php
if ($_GET['p'] == 'user-data') {
?>
	<script>
		document.querySelectorAll('.tab').forEach(tab => {
			tab.classList.remove('t-active', 'd-side-active');
		});
		// Tentukan tab active
		const activeTab = document.querySelectorAll('.tab')[5];
		// const activeDropdown = document.querySelectorAll('.tab-dropdown')[1];
		// Tambahkan class aktif pada tab 
		activeTab.classList.add('d-side-active', 't-active');
		// Buat animasi transisi pada dropdown
		// activeDropdown.style.height = activeDropdown.scrollHeight + "px";
		// activeDropdown.addEventListener('transitionend', function handleTransitionEnd() {
		// 	activeDropdown.style.height = 'auto';
		// 	activeDropdown.removeEventListener('transitionend', handleTransitionEnd);
		// });
	</script>
<?php
}
?>