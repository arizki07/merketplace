<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>

    <div class="row g-4">
        <?php foreach ($users as $userData) : ?>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="dropdown btn-pinned">
                            <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical text-muted"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                            </ul>
                        </div>
                        <div class="mx-auto my-3">
                            <img src="<?= base_url() ?>assets/img/avatars/3.png" alt="Avatar Image" class="rounded-circle w-px-100" />
                        </div>
                        <h4 class="mb-1 card-title"><?= $userData['username'] ?></h4>
                        <span class="pb-1"><?= $userData['email'] ?></span>
                        <div class="d-flex align-items-center justify-content-center">
                            <?php if ($userData['status'] == 1) : ?>
                                <a href="javascript:;" class="btn btn-primary d-flex align-items-center me-3">
                                    <i class="ti-xs me-1 ti ti-user-check me-1"></i>Terverifikasi
                                </a>
                            <?php else : ?>
                                <a href="javascript:;" class="btn btn-warning d-flex align-items-center me-3">
                                    <i class="ti-xs me-1 ti ti-user-check me-1"></i>Belum Terverifikasi
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <!--/ Connection Cards -->
</div>

<?= $this->endsection() ?>