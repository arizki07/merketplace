<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
    <div class="card">
        <div class="card-body">
            <div class="container mt-5">
                <?php foreach ($jasaModel as $item) : ?>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= base_url('assets/upload/testi/' . $item['testimoni_foto']); ?>" alt="Product Image" class="img-fluid rounded" style="max-width: 100%;">
                        </div>
                        <div class="col-md-6">
                            <h2 class="mb-4"><?= $item['nama_jasa']; ?></h2>
                            <p class="text-muted mb-2">Category: <?= $item['jenis_jasa']; ?></p>
                            <p class="lead mb-4">Rp.<?= $item['harga_jasa']; ?></p>
                            <!-- Add to cart button -->
                            <button class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>