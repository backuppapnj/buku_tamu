<?= $this->extend('layouts/metronic') ?>

<?= $this->section('header') ?>
<?= view('partials/header_admin') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl mt-5" id="kt_content_container">
    <!--begin::Row-->
    <div class="row g-5 g-xl-8 mb-5 mb-xl-8">
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Card - Hari Ini-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-center pt-3 pb-0">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                        <span class="fw-semibold text-muted fs-5 mb-2">Hari Ini</span>
                        <span class="fw-bolder text-dark fs-1 mb-2"><?= number_format($stats['total_hari_ini']) ?></span>
                        <span class="text-muted fw-semibold fs-7">Pengunjung & Tamu</span>
                    </div>
                    <div class="symbol symbol-70px symbol-circle">
                        <span class="symbol-label bg-primary">
                            <i class="ki-duotone ki-calendar-tick fs-2x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </span>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Card - Bulan Ini-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-center pt-3 pb-0">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                        <span class="fw-semibold text-muted fs-5 mb-2">Bulan Ini</span>
                        <span class="fw-bolder text-dark fs-1 mb-2"><?= number_format($stats['total_bulan_ini']) ?></span>
                        <span class="text-muted fw-semibold fs-7">Pengunjung & Tamu</span>
                    </div>
                    <div class="symbol symbol-70px symbol-circle">
                        <span class="symbol-label bg-success">
                            <i class="ki-duotone ki-calendar fs-2x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Card - Tahun Ini-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-center pt-3 pb-0">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                        <span class="fw-semibold text-muted fs-5 mb-2">Tahun Ini</span>
                        <span class="fw-bolder text-dark fs-1 mb-2"><?= number_format($stats['total_tahun_ini']) ?></span>
                        <span class="text-muted fw-semibold fs-7">Pengunjung & Tamu</span>
                    </div>
                    <div class="symbol symbol-70px symbol-circle">
                        <span class="symbol-label bg-info">
                            <i class="ki-duotone ki-time fs-2x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Card - Total Pengunjung-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Total Pengunjung</span>
                        <span class="text-muted mt-1 fw-semibold fs-7">Rangkuman pengunjung keseluruhan</span>
                    </h3>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body text-center py-15">
                    <div class="fs-1 fw-bolder text-primary mb-5"><?= number_format($stats['total_pengunjung']) ?></div>
                    <a href="<?= base_url('admin/pengunjung') ?>" class="btn btn-primary fw-bold px-8 py-3">
                        <i class="ki-duotone ki-arrow-right fs-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Lihat Pengunjung
                    </a>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Card - Total Tamu-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Total Tamu</span>
                        <span class="text-muted mt-1 fw-semibold fs-7">Rangkuman tamu keseluruhan</span>
                    </h3>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body text-center py-15">
                    <div class="fs-1 fw-bolder text-success mb-5"><?= number_format($stats['total_tamu']) ?></div>
                    <a href="<?= base_url('admin/tamu') ?>" class="btn btn-success fw-bold px-8 py-3">
                        <i class="ki-duotone ki-arrow-right fs-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Lihat Tamu
                    </a>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row">
        <!--begin::Col-->
        <div class="col">
            <!--begin::Card - Total Keseluruhan-->
            <div class="card border-0 bg-primary bg-primary-active-up">
                <!--begin::Card body-->
                <div class="card-body text-center py-12">
                    <span class="text-white fw-semibold fs-4 mb-2 d-block">TOTAL KESELURUHAN DATA</span>
                    <span class="text-white fw-bolder fs-1"><?= number_format($stats['total_semua']) ?></span>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
<?= $this->endSection() ?>
