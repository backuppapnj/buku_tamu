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
                        <a href="/admin" class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Dashboard</span>
                            </span>
                        </a>
                        <a href="/admin/tamu" class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Tamu</span>
                            </span>
                        </a>
                        <a href="/admin/pengunjung" class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Pengunjung</span>
                            </span>
                        </a>
                        <a href="/admin/laporan" class="menu-item here show menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Laporan</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    .chart-container {
        position: relative;
        height: 350px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl mt-5" id="kt_content_container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0">Laporan Kunjungan</h2>
            <p class="text-muted mb-0">Statistik dan data kunjungan</p>
        </div>
    </div>

    <!-- Filter -->
    <div class="card card-flush shadow-sm mb-5">
        <div class="card-body">
            <form method="get" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label for="bulan" class="form-label fw-bold">Bulan</label>
                    <select name="bulan" id="bulan" class="form-select form-select-solid">
                        <?php
                        $bulanList = [
                            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                        ];
                        foreach ($bulanList as $key => $nama):
                        ?>
                            <option value="<?= $key ?>" <?= $bulan == $key ? 'selected' : '' ?>>
                                <?= $nama ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="tahun" class="form-label fw-bold">Tahun</label>
                    <select name="tahun" id="tahun" class="form-select form-select-solid">
                        <?php for ($t = date('Y'); $t >= 2021; $t--): ?>
                            <option value="<?= $t ?>" <?= $tahun == $t ? 'selected' : '' ?>>
                                <?= $t ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span class="path2"></span></i> Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Chart -->
    <div class="card card-flush shadow-sm mb-5">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Grafik Kunjungan Tahun <?= esc($tahun) ?></span>
            </h3>
        </div>
        <div class="card-body pt-0">
            <div class="chart-container">
                <canvas id="kunjunganChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="card card-flush shadow-sm">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Data <?= $bulanList[$bulan] ?> <?= $tahun ?></span>
            </h3>
            <div class="card-toolbar">
                <span class="badge py-3 px-4 fs-7 badge-light-primary"><?= count($dataLaporan) ?> data</span>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_laporan">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-50px">#</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Nama</th>
                            <th>Instansi/Alamat</th>
                            <th>Tujuan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <?php if (empty($dataLaporan)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    Tidak ada data untuk periode ini
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1; foreach ($dataLaporan as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <div class="text-gray-800 fw-bold"><?= date('d/m/Y', strtotime($row['tanggal'])) ?></div>
                                        <div class="text-muted"><?= date('H:i', strtotime($row['tanggal'])) ?></div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-<?= $row['jenis_tamu'] === 'pengunjung' ? 'primary' : 'success' ?>">
                                            <?= ucfirst($row['jenis_tamu']) ?>
                                        </span>
                                    </td>
                                    <td class="text-gray-800 fw-bold"><?= esc($row['nama']) ?></td>
                                    <td>
                                        <?= esc($row['jenis_tamu'] === 'tamu' ? ($row['instansi'] ?? '-') : ($row['alamat'] ?? '-')) ?>
                                    </td>
                                    <td>
                                        <span class="d-inline-block text-truncate" style="max-width: 150px;" title="<?= esc($row['tujuan']) ?>">
                                            <?= esc($row['tujuan'] ?? '-') ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof $ !== 'undefined' && $.fn.DataTable) {
            $('#kt_table_laporan').DataTable({
                "info": true,
                "order": [],
                "pageLength": 10,
                "paging": true,
                "searching": true,
                "language": {
                    "lengthMenu": "Tampilkan _MENU_",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "search": "Cari:",
                    "emptyTable": "Tidak ada data tersedia",
                    "zeroRecords": "Tidak ada data yang cocok"
                }
            });
        }

        // Fetch chart data
        fetch('/admin/chart?tahun=<?= $tahun ?>')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('kunjunganChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [
                            {
                                label: 'Pengunjung',
                                data: data.pengunjung,
                                backgroundColor: 'rgba(37, 99, 235, 0.8)',
                                borderColor: 'rgba(37, 99, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Tamu',
                                data: data.tamu,
                                backgroundColor: 'rgba(22, 163, 74, 0.8)',
                                borderColor: 'rgba(22, 163, 74, 1)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    }
                });
            });
    });
</script>
<?= $this->endSection() ?>