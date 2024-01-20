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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $item['id_jasa']; ?>">
                                Add to Cart
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $item['id_jasa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to add "<?= $item['nama_jasa']; ?>" to your cart?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal -->
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>
</div>

<?= $this->endsection() ?>