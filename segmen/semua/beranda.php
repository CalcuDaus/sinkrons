<!-- Breadcrumbs -->
<div class="row">
  <div class="col-12 p-0">
    <div class="breadcrumbs">
      <ul class="breadcrumb-nav ps-3">
        <li class="text-primary">Dashboard</li>
      </ul>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->
<?php
$pbg = $cheat->pbg();
$pbgChartData = json_encode($pbg);
$krk = $cheat->krk();
$krkChartData = json_encode($krk);
$supervision = $cheat->awas();
$supervisionChartData = json_encode($supervision);
$user = $cheat->akun();
$userChartData = json_encode($user);
?>
<!-- Card Section -->
<div class="row">
  <div class="col-12 d-flex gap-5 justify-content-center">
    <div
      class="card border-0 shadow rounded-4 p-3 d-flex flex-column align-items-center"
      style="width: 156px">
      <p>Pengguna</p>
      <h2 class="fw-bold"><?= $user['all']; ?></h2>
    </div>
    <div
      class="card border-0 shadow rounded-4 p-3 d-flex flex-column align-items-center"
      style="width: 156px">
      <p>PBG</p>
      <h2 class="fw-bold"><?= $pbg['all']; ?></h2>
    </div>
    <div
      class="card border-0 shadow rounded-4 p-3 d-flex flex-column align-items-center"
      style="width: 156px">
      <p>KRK</p>
      <h2 class="fw-bold"><?= $krk['all']; ?></h2>
    </div>
    <div
      class="card border-0 shadow rounded-4 p-3 d-flex flex-column align-items-center"
      style="width: 156px">
      <p>Pengawasan</p>
      <h2 class="fw-bold"><?= $supervision['all']; ?></h2>
    </div>
  </div>
</div>
<!-- End Card Section -->
<!-- Chart Section -->
<div class="container">
  <div class="row">
    <div class="col-md-6 d-flex justify-content-center">
      <div
        class="card border-0 mt-4 rounded-4 p-3 shadow d-flex  align-items-center"
        style="width: 800px; height: fit-content">
        <h3>Data PBG</h3>
        <canvas id="chartPBG"></canvas>
        <a href="?p=pbg-data" class="btn btn-primary btn-sm align-self-start mt-2 rounded-3">Lihat Data</a>
      </div>
    </div>
    <div class="col-md-6 d-flex justify-content-center">
      <div
        class="card border-0 mt-4 rounded-4 p-3 shadow d-flex justify-content-center align-items-center"
        style="width: 800px; height: fit-content">
        <h3>Data KRK</h3>
        <canvas id="chartKRK"></canvas>
        <a href="?p=krk-data" class="btn btn-primary btn-sm align-self-start mt-2 rounded-3">Lihat Data</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 d-flex justify-content-center">
      <div
        class="card border-0 mt-4 rounded-4 p-3 shadow d-flex justify-content-center align-items-center"
        style="width: 800px; height: fit-content">
        <h3>Data Pengawasan</h3>
        <canvas id="chartPengawasan"></canvas>
        <a href="?p=supervision-data" class="btn btn-primary btn-sm align-self-start mt-2 rounded-3">Lihat Data</a>
      </div>
    </div>
    <div class="col-md-6 d-flex justify-content-center">
      <div
        class="card border-0 mt-4 rounded-4 p-3 shadow d-flex justify-content-center align-items-center"
        style="width: 800px; height: fit-content">
        <h3>Data Pengguna</h3>
        <canvas id="chartPengguna"></canvas>
        <a href="?p=user-data" class="btn btn-primary btn-sm align-self-start mt-2 rounded-3">Lihat Data</a>
      </div>
    </div>
  </div>
</div>
<!-- End Chart Section -->

<script>
  const pbgData = <?= $pbgChartData; ?>;
  const krkData = <?= $krkChartData; ?>;
  const supervisionData = <?= $supervisionChartData; ?>;
  const userData = <?= $userChartData; ?>;
</script>