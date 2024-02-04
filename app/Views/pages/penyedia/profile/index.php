<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light"><?= $title ?> /</span>
        <?= session()->get('username') ?>
    </h4>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="../../assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top" />
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="../../assets/img/avatars/14.png" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4><?= $biodata['nama_lengkap'] ?? 'N/A' ?></h4>
                                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item"><i class="ti ti-camera"></i> Fotografer</li>
                                    <li class="list-inline-item"><i class="ti ti-map-pin"></i> Indonesia</li>
                                    <li class="list-inline-item"><i class="ti ti-id"></i>
                                        <?php
                                        $tanggal_lahir = isset($biodata['tanggal_lahir']) ? $biodata['tanggal_lahir'] : null;
                                        echo $tanggal_lahir ? strftime('%e %B %Y', strtotime($tanggal_lahir)) : 'N/A';
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <a href="<?= base_url('penyedia/profile/edit/' . session('user_id_biodata')) ?>" class="btn btn-primary">
                                <i class="ti ti-user-check me-1"></i>Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="card-text text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-user"></i><span class="fw-bold mx-2">Nama Lengkap:</span>
                            <span><?= $biodata['nama_lengkap'] ?? 'N/A' ?></span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-check"></i><span class="fw-bold mx-2">Status:</span>
                            <span>
                                <?php if ($biodata['status'] == 0) : ?>
                                    <span class="badge bg-label-danger">Waiting Verification</span>
                                <?php else : ?>
                                    <span class="badge bg-label-success">Verificated</span>
                                <?php endif ?>
                            </span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-crown"></i><span class="fw-bold mx-2">Role:</span>
                            <span><?= $biodata['role'] ?? 'N/A' ?></span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-id"></i><span class="fw-bold mx-2">NIK:</span>
                            <?= $biodata['nomor_ktp'] ?? 'N/A' ?>
                        </li>
                    </ul>
                    <small class="card-text text-uppercase">Contact</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">No. Handphone:</span>
                            <?= $biodata['no_telepon'] ?? 'N/A' ?>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span>
                            <span><?= $biodata['email'] ?? 'N/A' ?></span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-mail"></i><span class="fw-bold mx-2">Alamat:</span>
                            <span><?= $biodata['alamat'] ?? 'N/A' ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
        </div>
        <div class="col-xl-8 col-lg-7 col-md-7">
            <!-- Foto KTP -->
            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <small class="card-text text-uppercase">Foto KTP</small>
                </div>
                <div class="card-body">
                    <img src="<?= base_url('assets/upload/ktp/' . $biodata['foto_ktp']); ?>" alt="Testimoni Foto" class="img-thumbnail w-100 h-100" width="100%" style="max-height: 318px;">
                </div>
            </div>
            <!-- Foto KTP -->
        </div>
    </div>
</div>

<?= $this->endsection() ?>