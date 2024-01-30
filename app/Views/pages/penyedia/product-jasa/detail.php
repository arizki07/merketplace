<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container-p-y mt-3">
    <div class="card">
        <!-- Pricing Plans -->
        <div class="pb-sm-5 pb-2 rounded-top">
            <div class="container py-5">
                <h2 class="text-center mb-2 mt-0 mt-md-4">Produk Jasa</h2>
                <p class="text-center">
                    Silahkan pilih produk jasa yang anda minati, lalu pesan dan lakukan pembayaran.
                </p>
                <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 pb-5 pt-3 mb-0 mb-md-4">
                    <label class="switch switch-primary ms-3 ms-sm-0 mt-2">
                        <span class="switch-label">Videografi</span>
                        <input type="checkbox" class="switch-input price-duration-toggler" checked />
                        <span class="switch-toggle-slider">
                            <span class="switch-on"></span>
                            <span class="switch-off"></span>
                        </span>
                        <span class="switch-label">Fotografi</span>
                    </label>
                </div>

                <div class="row mx-0 gy-3 px-lg-5">

                    <!-- Pro -->
                    <?php foreach ($jasaModel as $item) : ?>
                        <div class="col-lg-6 mb-md-0 mb-4 mx-auto">
                            <div class="card border-primary border shadow-none">
                                <div class="card-body position-relative">
                                    <div class="position-absolute end-0 me-4 top-0 mt-4">
                                        <span class="badge bg-label-primary"><?= $item['jenis_jasa'] ?></span>
                                    </div>
                                    <div class="my-3 pt-2 text-center">
                                        <img src="<?= base_url('assets/upload/testi/' . $item['testimoni_foto']); ?>" alt="Standard Image" class="rounded-circle w-px-100 h-px-100" />
                                    </div>
                                    <h3 class="card-title fw-semibold text-center text-capitalize mb-1"><?= $item['nama_jasa'] ?></h3>
                                    <p class="text-center"><?= $item['lokasi'] ?></p>
                                    <div class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary">Rp</sup>
                                            <h1 class="price-toggle price-yearly fw-semibold display-4 text-primary mb-0"><?= number_format($item['harga_jasa'], 0, ',', '.'); ?></h1>
                                            <sub class="h6 text-muted pricing-duration mt-auto mb-2 fw-normal">/<?= $item['jumlah_foto'] ?> Foto</sub>
                                        </div>
                                        <small class="price-yearly price-yearly-toggle text-muted">Pemilik Jasa :
                                            <?php foreach ($biodata as $key => $bio) : ?>
                                                <?php if ($bio['id_biodata'] == $item['biodata_id']) : ?>
                                                    <?= $bio['nama_lengkap'] ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </small>
                                    </div>

                                    <ul class="ps-3 my-4 pt-2">
                                        <li class="mb-2">Email :
                                            <?php foreach ($user as $key => $u) : ?>
                                                <?php if ($u['id_user'] == $item['user_id']) : ?>
                                                    <?= $u['email'] ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </li>
                                        <li class="mb-2">Whatsapp : <?= $item['no_telepon'] ?></li>
                                        <li class="mb-0">Jenis Jasa : <?= $item['jenis_jasa'] ?></li>
                                    </ul>

                                    <a href="#" data-bs-toggle="modal" data-bs-target="#pesan-<?= $item['id_jasa'] ?>" class="btn btn-primary w-100"><i class="ti ti-shopping-cart ti-xs me-1"></i>Pesan Sekarang</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
        <!--/ Pricing Plans -->
    </div>
</div>


<?php foreach ($jasaModel as $item) : ?>
    <div class="modal fade" id="pesan-<?= $item['id_jasa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pemesanan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-lg-12 col-12 mb-lg-0 mb-4">
                        <div class="card invoice-preview-card">
                            <div class="card-body">
                                <div class="row m-sm-4 m-0">
                                    <div class="col-md-6 mb-md-0 mb-4 ps-0">
                                        <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                            <img src="<?= base_url('assets/upload/testi/' . $item['testimoni_foto']); ?>" alt="Avatar Image" class="rounded-circle w-px-100 h-px-100" />
                                            <span class="app-brand-text fw-bold fs-4"> <?= $item['nama_jasa'] ?> </span>
                                        </div>
                                        <p class="mb-2"><?= $item['lokasi'] ?></p>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end">
                                        <div class="invoice-calculations">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="w-px-100">Subtotal:</span>
                                                <span class="fw-semibold">Rp <?= number_format($item['harga_jasa'], 0, ',', '.'); ?></span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="w-px-100">Discount:</span>
                                                <span class="fw-semibold">Rp 0</span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="w-px-100">Tax:</span>
                                                <span class="fw-semibold">Rp 0</span>
                                            </div>
                                            <hr />
                                            <div class="d-flex justify-content-between">
                                                <span class="w-px-100">Total:</span>
                                                <span class="fw-semibold">Rp <?= number_format($item['harga_jasa'], 0, ',', '.'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 shadow-lg">
                        <div class="card-body">
                            <h4 class="mb-4">Detail Informasi Pemesanan</h4>
                            <form action="<?= base_url('penyedia/payment/' . $item['id_jasa'] . '/' .  $item['nama_jasa'] . '/' . $item['jenis_jasa']) ?>" method="POST">

                                <div class="mb-3 mt-3">
                                    <label for="nama_jasa" class="form-label">Alamat Pelaksanaan</label>
                                    <textarea rows="3" type="text" name="alamat_pemesanan" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_jasa" class="form-label">Tanggal Pelaksanaan</label>
                                    <input type="date" name="tanggal_pelaksanaan" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Mulai Transaksi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endsection() ?>