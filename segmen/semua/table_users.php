<div class="box">

	<h3 class="title is-5">
		Data Pengguna
	</h3>
	<hr>

	<table class="table is-fullwidth">
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
		$no= 1;
		foreach($cmd->fetchAll("SELECT * FROM akun") as $user):
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
					<form action="" method="post" class="is-inline">
						<input type="hidden" name="id" value="<?= $user['akun_id']; ?>">
						<button class="button is-small is-warning">
							<i class="fa-solid fa-pen-to-square"></i>
						</button>
					</form>
					<form action="" method="post" class="is-inline">
						<input type="hidden" name="id" value="<?= $user['akun_id']; ?>">
						<button class="button is-small is-danger">
							<i class="fa-solid fa-trash"></i>
						</button>
					</form>
				</td>
			</tr>
			<?php endforeach;
			if($no == 1) echo "<tr><td colspan=\"8\">Tidak ada data</td></tr>";
			?>
		</tbody>
	</table>

	<?php
	$cheat = new Cheat();
	$cheat->pages();
	?>
</div>