<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
    <?= $this->include('components/alerts') ?>
    <div class="row g-4">
        <?php foreach ($jasaModel as $item) : ?>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mx-auto my-3">
                            <img src="<?= base_url('assets/upload/testi/' . $item['testimoni_foto']); ?>" alt="Avatar Image" class="rounded-circle w-px-100 h-px-100" />
                        </div>
                        <h4 class="mb-1 card-title"><?= $item['nama_jasa'] ?></h4>
                        <span class="pb-1"><?= $item['jenis_jasa'] ?></span>
                        <div class="d-flex align-items-center justify-content-center my-3 gap-2">
                            <a href="javascript:;"><span class="badge bg-label-warning">Rp. <?= $item['harga_jasa'] ?></span></a>
                        </div>

                        <div class="my-3 py-1">
                            <ul class="list-unstyled mb-4 mt-3">
                                <li class="d-flex align-items-center mb-3">
                                    <i class="ti ti-user"></i><span class="fw-bold mx-2">Nama Jasa :</span> <span><?= $item['nama_jasa'] ?></span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="ti ti-check"></i><span class="fw-bold mx-2">Jenis Jasa :</span> <span><?= $item['jenis_jasa'] ?></span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="ti ti-crown"></i><span class="fw-bold mx-2">Harga Jasa :</span> <span>Rp <?= $item['harga_jasa'] ?></span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="ti ti-file-description"></i><span class="fw-bold mx-2">Contact :</span>
                                    <span><?= $item['no_telepon'] ?></span>
                                </li>
                                <li class="timeline-item timeline-item-transparent border-0 mt-3">
                                    <span class="timeline-point timeline-point-info"></span>
                                    <div class="timeline-event">
                                        <div class="timeline-header">
                                            <h6 class="mb-0">Alamat Jasa</h6>
                                        </div>
                                        <p class="mb-0 mt-2"><?= $item['lokasi'] ?></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="#" class="btn btn-primary d-flex align-items-center me-3" data-bs-toggle="modal" data-bs-target="#pesan-<?= $item['id_jasa'] ?>"><i class="fa-solid fa-cart-shopping me-2"></i>Pesan Sekarang</a>
                            <!-- <a href="javascript:;" class="btn btn-label-secondary btn-icon"><i class="fa-brands fa-whatsapp" style="font-size: 20px;"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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
                                                <span class="fw-semibold">Rp <?= $item['harga_jasa'] ?></span>
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
                                                <span class="fw-semibold">Rp <?= $item['harga_jasa'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4">Detail Informasi Pemesanan</h4>
                    <form action="<?= base_url('admin/payment/' . $item['id_jasa'] . '/' .  $item['nama_jasa'] . '/' . $item['jenis_jasa']) ?>" method="POST">

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
                            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endsection() ?>