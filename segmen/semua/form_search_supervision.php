<!-- Breadcrumbs -->
<div class="row">
    <div class="col-12">
        <div class="breadcrumbs">
            <ul class="breadcrumb-nav">
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

    <h1>Tes</h1>
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