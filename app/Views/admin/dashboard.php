<?= $this->extend('layouts/metronic') ?>

<?= $this->section('header') ?>
<?= view('partials/header_admin') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl mt-5" id="kt_content_container">
    <div class="row g-5 g-xl-8 mb-5 mb-xl-8">
        <div class="col-xl-4">
            <!-- Widget Hari Ini -->
            <div class="card card-xl-stretch mb-xl-8 bg-light-primary">
                <div class="card-body d-flex align-items-center pt-3 pb-0">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                        <span class="fw-bold text-dark fs-4 mb-2">Hari Ini</span>
                        <span class="fw-bolder text-dark fs-1 mb-2"><?= number_format($stats['total_hari_ini']) ?></span>
                        <span class="text-muted fw-semibold fs-7">Pengunjung & Tamu</span>
                    </div>
                    <div class="symbol symbol-70px symbol-circle">
                        <span class="symbol-label bg-primary">
                            <i class="ki-duotone ki-calendar-tick fs-2x text-white"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4">
            <!-- Widget Bulan Ini -->
            <div class="card card-xl-stretch mb-xl-8 bg-light-success">
                <div class="card-body d-flex align-items-center pt-3 pb-0">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                        <span class="fw-bold text-dark fs-4 mb-2">Bulan Ini</span>
                        <span class="fw-bolder text-dark fs-1 mb-2"><?= number_format($stats['total_bulan_ini']) ?></span>
                        <span class="text-muted fw-semibold fs-7">Pengunjung & Tamu</span>
                    </div>
                    <div class="symbol symbol-70px symbol-circle">
                        <span class="symbol-label bg-success">
                            <i class="ki-duotone ki-calendar text-white fs-2x"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4">
            <!-- Widget Tahun Ini -->
            <div class="card card-xl-stretch mb-5 mb-xl-8 bg-light-info">
                <div class="card-body d-flex align-items-center pt-3 pb-0">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                        <span class="fw-bold text-dark fs-4 mb-2">Tahun Ini</span>
                        <span class="fw-bolder text-dark fs-1 mb-2"><?= number_format($stats['total_tahun_ini']) ?></span>
                        <span class="text-muted fw-semibold fs-7">Pengunjung & Tamu</span>
                    </div>
                    <div class="symbol symbol-70px symbol-circle">
                        <span class="symbol-label bg-info">
                            <i class="ki-duotone ki-time text-white fs-2x"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-5 g-xl-8">
        <div class="col-xl-6">
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Total Pengunjung</span>
                        <span class="text-muted mt-1 fw-semibold fs-7">Rangkuman pengunjung keseluruhan</span>
                    </h3>
                </div>
                <div class="card-body text-center py-15">
                    <div class="fs-4x fw-bolder text-primary mb-5"><?= number_format($stats['total_pengunjung']) ?></div>
                    <a href="/admin/pengunjung" class="btn btn-primary fw-bold px-8 py-3">Lihat Pengunjung</a>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Total Tamu</span>
                        <span class="text-muted mt-1 fw-semibold fs-7">Rangkuman tamu keseluruhan</span>
                    </h3>
                </div>
                <div class="card-body text-center py-15">
                    <div class="fs-4x fw-bolder text-success mb-5"><?= number_format($stats['total_tamu']) ?></div>
                    <a href="/admin/tamu" class="btn btn-success fw-bold px-8 py-3">Lihat Tamu</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card border-0 bg-dark text-white">
                <div class="card-body text-center py-10">
                    <h6 class="text-white-50 fs-4 mb-5">TOTAL KESELURUHAN DATA</h6>
                    <div class="fs-4x fw-bolder mb-0"><?= number_format($stats['total_semua']) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
