<?= $this->extend('layouts/landing/main') ?>
<?= $this->section('content') ?>


<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Detail <?= $jasa['nama_jasa'] ?></h1>
                <nav class="d-flex align-items-center">
                    <a href="<?= base_url('/') ?>">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="<?= current_url() ?>"><?= $title; ?></a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="single-prd-item">
                    <img class="img-fluid" src="<?= base_url('assets/upload/testi/' . $jasa['testimoni_foto']) ?>" alt="">
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3><?= $jasa['nama_jasa'] ?></h3>
                    <h2><?= 'Rp ' . number_format($jasa['harga_jasa'], 0, ',', '.'); ?></h2>
                    <ul class="list">
                        <li>
                            <a class="active" href="#"><span>Jasa</span> :
                                <?php foreach ($biodata as $key => $bio) : ?>
                                    <?php if ($bio['id_biodata'] == $jasa['biodata_id']) : ?>
                                        <?= $bio['nama_lengkap'] ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </a>
                        </li>
                        <li>
                            <a href="#"><span>Email</span> :
                                <?php foreach ($user as $key => $u) : ?>
                                    <?php if ($u['id_user'] == $jasa['user_id']) : ?>
                                        <?= $u['email'] ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </a>
                        </li>
                        <li>
                            <a href="#"><span>Whatsapp</span> : <?= $jasa['no_telepon'] ?></a>
                        </li>

                    </ul>
                    <p><?= $jasa['lokasi'] ?></p>
                    <div class="card_area d-flex align-items-center">
                        <a class="primary-btn" href="#pesan">Pesan Sekarang</a>
                        <a class="icon_btn" href="<?= base_url('/') ?>"><i class="lnr lnr lnr-home"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="checkout_area section_gap" id="pesan">
    <div class="container">
        <div class="returning_customer">
            <?= $this->include('components/alerts') ?>
            <?php if (session('role') == 'Pengguna') : ?>
                <div class="check_title">
                    <h2>Keluar dari session login? <a href="<?= base_url('logout') ?>">Logout Disini</a> Anda harus login kembali saat ingin bertransaksi. Your email : <span class="text-primary"><?= session('email') ?></span></h2>
                </div>
                <!-- <div class="alert alert-success mt-2" role="alert">
                    Status anda sudah login
                </div> -->

                <form class="row contact_form mt-3" action="#">
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="btn btn-success" disabled>Status anda sekarang sudah login!</button>
                        <!-- <a class="lost_pass" href="#">Silahkan lakukan login untuk melanjutkan transaksi </a> -->
                    </div>
                </form>
            <?php else : ?>
                <div class="check_title">
                    <h2>Belum punya akun? <a href="<?= base_url('register') ?>">Daftar Sekarang</a> Proses tidak berlanjut saat anda belum login!</h2>
                </div>
                <p>Silahkan lakukan proses login terlebih dahulu.</p>
                <form class="row contact_form" action="<?= base_url('login-pengguna') ?>" method="post">
                    <input type="hidden" class="form-control" id="name" name="id_jasa" value="<?= $jasa['id_jasa'] ?>">
                    <div class="col-md-6 form-group p_star">
                        <input type="email" class="form-control" id="name" name="email" placeholder="Your Email">
                        <!-- <span class="placeholder" data-placeholder="Your Email"></span> -->
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Your Password Account">
                        <!-- <span class="placeholder" data-placeholder="Password"></span> -->
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn">login</button>
                        <a class="lost_pass" href="#">Silahkan lakukan login untuk melanjutkan transaksi </a>
                    </div>
                </form>
            <?php endif ?>
        </div>
        <div class="cupon_area">
            <div class="check_title">
                <h2>Isi formulir pemesanan berikut dengan lengkap</h2>
            </div>
        </div>
        <form class="row contact_form" action="<?= base_url('shop/payment/' . $jasa['id_jasa'] . '/' .  $jasa['nama_jasa'] . '/' . $jasa['jenis_jasa']) ?>" method="post" novalidate="novalidate" enctype="multipart/form-data">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <div class="col-md-12 form-group p_star">
                            <label class="mb-2">Nama Lengkap</label>
                            <input type="text" class="form-control" id="first" name="nama_lengkap" placeholder="Nama Lengkap Anda" value="<?= old('nama_lengkap', session('username') ?? 'N/A') ?>" required>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label class="mb-2">Nomor Telepon</label>
                            <input type="text" class="form-control" id="first" name="no_telepon" value="<?= old('no_telepon', session('no_telepon') ?? 'N/A') ?>" placeholder="Nomor Telepon" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="mb-2">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="company" value="<?= old('tanggal_lahir', session('tanggal_lahir') ?? 'N/A') ?>" name="tanggal_lahir" required>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label class="mb-2">Nomor KTP</label>
                            <input type="text" class="form-control" id="first" value="<?= old('nomor_ktp', session('nomor_ktp') ?? 'N/A') ?>" name="nomor_ktp" placeholder="Nomor KTP" required>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label class="mb-2">Alamat Tinggal</label>
                            <textarea class="form-control" name="alamat" id="message" rows="1" placeholder="Alamat lengkap anda"><?= old('alamat', session('alamat') ?? 'N/A') ?></textarea>
                        </div>
                        <div class="col-md-12 mt-4 form-group p_star">
                            <label class="mb-2">Foto KTP</label>
                            <input type="file" id="first" value="<?= base_url('assets/upload/ktp/' . session('foto_ktp')) ?>" name="foto_ktp" required>
                        </div>
                        <h3 class="mt-5 mb-4">Detail Pemesanan</h3>
                        <div class="col-md-12 form-group">
                            <label class="mb-2">Tanggal Pelaksanaan</label>
                            <input type="date" class="form-control" id="company" name="tanggal_pelaksanaan" value="<?= old('tanggal_pelaksanaan') ?>" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="mb-2">Alamat Pelaksanaan</label>
                            <textarea class="form-control" name="alamat_pemesanan" id="message" rows="1" placeholder="Alamat Pelaksanaan Acara"><?= old('alamat_pemesanan') ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a href="#">Product <span>Total</span></a></li>
                                <li><a href="#"><?= $jasa['jenis_jasa'] ?> <span class="middle">x 1</span> <span class="last"><?= 'Rp ' . number_format($jasa['harga_jasa'], 0, ',', '.'); ?></span></a></li>
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Total <span><?= 'Rp ' . number_format($jasa['harga_jasa'], 0, ',', '.'); ?></span></a></li>
                            </ul>
                            <!-- <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div> -->
                            <button type="submit" class="primary-btn" href="#">Proses Transaksi</a>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>
<?= $this->endSection(); ?>