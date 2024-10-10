<div class="box">

	<h3 class="title is-5">
		Data Jenis Bangunan
	</h3>
	<hr>

	<div class="buttons mb-2">
		<a href="?p=bangunan-add" class="btn btn-primary ">
			<span class="icon-text ">
				<span class="icon">
					<i class="fa-solid text-white fa-plus"></i>
				</span>
				<span class="text-white">Tambah</span>
			</span>
		</a>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Jenis Bangunan</th>
				<th>Aksi</th>
			</tr>
		</thead>

		<tbody>
			<?php
			$no = 1;
			foreach ($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='bangunan'") as $user):
			?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $user['jenis_nama']; ?></td>
					<td>
						<div class="container d-flex gap-1">
							<form action="" method="post" class="is-inline">
								<input type="hidden" name="id" value="<?= $user['jenis_id']; ?>">
								<button class="btn btn-warning">
									<i class="fa-solid text-white fa-pen-to-square"></i>
								</button>
							</form>
							<form action="?p=jenis-delete" method="post" class="is-inline">
								<input type="hidden" name="id" value="<?= $user['jenis_id']; ?>">
								<button class="btn btn-danger">
									<i class="fa-solid fa-trash text-white"></i>
								</button>
							</form>
						</div>
					</td>
				</tr>
			<?php endforeach;
			if ($no == 1) echo "<tr><td colspan=\"3\">Tidak ada data</td></tr>";
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
if ($_GET['p'] == 'ref-bangunan') {
?>
	<script>
		document.querySelectorAll('.tab').forEach(tab => {
			tab.classList.remove('t-active', 'd-side-active');
		});
		// Tentukan tab active
		const activeTab = document.querySelectorAll('.tab')[4];
		const activeDropdown = document.querySelectorAll('.tab-dropdown')[3];
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