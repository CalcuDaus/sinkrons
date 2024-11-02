<div class="row">
	<div class="col-12 p-0">
		<div class="breadcrumbs">
			<ul class="breadcrumb-nav ps-3">
				<li><a href="">Dashboard</a></li>
				<li><a href="">Referensi</a></li>
				<li class="text-primary">Tambah Status KRK</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<div class="box">
	<h3 class="title is-5">Tambah Status KRK</h3>
	<hr>

	<?php
	if (isset($_POST['tambah'])) {
		$nama = isset($_POST['nama']) ? $_POST['nama'] : 0;

		$notif = "Data Tidak sesuai!";

		if (!empty($nama)) {
			if ($cmd->query("INSERT INTO jenis VALUES (
				NULL, '$nama', 'krk')")) {
				$cheat->log($data['akun_id'], "add", "Menambahkan Status KRK baru [id-" . $cmd->id() . "]");
				$notif = "<p>Data telah ditambahkan!</p>";
			} else $notif = "Data tidak dapat ditambahkan!";
		}

		echo $notif;
	}
	?>
	<div class="row">
		<div class="col-md-6">
			<form action="" method="post" enctype="multipart/form-data">

				<div class="field">
					<label>Status:</label>
					<div class="control">
						<input name="nama" type="text" class="form-control">
					</div>
				</div>

				<div class="mt-2">
					<button name="tambah" class="btn btn-primary">
						<span class="icon-text">
							<span class="icon">
								<i class="fa-regular text-white fa-paper-plane"></i>
							</span>
							<span class="text-white">Tambah</span>
						</span>
					</button>
				</div>

			</form>
		</div>
	</div>
</div>
<!-- Active Tab -->
<?php
if ($_GET['p'] == 'ks-add') {
?>
	<script>
		document.querySelectorAll('.tab').forEach(tab => {
			tab.classList.remove('t-active', 'd-side-active');
		});

		// Tentukan tab dan dropdown yang ingin diaktifkan
		const activeTab = document.querySelectorAll('.tab')[4]; // Misal, tab ke-3
		const activeDropdown = document.querySelectorAll('.tab-dropdown')[3]; // Misal, dropdown ke-2

		// Tambahkan class aktif pada tab yang diinginkan
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