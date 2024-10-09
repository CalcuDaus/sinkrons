<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="shortcut icon" href="../assets/img/logo.png" type="image/png">
	<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
		integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer" />
	<!-- Bootstrap -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css?t=<?= rand(); ?>" />
	<!-- Custom Css -->
	<link rel="stylesheet" href="../assets/css/style.css?t=<?= rand(); ?>" />
</head>

<body>

	<aside id="sidebar">
		<div class="wrapper shadow">
			<div
				class="logo mt-2 d-flex align-items-center justify-content-between">
				<h5 class="m-0">Main Menu</h5>
			</div>
			<div class="mt-4">
				<li class="tab t-active d-flex align-items-center">
					<i class="fa-brands fa-slack me-3 icons"></i>
					<a href="?p=beranda" class="m-0">Dashboard</a>
				</li>
				<li class="tab tab-drop-btn mt-1 d-flex align-items-center">
					<i class="fa-solid fa-person-dress me-3 icons"></i>
					<a href="#" class="m-0">KRK</a>
					<i class="fa-solid fa-caret-down ms-auto"></i>
				</li>
				<div class="tab-dropdown">
					<ul class="tab-item-wrapper">
						<li><a href="?p=supervision-data">Data</a></li>
						<li><a href="#">Pencarian</a></li>
					</ul>
				</div>
				<li class="tab tab-drop-btn mt-1 d-flex align-items-center">
					<i class="fa-solid fa-eye me-3 icons"></i>
					<a href="#" class="m-0">Pengawasan</a>
					<i class="fa-solid fa-caret-down ms-auto"></i>
				</li>
				<div class="tab-dropdown">
					<ul class="tab-item-wrapper">
						<li><a href="?p=supervision-data">Data</a></li>
						<li><a href="?p=supervision-add">Tambah</a></li>
						<li><a href="?p=supervision-search">Pencarian</a></li>
					</ul>
				</div>
				<li class="tab tab-drop-btn mt-1 d-flex align-items-center">
					<i class="fa-solid fa-language me-3 icons"></i>
					<a href="#" class="m-0">Referensi</a>
					<i class="fa-solid fa-caret-down ms-auto"></i>
				</li>
				<div class="tab-dropdown">
					<ul class="tab-item-wrapper">
						<li><a href="#">Data</a></li>
						<li><a href="#">Pencarian</a></li>
					</ul>
				</div>
				<li class="tab mt-1 d-flex align-items-center">
					<i class="fa-solid fa-user me-3 icons"></i>
					<a href="#" class="m-0">Pengguna</a>
				</li>
				<li class="tab tab-drop-btn mt-1 d-flex align-items-center">
					<i class="fa-solid fa-file me-3 icons"></i>
					<a href="#" class="m-0">Laporan</a>
					<i class="fa-solid fa-caret-down ms-auto"></i>
				</li>
				<div class="tab-dropdown">
					<ul class="tab-item-wrapper">
						<li><a href="#">Data</a></li>
						<li><a href="#">Pencarian</a></li>
					</ul>
				</div>
			</div>
		</div>
	</aside>
	<main id="main">
		<header class="d-flex justify-content-between position-sticky top-0 z-2">
			<div class="toggle-btn">
				<i class="fa-solid fa-bars"></i>
			</div>
			<div class="profile">
				<img src="../assets/img/image-01.jpg" alt="" width="35px" />
			</div>
			<div class="tab-profile">
				<li><a href="">Setting</a></li>
				<li><a href="">Logout</a></li>
				<li><a href="">Info</a></li>
			</div>
		</header>
		<section class="content">

			<div class="container ps-4 pb-5">
				<?php
				require_once __DIR__ . '/../class/Databases.php';
				require_once __DIR__ . '/../class/Cheat.php';
				$cmd = new Databases();

				$pages = isset($_GET['p']) ? $_GET['p'] : require_once "semua/beranda.php";

				switch ($pages) {
					case 'beranda':
						require_once "semua/beranda.php";
						break;

					case 'user-add':
						require_once "semua/form_add_user.php";
						break;

					case 'user-data':
						require_once "semua/table_users.php";
						break;

					case 'pbg-add':
						require_once "semua/form_add_pbg.php";
						break;

					case 'pbg-data':
						require_once "semua/table_pbgs.php";
						break;

					case 'pbg-delete':
						require_once "semua/delete_pbg.php";
						break;

					case 'supervision-add':
						require_once "semua/form_add_supervision.php";
						break;

					case 'supervision-search':
						require_once "semua/form_search_supervision.php";
						break;

					case 'supervision-data':
						require_once "semua/table_supervisions.php";
						break;

					case 'supervision-delete':
						require_once "semua/delete_supervision.php";
						break;

					case 'ref-bangunan':
						require_once "semua/table_bangunan.php";
						break;

					case 'ref-konsultasi':
						require_once "semua/table_konsultasi.php";
						break;

					case 'ref-status':
						require_once "semua/table_status.php";
						break;

					case 'bangunan-add':
						require_once "semua/form_add_bangunan.php";
						break;

					case 'konsultasi-add':
						require_once "semua/form_add_konsultasi.php";
						break;

					case 'status-add':
						require_once "semua/form_add_status.php";
						break;

					case 'jenis-delete':
						require_once "semua/delete_jenis.php";
						break;

					default:
						require_once '404.php';
						break;
				}
				?>
			</div>
		</section>
	</main>


	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<?php
	if ($_GET['p'] == 'beranda' || !$_GET['p']) {
	?>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script src="../assets/js/chart.js"></script>
	<?php
	}
	?>
	<script src="../assets/js/main.js"></script>
</body>

</html>