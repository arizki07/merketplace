<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 py-5">
    <?= $this->include('components/alerts') ?>
    <?php if (session()->get('role') === 'Admin') : ?>

        <!-- View sales -->
        <div class="col-xl-12 mb-4 col-lg-5 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-0">Selamat Datang <?= session()->get('username') ?>! 🎉</h5>
                            <p class="mb-2">Total Keuangan Dari Pesanan Masuk Ke Sistem</p>
                            <h4 class="text-primary mb-1"><?= $formattedTotalJumlahTransaksi; ?></h4>
                            <a href="<?= base_url('admin/transaksi') ?>" class="btn btn-primary mt-2">View Sales</a>
                        </div>
                    </div>
                    <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="<?= base_url() ?>assets/img/illustrations/card-advance-sale.png" height="140" alt="view sales" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- View sales -->

        <!-- Statistics -->
        <div class="row">
            <!-- Statistics -->
            <div class="col-lg-8 mb-4 col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Report</h5>
                        <small class="text-muted">Marketplace Fotografi & Videografi</small>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row gy-3">
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                        <i class="ti ti-chart-pie-2 ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0"><?= $successCount; ?> Pesanan</h5>
                                        <small>Pesanan Sukses</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0"><?= $failedPendingCount; ?> Pesanan</h5>
                                        <small>Gagal/Pending</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                        <i class="ti ti-currency-dollar ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0"><?= $formattedTotalJumlahTransaksi; ?></h5>
                                        <small>Pendapatan</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="badge rounded-pill p-2 bg-label-danger mb-2">
                            <i class="ti ti-user-check ti-sm"></i>
                        </div>
                        <h5 class="card-title mb-2"><?= $penyediaCount; ?> Akun</h5>
                        <small>Penyedia Jasa</small>
                    </div>
                </div>
            </div>

            <!-- Reviews -->
            <div class="col-lg-2 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="badge rounded-pill p-2 bg-label-success mb-2">
                            <i class="ti ti-user-search ti-sm"></i>
                        </div>
                        <h5 class="card-title mb-2"><?= $penggunaCount; ?> Akun</h5>
                        <small>Pengguna Jasa</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <h5 class="card-header">Ulasan Pengguna Jasa</h5>
                <div class="card-body pb-0" style="max-height: 350px; overflow-y: auto;">
                    <?php if (empty($ulasan)) : ?>
                        <p class="text-center pb-4">-- Belum ada ulasan --</p>
                    <?php else : ?>
                        <ul class="timeline mt-3 mb-0">
                            <?php foreach ($ulasan as $item) : ?>
                                <li class="timeline-item timeline-item-primary pb-4 border-left-dashed">
                                    <span class="timeline-indicator timeline-indicator-primary">
                                        <i class="ti ti-send"></i>
                                    </span>
                                    <div class="timeline-event">
                                        <div class="timeline-header border-bottom mb-3">
                                            <h6 class="mb-0">
                                                <?php foreach ($biodata as $key => $bio) : ?>
                                                    <?php if ($bio['user_id'] == $item['user_id']) : ?>
                                                        <?= $bio['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </h6>
                                            <span class="text-muted"><?= date('d F Y', strtotime($item['created_at'])); ?> <?= date('H : i', strtotime($item['created_at'])); ?> WIB
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between flex-wrap mb-2">
                                            <div>
                                                <span>
                                                    <?php foreach ($pesanan as $key => $value) : ?>
                                                        <?php if ($value['id_pemesanan'] == $item['pemesanan_id']) : ?>
                                                            <?php foreach ($jasa as $key => $row) : ?>
                                                                <?php if ($row['id_jasa'] == $value['jasa_id']) : ?>
                                                                    Jasa <?= $row['nama_jasa'] ?>
                                                                <?php endif ?>
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </span>
                                                <i class="ti ti-arrow-right scaleX-n1-rtl mx-3"></i>
                                                <span><?= $item['ulasan'] ?></span>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pb-0 px-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-info">
                                                        <p class="my-0"></p>
                                                        <span class="text-muted"></span>
                                                    </div>
                                                    <a href="<?= base_url('admin/ulasan') ?>" class="btn btn-outline-primary btn-sm my-sm-0 my-3"><i class="ti ti-send ti-xs me-1"></i> Lihat Ulasan</a>
                                                </div>
                                                <h5 class="mb-0">
                                                    <?php foreach ($pesanan as $key => $pesan) : ?>
                                                        <?php if ($pesan['id_pemesanan'] == $item['pemesanan_id']) : ?>
                                                            <?php foreach ($transaksi as $key => $payment) : ?>
                                                                <?php if ($payment['pemesanan_id'] == $pesan['id_pemesanan']) : ?>
                                                                    <?= 'Rp ' . number_format($payment['jumlah_transaksi'], 0, ',', '.'); ?>
                                                                <?php endif ?>
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </h5>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                </div>
            </div>
        </div>

    <?php elseif (session()->get('role') === 'Penyedia') : ?>
        <div class="row">
            <?php
            $session = \Config\Services::session();
            $successMessage = $session->getFlashdata('success');
            if ($successMessage) {
                echo '<div id="successAlert" class="alert alert-success">' . $successMessage . '</div>';
                echo '
        <script>
        setTimeout(function() {
            var successAlert = document.getElementById("successAlert");
            if (successAlert) {
                successAlert.style.display = "none";
            }
            }, 5000); // 5000 milliseconds = 5 seconds
            </script>';
            }
            ?>
            <!-- View sales -->
            <div class="col-xl-4 mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Congratulations <?= session()->get('username') ?>! 🎉</h5>
                                <p class="mb-2">Best seller of the month</p>
                                <h4 class="text-primary mb-1">$48.9k</h4>
                                <a href="javascript:;" class="btn btn-primary">View Sales</a>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="<?= base_url() ?>assets/img/illustrations/card-advance-sale.png" height="140" alt="view sales" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View sales -->
        </div>
    <?php elseif (session()->get('role') === 'Pengguna') : ?>
        <div class="row">
            <?php
            $session = \Config\Services::session();
            $successMessage = $session->getFlashdata('success');
            if ($successMessage) {
                echo '<div id="successAlert" class="alert alert-success">' . $successMessage . '</div>';
                echo '
        <script>
        setTimeout(function() {
            var successAlert = document.getElementById("successAlert");
            if (successAlert) {
                successAlert.style.display = "none";
            }
            }, 5000); // 5000 milliseconds = 5 seconds
            </script>';
            }
            ?>
            <!-- View sales -->
            <div class="col-xl-4 mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Congratulations <?= session()->get('username') ?>! 🎉</h5>
                                <p class="mb-2">Best seller of the month</p>
                                <h4 class="text-primary mb-1">$48.9k</h4>
                                <a href="javascript:;" class="btn btn-primary">View Sales</a>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="<?= base_url() ?>assets/img/illustrations/card-advance-sale.png" height="140" alt="view sales" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View sales -->

            <!-- Statistics -->
            <div class="col-xl-8 mb-4 col-lg-7 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">Statistics</h5>
                            <small class="text-muted">Updated 1 month ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?= $this->endsection() ?>