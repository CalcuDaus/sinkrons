<!-- Breadcrumbs -->
<div class="row">
    <div class="col-12 p-0">
        <div class="breadcrumbs">
            <ul class="breadcrumb-nav ps-3">
                <li><a href="">Dashboard</a></li>
                <li><a href="">Pengawasan</a></li>
                <li class="text-primary">Pencarian Data Pegawasan</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<div class="box">
    <h3 class="title is-5">Form Pencarian Data Pengawasan</h3>
    <hr>

    <form action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <input type="date" class="form-control" placeholder="tanggal" name="tanggal">
                    <input name="alamat" type="text" class="form-control mt-2" placeholder="Alamat Bangunan..">
                    <input type="text" class="form-control mt-2" placeholder="Kelurahan/Desa.." name="desa">
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" placeholder="Nomor Surat.." name="nomor-surat">
                    <input type="text" class="form-control mt-2" placeholder="Penilik.." name="penilik">
                    <input type="number" class="form-control mt-2" placeholder="Teguran" name="teguran">
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" placeholder="Jenis Bangunan.." name="jenis-bangunan">
                    <input type="text" class="form-control mt-2" placeholder="Perihal.." name="perihal">
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" placeholder="Nama Pemilik.." name="nama-pemilik">
                    <input type="text" class="form-control mt-2" placeholder="Kecamatan.." name="kecamatan">
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
if ($_GET['p'] == 'supervision-search') {
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