<?= $this->extend('layouts/metronic') ?>

<?= $this->section('header') ?>
<div id="kt_header" class="header align-items-stretch">
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
                        <a href="/admin" class="menu-item here show menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Dashboard</span>
                            </span>
                        </a>
                        <a href="/admin/tamu" class="menu-item here show menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Tamu</span>
                            </span>
                        </a>
                        <a href="/admin/pengunjung" class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Pengunjung</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl mt-5" id="kt_content_container">
    <div class="card card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <h2 class="mb-0">Daftar Tamu</h2>
            </div>
            <div class="card-toolbar">
                <a href="/admin/laporan" class="btn btn-light-success">
                    Lihat Laporan
                </a>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_tamu">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-50px">#</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Instansi</th>
                            <th>No. HP</th>
                            <th>Tujuan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <?php if (empty($data)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    Belum ada data tamu
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php 
                            // Hitung nomor urut yang benar berdasarkan paginasi CI4
                            $currentPage = $pager->getCurrentPage() ?? 1;
                            $perPage = 20; // Default yang ada di controller
                            $no = 1 + (($currentPage - 1) * $perPage);
                            foreach ($data as $row): 
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <div class="text-gray-800 fw-bold"><?= date('d/m/Y', strtotime($row['tanggal'])) ?></div>
                                        <div class="text-muted"><?= date('H:i', strtotime($row['tanggal'])) ?></div>
                                    </td>
                                    <td class="text-gray-800 fw-bold"><?= esc($row['nama']) ?></td>
                                    <td><?= esc($row['instansi'] ?? '-') ?></td>
                                    <td><?= esc($row['hp'] ?? '-') ?></td>
                                    <td><?= esc($row['tujuan'] ?? '-') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <?php if ($pager): ?>
        <div class="mt-4">
            <?= $pager->links() ?>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (typeof $ !== 'undefined' && $.fn.DataTable) {
            $('#kt_table_tamu').DataTable({
                "info": false,
                "order": [],
                "pageLength": 20,
                "paging": false,
                "searching": false
            });
        }
    });
</script>
<?= $this->endSection() ?>
