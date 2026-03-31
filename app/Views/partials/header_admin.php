<div id="kt_header" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Brand-->
        <div class="d-flex align-items-center">
            <!--begin::Aside toggle-->
            <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
                <div class="btn btn-icon btn-color-white btn-active-color-primary w-30px h-30px" id="kt_aside_toggle">
                    <i class="ki-duotone ki-abstract-14 fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <!--end::Aside toggle-->
            <!--begin::Logo-->
            <a href="<?= base_url('admin') ?>" class="d-flex align-items-center">
                <span class="fw-bolder fs-3 text-white">Buku Tamu</span>
            </a>
            <!--end::Logo-->
        </div>
        <!--end::Brand-->

        <!--begin::Topbar-->
        <div class="d-flex align-items-stretch flex-shrink-0">
            <div class="d-flex align-items-center ms-1 ms-lg-3">
                <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-light-danger fw-bold">
                    <i class="ki-duotone ki-exit-left fs-3">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Keluar
                </a>
            </div>
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
