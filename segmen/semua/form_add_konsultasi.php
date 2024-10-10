<div class="box">
	<h3 class="title is-5">Tambah Jenis Konsultasi</h3>
	<hr>

	<?php
	if (isset($_POST['tambah'])) {
		$nama = isset($_POST['nama']) ? $_POST['nama'] : 0;

		$notif = "Data Tidak sesuai!";

		if (!empty($nama)) {
			if ($cmd->query("INSERT INTO jenis VALUES (
				NULL, '$nama', 'konsultasi')")) {
				$notif = "<p>Data telah ditambahkan!</p>";
			} else $notif = "Data tidak dapat ditambahkan!";
		}

		echo $notif;
	}
	?>
	<div class="container">
		<div class="row">
			<div class="col-6 ">
				<form action="" method="post" class="d-flex flex-column gap-2" enctype="multipart/form-data">
					<div class="field">
						<label>Jenis Konsultasi:</label>
						<div class="control">
							<input name="nama" type="text" class="form-control">
						</div>
					</div>

					<div class="field has-text-right">
						<button name="tambah" class="btn btn-primary">
							<span class="icon-text">
								<span class="icon">
									<i class="fa-regular fa-paper-plane text-white"></i>
								</span>
								<span class="text-white">Tambah</span>
							</span>
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<!-- Active Tab -->
<?php
if ($_GET['p'] == 'konsultasi-add') {
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