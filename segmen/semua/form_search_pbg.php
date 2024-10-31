<!-- Breadcrumbs -->
<div class="row">
    <div class="col-12 p-0">
        <div class="breadcrumbs">
            <ul class="breadcrumb-nav ps-3">
                <li><a href="">Dashboard</a></li>
                <li><a href="">PBG</a></li>
                <li class="text-primary">Pencarian Data PBG</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<div class="box">
    <h3 class="title is-5">Form Pencarian Data PBG</h3>
    <hr>

    <form action="" method="post">
        <div class="container card border-0 shadow rounded-4 p-3">
            <div class="row">
                <div class="col-md-6">
                    <label>Jenis Konsultasi:</label>
                    <select name="konsultasi" class="form-select">
                        <?php foreach ($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='konsultasi'") as $konsultasi) : ?>
                            <option value="<?= $konsultasi['jenis_id']; ?>"> <?= $konsultasi['jenis_nama']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <label>Nomor Registrasi:</label>
                    <input name="registrasi" type="date" class="form-control">
                    <label>Nama Pemilik:</label>
                    <input name="pemilik" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>No. Telepon:</label>
                    <input name="telp" type="number" class="form-control">
                    <label>Alamat Pemilik:</label>
                    <textarea name="alamat" class="form-control"></textarea>
                    <label>Alamat Bangunan:</label>
                    <textarea name="bangunan" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-2">Cari</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Active Tab -->
<?php
if ($_GET['p'] == 'pbg-search') {
?>
    <script>
        document.querySelectorAll('.tab').forEach(tab => {
            tab.classList.remove('t-active', 'd-side-active');
        });
        // Tentukan tab active
        const activeTab = document.querySelectorAll('.tab')[2];
        const activeDropdown = document.querySelectorAll('.tab-dropdown')[1];
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