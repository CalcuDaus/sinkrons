<div class="box">
	<h3 class="title is-5">Tambah Jenis Bangunan</h3>
	<hr>

	<?php
	if (isset($_POST['tambah'])) {
		$nama = isset($_POST['nama']) ? $_POST['nama'] : 0;

		$notif = "Data Tidak sesuai!";

		if (!empty($nama)) {
			if ($cmd->query("INSERT INTO jenis VALUES (
				NULL, '$nama', 'bangunan')")) {
				$notif = "<p>Data telah ditambahkan!</p>";
			} else $notif = "Data tidak dapat ditambahkan!";
		}

		echo $notif;
	}
	?>
	<div class="columns">
		<div class="column is-6">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="container">
					<div class="row">
						<div class="col-6 d-flex gap-2 flex-column">
							<div class="field">
								<label>Jenis Bangunan:</label>
								<div class="control">
									<input name="nama" type="text" class="form-control">
								</div>
							</div>
							<div class="field has-text-right">
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
</div>


<!-- Active Tab -->
<?php
if ($_GET['p'] == 'bangunan-add') {
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