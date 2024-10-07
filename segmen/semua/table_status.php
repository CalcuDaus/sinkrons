<div class="box">

	<h3 class="title is-5">
		Data Status PBG
	</h3>
	<hr>

	<div class="buttons">
		<a href="?p=status-add" class="button is-primary">
			<span class="icon-text">
				<span class="icon">
					<i class="fa-solid fa-plus"></i>
				</span>
				<span>Tambah</span>
			</span>
		</a>
	</div>

	<table class="table is-fullwidth">
		<thead>
			<tr>
				<th>#</th>
				<th>Status PBG</th>
				<th>Aksi</th>
			</tr>
		</thead>

		<tbody>
		<?php
		$no= 1;
		foreach($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='status'") as $user):
		?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $user['jenis_nama']; ?></td>
				<td>
					<form action="" method="post" class="is-inline">
						<input type="hidden" name="id" value="<?= $user['jenis_id']; ?>">
						<button class="button is-small is-warning">
							<i class="fa-solid fa-pen-to-square"></i>
						</button>
					</form>
					<form action="?p=jenis-delete" method="post" class="is-inline">
						<input type="hidden" name="id" value="<?= $user['jenis_id']; ?>">
						<button class="button is-small is-danger">
							<i class="fa-solid fa-trash"></i>
						</button>
					</form>
				</td>
			</tr>
			<?php endforeach;
			if($no == 1) echo "<tr><td colspan=\"3\">Tidak ada data</td></tr>";
			?>
		</tbody>
	</table>

	<?php
	$cheat = new Cheat();
	$cheat->pages();
	?>
</div>