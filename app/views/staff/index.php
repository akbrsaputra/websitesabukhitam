<section class="home">
    <div class="text header-main shadow-sm">
        <span><i class='bx bx-home-alt'></i></span> Dashboard
    </div>
    <div class="container-fluid isi mt-5">
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <strong>Selamat Datang!</strong> Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di bawah.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <a href="<?php echo BASEURL; ?>/staff/alternatif" class="menu-dashboard">
                    <div class="container menu-dashboard bg-light d-flex justify-content-between border-start border-5 border-success rounded-1 p-4 shadow">
                        <p class="text-dashboard">Data Peserta Ujian</p>
                        <span class="icon-dashboard"><i class='bx bxs-group icon'></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="<?php echo BASEURL; ?>/staff/hasil" class="menu-dashboard">
                    <div class="container menu-dashboard bg-light d-flex justify-content-between border-start border-5 border-primary rounded-1 p-4 shadow">
                        <p class="text-dashboard">Hasil Laporan</p>
                        <span class="icon-dashboard"><i class='bx bx-bar-chart-alt'></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>