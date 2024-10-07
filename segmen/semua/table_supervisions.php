<div class="box">

	<h3 class="title is-5">
		Data Pengawasan
	</h3>
	<hr>

<?php
$jenis = [];
foreach($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='bangunan'") as $j)
{
	$jenis[$j['jenis_id']] = $j['jenis_nama'];
}
?>

	<div class="table-container">
		<table class="table is-fullwidth">
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
			$no= 1;
			foreach($cmd->fetchAll("SELECT * FROM pengawasan") as $awas):
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
						<form action="" method="post" class="is-inline">
							<input type="hidden" name="id" value="<?= $awas['awas_id']; ?>">
							<button class="button is-small is-warning">
								<i class="fa-solid fa-pen-to-square"></i>
							</button>
						</form>
						<form action="?p=supervision-delete" method="post" class="is-inline">
							<input type="hidden" name="id" value="<?= $awas['awas_id']; ?>">
							<button name="delete" class="button is-small is-danger">
								<i class="fa-solid fa-trash"></i>
							</button>
						</form>
					</td>
				</tr>
			<?php endforeach;
			if($no == 1) echo "<tr><td colspan=\"15\">Tidak ada data</td></tr>";
			?>
			</tbody>
		</table>
	</div>

	<?php
	$cheat = new Cheat();
	$cheat->pages();
	?>
</div>