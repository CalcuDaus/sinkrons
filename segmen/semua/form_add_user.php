<div class="box">
	<h3 class="title is-5">Tambah Data Pengguna</h3>
	<hr>

	<?php
	if( isset($_POST['tambah']))
	{
		$nama = isset($_POST['nama']) ? $_POST['nama'] : 0;
		$email = isset($_POST['email']) ? $_POST['email'] : 0;
		$password = isset($_POST['password']) ? $_POST['password'] : 0;
		$kelamin = isset($_POST['kelamin']) ? $_POST['kelamin'] : "pria";
		$level = isset($_POST['level']) ? $_POST['level'] : 'operator';
		$segmen = isset($_POST['segmen']) ? $_POST['segmen'] : "imb";
		$status = isset($_POST['status']) ? $_POST['status'] : 'tidak aktif';
		$foto = !empty($_FILES['foto']) ? $_FILES['foto'] : "user.png";

		$notif = "Data Tidak sesuai!";

		if( !empty($nama) && !empty($email) && !empty($password) )
		{
			$password = password_hash($password, PASSWORD_DEFAULT);

			if( $cmd->query("INSERT INTO akun VALUES (
				NULL, '$nama', '$email', '$password', '$kelamin', '$level', '$status',
				'$segmen', '$foto'
			)"))
			{
				$notif = "<p>Data telah ditambahkan!</p>";
			}
			else $notif = "Data tidak dapat ditambahkan!";
		}

		echo $notif;
	}
	?>
	<form action="" method="post" enctype="multipart/form-data">
		
		<div class="field">
			<label>Nama Lengkap:</label>
			<div class="control">
				<input name="nama" type="text" class="input">
			</div>
		</div>

		<div class="field">
			<label>Email:</label>
			<div class="control">
				<input name="email" type="email" class="input">
			</div>
		</div>

		<div class="field">
			<label>Password:</label>
			<div class="control">
				<input name="password" type="password" class="input">
			</div>
		</div>

		<div class="columns">
			<div class="column is-half">
				<div class="field">
					<label>Jenis Kelamin:</label>
					<div class="control">
						<div class="select is-fullwidth">
							<select name="kelamin">
								<option value="pria"> Pria </option>
								<option value="wanita"> Wanita </option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="column is-half">
				<div class="field">
					<label>Hak Akses:</label>
					<div class="control">
						<div class="select is-fullwidth">
							<select name="level">
								<option value="operator"> Operator </option>
								<option value="viewer"> Viewer </option>
								<option value="admin"> Admin </option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="columns">
			<div class="column is-half">
				<div class="field">
					<label>Bagian Kontrol:</label>
					<div class="control">
						<div class="select is-fullwidth">
							<select name="segmen">
								<option value="imb"> IMB </option>
								<option value="krk"> KRK </option>
								<option value="pengawasan"> Pengawasan </option>
								<option value="semua"> Semua Bagian </option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="column is-half">
				<div class="field">
					<label>Status:</label>
					<div class="control">
						<div class="select is-fullwidth">
							<select name="status">
								<option value="aktif"> Aktif </option>
								<option value="tidak aktif"> Tidak Aktif </option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="field">
			<label>Foto</label>
			<div class="control">
				<div class="file">
				  <label class="file-label">
				    <input class="file-input" type="file" name="resume" />
				    <span class="file-cta">
				      <span class="file-icon">
				        <i class="fas fa-upload"></i>
				      </span>
				      <span class="file-label"> Pilih file foto… </span>
				    </span>
				  </label>
				</div>
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