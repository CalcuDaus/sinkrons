<div class="row">
	<div class="col-12 p-0">
		<div class="breadcrumbs">
			<ul class="breadcrumb-nav ps-3">
				<li><a href="">Dashboard</a></li>
				<li><a href="">Pengguna</a></li>
				<li class="text-primary">Tambah Data Pengguna</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<div class="box">
	<h3 class="title is-5">Tambah Data Pengguna</h3>
	<hr>

	<?php
	if (isset($_POST['tambah'])) {
		$nama = isset($_POST['nama']) ? $_POST['nama'] : 0;
		$email = isset($_POST['email']) ? $_POST['email'] : 0;
		$password = isset($_POST['password']) ? $_POST['password'] : 0;
		$kelamin = isset($_POST['kelamin']) ? $_POST['kelamin'] : "pria";
		$level = isset($_POST['level']) ? $_POST['level'] : 'operator';
		$segmen = isset($_POST['segmen']) ? $_POST['segmen'] : "imb";
		$status = isset($_POST['status']) ? $_POST['status'] : 'tidak aktif';
		$foto = !empty($_FILES['foto']) ? $_FILES['foto'] : "user.png";

		$notif = "Data Tidak sesuai!";

		if (!empty($nama) && !empty($email) && !empty($password)) {
			$password = password_hash($password, PASSWORD_DEFAULT);

			if ($cmd->query("INSERT INTO akun VALUES (
				NULL, '$nama', '$email', '$password', '$kelamin', '$level', '$status',
				'$segmen', '$foto'
			)")) {
				$notif = "<p>Data telah ditambahkan!</p>";
			} else $notif = "Data tidak dapat ditambahkan!";
		}

		echo $notif;
	}
	?>
	<div class="container card border-0 shadow rounded-4 p-3">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="field">
							<label class="mt-2">Nama Lengkap:</label>
							<div class="control">
								<input name="nama" type="text" class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">


						<div class="field">
							<label class="mt-2">Email:</label>
							<div class="control">
								<input name="email" type="email" class="form-control">
							</div>
						</div>

						<div class="field">
							<label class="mt-2">Password:</label>
							<div class="control">
								<input name="password" type="password" class="form-control">
							</div>
						</div>

						<div class="columns">
							<div class="column is-half">
								<div class="field">
									<label class="mt-2">Jenis Kelamin:</label>
									<div class="control">
										<div class="select is-fullwidth">
											<select name="kelamin" class="form-select">
												<option value="pria"> Pria </option>
												<option value="wanita"> Wanita </option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
					<div class="col-6">
						<div class="column is-half">
							<div class="field">
								<label class="mt-2">Hak Akses:</label>
								<div class="control">
									<div class="select is-fullwidth">
										<select name="level" class="form-select">
											<option value="operator"> Operator </option>
											<option value="viewer"> Viewer </option>
											<option value="admin"> Admin </option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="columns">
							<div class="column is-half">
								<div class="field">
									<label class="mt-2">Bagian Kontrol:</label>
									<div class="control">
										<div class="select is-fullwidth">
											<select name="segmen" class="form-select">
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
									<label class="mt-2">Status:</label>
									<div class="control">
										<div class="select is-fullwidth">
											<select name="status" class="form-select">
												<option value="aktif"> Aktif </option>
												<option value="tidak aktif"> Tidak Aktif </option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>




					</div>
					<div class="row">
						<div class="col">
							<div class="field">
								<label class="mt-2">Foto</label>
								<div class="control">
									<div class="file">
										<label class="file-label d-flex align-items-center">
											<input class="form-control" type="file" name="resume" />
											<span class="file-cta ps-2" style="width: 250px;">
												<span class="file-icon">
													<i class="fas fa-upload"></i>
												</span>
												<span class="file-label"> Pilih file foto… </span>
											</span>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="field has-text-right mt-3 text-end">
								<button name="tambah" class="btn btn-primary">
									<span class="icon-text">
										<span class="icon">
											<i class="fa-regular text-white fa-paper-plane"></i>
										</span>
										<span class="text-white">Tambah</span>
									</span>
								</button>
							</div>
						</div>
					</div>
				</div>


		</form>
	</div>
</div>
<!-- Active Tab -->
<?php
if ($_GET['p'] == 'user-add') {
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