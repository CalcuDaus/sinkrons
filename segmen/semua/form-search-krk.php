<!-- Breadcrumbs -->
<div class="row">
    <div class="col-12 p-0">
        <div class="breadcrumbs">
            <ul class="breadcrumb-nav ps-3">
                <li><a href="">Dashboard</a></li>
                <li><a href="">KRK</a></li>
                <li class="text-primary">Pencarian Data KRK</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<div class="">
    <h3 class="title is-5">Form Pencarian Data KRK</h3>
    <hr>

    <form action="" method="post">
        <div class="container card border-0 shadow rounded-4 p-3 ">
            <div class="row">
                <div class="col-md-6">
                    <label for="nama-pemohon">Nama Pemohon</label>
                    <input name="alamat" type="text" id="nama-pemohon" class="form-control mt-2" placeholder="..">
                    <label for="tanggal-surat">Tanggal Surat Masuk</label>
                    <input type="date" class="form-control mt-2" placeholder="tanggal" id="tanggal-surat" name="masuk">
                    <label for="tanggal-diterima">Tanggal Surat Diterima</label>
                    <input name="terima" type="date" class="form-control mt-2" id="tanggal-diterima" placeholder="..">
                    <label for="jenis-bangunan">Jenis Bangunan</label>
                    <select name="permohonan" class="form-select mt-2">
                        <?php foreach ($cmd->fetchAll("SELECT * FROM jenis WHERE jenis_kelompok='bangunan'") as $bangunan) : ?>
                            <option value="<?= $bangunan['jenis_id']; ?>"> <?= $bangunan['jenis_nama']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="perihal" class="form-label">Perihal</label>
                    <textarea name="perihal" id="perihal" class="form-control"></textarea>
                    <label for="jalan" class="form-label">Jalan</label>
                    <textarea name="jalan" id="jalan" class="form-control"></textarea>
                    <label for="desa">Desa</label>
                    <input type="text" class="form-control" name="desa">
                    <label for="desa">Kecamatan</label>
                    <input type="text" class="form-control" name="kecamatan">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary mt-2">Cari</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Active Tab -->
<?php
if ($_GET['p'] == 'krk-search') {
?>
    <script>
        document.querySelectorAll('.tab').forEach(tab => {
            tab.classList.remove('t-active', 'd-side-active');
        });
        // Tentukan tab active
        const activeTab = document.querySelectorAll('.tab')[1];
        const activeDropdown = document.querySelectorAll('.tab-dropdown')[0];
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