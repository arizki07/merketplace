<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">Form /</span> Edit Pemesanan</h4>
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('admin/pesanan/update/' . $pesanan['id_pemesanan']); ?>" method="post">
                <!-- Add a hidden input field for the record ID -->
                <input type="hidden" class="form-control" name="user_id" value="<?= $pesanan['user_id']; ?>">
                <input type="hidden" class="form-control" name="biodata_id" value="<?= $pesanan['biodata_id']; ?>">
                <input type="hidden" class="form-control" name="jasa_id" value="<?= $pesanan['jasa_id']; ?>">

                <div class="form-group mb-3">
                    <label for="alamat_pemesanan">Alamat Pemesanan</label>
                    <input type="text" class="form-control" name="alamat_pemesanan" value="<?= $pesanan['alamat_pemesanan']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                    <input type="date" class="form-control" name="tanggal_pelaksanaan" value="<?= $pesanan['tanggal_pelaksanaan']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="no_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_telepon" value="<?= $pesanan['no_telepon']; ?>" required>
                </div>
                <!-- ... Add input fields for other columns ... -->

                <!-- Form submission button -->
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('admin/pesanan') ?>" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>