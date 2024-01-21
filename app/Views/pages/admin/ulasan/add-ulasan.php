<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Data Ulasan</h4>
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('admin/ulasan/store') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label" for="user_id">User</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option value="">-- Pilih User --</option>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?= $user['id_user']; ?>"><?= $user['username']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="pesanan_id">Pesanan</label>
                    <select class="form-select" id="pesanan_id" name="pesanan_id" required>
                        <option value="">-- Pilih Pesanan --</option>
                        <?php foreach ($pesanans as $pesanan) : ?>
                            <option value="<?= $pesanan->id_pemesanan; ?>"><?= $pesanan->nama_jasa; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>

                <div class="mb-3">
                    <label class="form-label" for="ulasan">Ulasan</label>
                    <input type="text" class="form-control" id="ulasan" name="ulasan" placeholder="Enter your ulasan" required />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>