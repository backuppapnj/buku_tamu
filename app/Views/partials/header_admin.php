<div id="kt_header" class="header align-items-stretch">
    <!-- Header Content -->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="/admin" class="d-lg-none">
                <span class="fw-bolder fs-3 text-dark">Buku Tamu</span>
            </a>
        </div>
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
                        <a href="/admin" class="menu-item <?= current_url() == base_url('admin') ? 'here show' : '' ?> menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Dashboard</span>
                            </span>
                        </a>
                        <a href="/admin/tamu" class="menu-item <?= strpos(current_url(), '/admin/tamu') !== false ? 'here show' : '' ?> menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Tamu</span>
                            </span>
                        </a>
                        <a href="/admin/pengunjung" class="menu-item <?= strpos(current_url(), '/admin/pengunjung') !== false ? 'here show' : '' ?> menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Pengunjung</span>
                            </span>
                        </a>
                        <a href="/admin/laporan" class="menu-item <?= strpos(current_url(), '/admin/laporan') !== false ? 'here show' : '' ?> menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Laporan</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <a href="/logout" class="btn btn-sm btn-light-danger fw-bold">Keluar</a>
                </div>
            </div>
        </div>
    </div>
</div>
