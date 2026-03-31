<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="<?= \Config\Services::request()->isAJAX() ? 'container-fluid' : 'container-fluid' ?> d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-gray-900 order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">&copy; <?= date('Y') ?> Buku Tamu</span>
        </div>
        <!--end::Copyright-->
    </div>
    <!--end::Container-->
</div>
