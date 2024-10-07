<div class="box">
	<h3 class="title is-5">Tambah Jenis Konsultasi</h3>
	<hr>

	<?php
	if( isset($_POST['tambah']))
	{
		$nama = isset($_POST['nama']) ? $_POST['nama'] : 0;

		$notif = "Data Tidak sesuai!";

		if( !empty($nama))
		{
			if( $cmd->query("INSERT INTO jenis VALUES (
				NULL, '$nama', 'konsultasi')"))
			{
				$notif = "<p>Data telah ditambahkan!</p>";
			}
			else $notif = "Data tidak dapat ditambahkan!";
		}

		echo $notif;
	}
	?>
	<div class="columns">
		<div class="column is-6">
			<form action="" method="post" enctype="multipart/form-data">
				
				<div class="field">
					<label>Jenis Konsultasi:</label>
					<div class="control">
						<input name="nama" type="text" class="input">
					</div>
				</div>

				<div class="field has-text-right">
					<button name="tambah" class="button is-primary">
						<span class="icon-text">
						  <span class="icon">
						    <i class="fa-regular fa-paper-plane"></i>
						  </span>
						  <span>Tambah</span>
						</span>
					</button>
				</div>

			</form>
		</div>
	</div>
</div>