<?= $this->extend('layouts/landing/main') ?>
<?= $this->section('content') ?>

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1><?= $title; ?></h1>
                <nav class="d-flex align-items-center">
                    <a href="<?= base_url('/') ?>">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="<?= current_url() ?>"><?= $title; ?></a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<div class="container mt-3 mb-3">
    <div class="col-xl-12 col-lg-8 col-md-7">
        <!-- Start Best Seller -->
        <section class="lattest-product-area pb-40 category-list">
            <div class="row">
                <!-- single product -->
                <?php foreach ($jasa as $item) : ?>
                    <?php if ($item['jenis_jasa'] == 'Videografi') : ?>
                        <div class="col-lg-4 col-md-6 mx-auto">
                            <div class="single-product">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('assets/upload/testi/' . $item['testimoni_foto']) ?>" alt="" style="max-height: 150px; width: 100%;">
                                    <a href="<?= base_url('assets/upload/testi/' . $item['testimoni_foto']) ?>" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title"><?= $item['nama_jasa'] ?> - <?= $item['jenis_jasa'] ?></h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="product-details">
                                    <a href="<?= base_url('shop/product/detail/' . $item['id_jasa']) ?>">
                                        <h6><?= $item['nama_jasa'] ?></h6>
                                    </a>
                                    <div class="price">
                                        <h6>Harga : <?= 'Rp ' . number_format($item['harga_jasa'], 0, ',', '.'); ?></h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href="<?= base_url('shop/product/detail/' . $item['id_jasa']) ?>" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Pesan</p>
                                        </a>
                                        <a href="<?= current_url() ?>" class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">Reload</p>
                                        </a>
                                        <a href="<?= base_url('shop/product/detail/' . $item['id_jasa']) ?>" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Lihat Detail</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </section>
        <!-- End Best Seller -->
    </div>
</div>


<?= $this->endSection(); ?>