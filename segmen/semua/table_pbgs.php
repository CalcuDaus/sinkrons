<div class="box">

	<h3 class="title is-5">
		Data PBG
	</h3>
	<hr>

<?php
$jenis = [];
foreach( $cmd->fetchAll("SELECT * FROM jenis") as $j)
{
	array_push($jenis, $j['jenis_nama']);
}
?>

	<div class="table-container">
		<table class="table is-fullwidth">
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
			$no= 1;
			foreach($cmd->fetchAll("SELECT * FROM pbg") as $pbg):
			?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $jenis[$pbg['pbg_konsultasi']-1]; ?></td>
					<td><?= $pbg['pbg_reg']; ?></td>
					<td><?= $pbg['pbg_pemilik']; ?></td>
					<td><?= $pbg['pbg_alamat']; ?></td>
					<td><?= $pbg['pbg_telp']; ?></td>
					<td><?= $pbg['pbg_bangunan']; ?></td>
					<td><?= $pbg['pbg_kecamatan']; ?></td>
					<td><?= $pbg['pbg_desa']; ?></td>
					<td><?= $jenis[$pbg['pbg_fungsi']-1]; ?></td>
					<td><?= $pbg['pbg_tanggal']; ?></td>
					<td><?= $jenis[$pbg['pbg_status']-1]; ?></td>
					<td>
						<form action="" method="post" class="is-inline">
							<input type="hidden" name="id" value="<?= $pbg['pbg_id']; ?>">
							<button class="button is-small is-warning">
								<i class="fa-solid fa-pen-to-square"></i>
							</button>
						</form>
						<form action="?p=pbg-delete" method="post" class="is-inline">
							<input type="hidden" name="id" value="<?= $pbg['pbg_id']; ?>">
							<button class="button is-small is-danger">
								<i class="fa-solid fa-trash"></i>
							</button>
						</form>
					</td>
				</tr>
			<?php endforeach;
			if($no == 1) echo "<tr><td colspan=\"13\">Tidak ada data</td></tr>";
			?>
			</tbody>
		</table>
	</div>

	<?php
	$cheat = new Cheat();
	$cheat->pages();
	?>
</div>