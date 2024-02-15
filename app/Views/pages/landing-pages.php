<?= $this->extend('layouts/landing/main') ?>
<?= $this->section('content') ?>

<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <!-- <div class="active-banner-slider owl-carousel"> -->
                <!-- single-slide -->
                <div class="row align-items-center d-flex">
                    <div class="col-lg-5 col-md-6">
                        <div class="banner-content">
                            <h1>Layanan Fotografi <br>& Videografi</h1>
                            <p>Temukan keindahan menangkap momen dengan layanan fotografi dan videografi profesional kami. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <div class="add-bag d-flex align-items-center">
                                <a class="add-btn" href="" data-toggle="modal" data-target="#tatacara"><span class="ti-shopping-cart"></span></a>
                                <span class="add-text text-uppercase">Cara Pemesanan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner-img">
                            <!-- <img class="img-fluid" src="<?= base_url() ?>landing/img/banner/images.jpg" alt=""> -->
                        </div>
                    </div>
                </div>
                <!-- single-slide -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- start features Area -->
<section class="features-area section_gap">
    <div class="container">
        <div class="row features-inner">
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="<?= base_url() ?>landing/img/features/f-icon1.png" alt="">
                    </div>
                    <h6>Midtrans Payment</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="<?= base_url() ?>landing/img/features/f-icon2.png" alt="">
                    </div>
                    <h6>Return Policy</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="<?= base_url() ?>landing/img/features/f-icon3.png" alt="">
                    </div>
                    <h6>24/7 Support</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="<?= base_url() ?>landing/img/features/f-icon4.png" alt="">
                    </div>
                    <h6>Secure Payment</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end features Area -->

<!-- Start category Area -->
<section class="category-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="<?= base_url() ?>landing/img/category/foto2.jpg" alt="">
                            <a href="<?= base_url() ?>landing/img/category/foto2.jpg" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sneaker for Sports</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="<?= base_url() ?>landing/img/category/foto1.jpg" alt="">
                            <a href="<?= base_url() ?>landing/img/category/foto1.jpg" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sneaker for Sports</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="<?= base_url() ?>landing/img/category/foto5.jpg" alt="">
                            <a href="<?= base_url() ?>landing/img/category/foto5.jpg" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Product for Couple</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="<?= base_url() ?>landing/img/category/foto4.jpg" alt="">
                            <a href="<?= base_url() ?>landing/img/category/foto4.jpg" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sneaker for Sports</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-deal">
                    <div class="overlay"></div>
                    <img class="img-fluid w-100" src="<?= base_url() ?>landing/img/category/foto3.jpg" alt="">
                    <a href="<?= base_url() ?>landing/img/category/c5.jpg" class="img-pop-up" target="_blank">
                        <div class="deal-details">
                            <h6 class="deal-title">Sneaker for Sports</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End category Area -->
<?php $this->endSection() ?>

<?php $this->section('scripts') ?>
<style>
    .modal-dialog {
        max-height: 700px;
        overflow: auto;
    }
</style>
<div class="modal fade" id="tatacara" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cara Pemesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr class="text-center">
                                <th colspan="2">Register Akun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ol>
                                        <li>Daftar dengan klik icon user atu klik <a href="<?= base_url('register') ?>" class="text-warning">Disini</a></li>
                                        <li>Isi nama lengkap, email dan password</li>
                                        <li>Pastikan E-mail anda aktif</li>
                                        <li>Verifikasi email anda dengan memasukkan kode OTP yang terkirim melalui email</li>
                                        <li>Jika OTP berhasil, akun anda siap dipakai untuk pemesanan dan transaksi</li>
                                    </ol>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr class="text-center">
                                <th colspan="2">Cara Pemesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ol>
                                        <li>Pastikan anda sudah login sebelum melakukan transaksi, anda bisa login dengan mengklik <a href="<?= base_url('login') ?>" class="text-warning">Disini</a></li>
                                        <li>Jika sudah berhasil login, anda masuk kehalaman shop dan pilih jasa fotografi atau videografi</li>
                                        <li>Klik icon cart/keranjang pada jasa yang ingin anda pesan, lalu anda akan dialihkan ke tampilan detail jasa pemesanan fotografi atau videografi sesuai dengan yang anda pilih</li>
                                        <li>Jika pada form biodata masih kosong atau tidak ada biodata anda yang tercantum, maka anda diwajibkan untuk mengisi biodata secara lengkap terlebih dahulu.</li>
                                        <li><span class="text-danger">Noted:</span> <i>Jika anda sudah pernah mengisi biodata sebelumnya, biodata anda akan muncul secara otomatis tanpa perlu mengisi biodata lagi</i></li>
                                        <li>Anda juga wajib mengisi form tanggal pelaksanaan dan alamat pelaksanaan sebagai informasi tempat dan waktu pemesanan</li>
                                        <li>Setelah semua data sudah terisi, selanjutnya klik button pesan sekarang untuk dialihkan ke proses berikutnya</li>
                                        <li>Setelah anda sudah dialihkan kehalaman berikutnya, maka akan muncul detail pembayaran yang harus anda bayar dengan cara klik Lakukan Pembayaran</li>
                                        <li>Maka akan muncul tampilan pembayaran, dan pilih metode pembayaran yang ingin anda pakai QRIS/BANK/Kredit Card dan lain-lain</li>
                                        <li>Setelah anda melakukan pembayaran, tunggu sistem memproses dengan waktu maksimal 1 menit, jika berhasil maka anda akan dialihkan ke halaman hystori untuk melihat proses transaksi berhasil</li>
                                    </ol>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn primary-btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>