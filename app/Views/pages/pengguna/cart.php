<?= $this->extend('layouts/landing/main') ?>
<?= $this->section('content') ?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Hystori Shop</h1>
                <nav class="d-flex align-items-center">
                    <a href="<?= base_url('/') ?>">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="<?= current_url() ?>">Hystori</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <?= $this->include('components/alerts') ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jasa</th>
                            <th scope="col">Metode</th>
                            <th scope="col">Status</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col" class="text-center">Ulasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($transaksi as $item) :
                            if (session('user_id_biodata') == $item['user_id']) :
                                $total += $item['jumlah_transaksi'];
                        ?>
                                <tr>
                                    <td>
                                        <h5><?= $item['order_id'] ?></h5>
                                    </td>
                                    <td>
                                        <h5>$360.00</h5>
                                    </td>
                                    <td>
                                        <h5><?= date('d M Y', strtotime($item['created_at'])) ?>
                                        </h5>
                                    </td>
                                    <td>
                                        <h5><?= $item['metode_pembayaran'] ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $item['status_pembayaran'] ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= 'Rp ' . number_format($item['jumlah_transaksi'], 0, ',', '.'); ?></h5>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#ulasan-<?= $item['id_transaksi'] ?>" class="text-warning" style="font-size: 20px;"><span class="ti-comment-alt"></span></a>
                                    </td>
                                </tr>
                        <?php endif;
                        endforeach; ?>
                        <tr>
                            <td>
                                <a class="primary-btn" href="<?= base_url('/') ?>?">Back to Home</a>
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5><?= 'Rp ' . number_format($total, 0, ',', '.'); ?></h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

<?php $this->section('scripts') ?>
<?php foreach ($transaksi as $item) : ?>
    <div class="modal fade" id="ulasan-<?= $item['id_transaksi'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form Ulasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('shop/ulasan') ?>" method="POST">
                        <div class="mb-3">
                            <input type="hidden" value="<?= session('user_id_biodata') ?>" name="user_id" required>
                            <input type="hidden" value="<?= $item['pemesanan_id'] ?>" name="pemesanan_id" required>
                            <textarea type="text" rows="4" class="form-control" placeholder="Ulasan Anda" name="ulasan" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn primary-btn" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn primary-btn">Kirim Ulasan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?php $this->endSection() ?>

<?= $this->endSection(); ?>