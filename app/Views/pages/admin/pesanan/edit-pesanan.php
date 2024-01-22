<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Edit</h4>
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('admin/pesanan/update/' . $pesanan['id_pemesanan']); ?>" method="post">
                <!-- Add a hidden input field for the record ID -->


                <div class="form-group">
                    <label for="user_id">User</label>
                    <select class="form-control" name="user_id" required>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?= $user['id_user']; ?>" <?= ($user['id_user'] == $pesanan['user_id']) ? 'selected' : ''; ?>>
                                <?= $user['email']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="biodata_id">Biodata</label>
                    <select class="form-control" name="biodata_id" required>
                        <?php foreach ($biodatas as $biodata) : ?>
                            <option value="<?= $biodata['id_biodata']; ?>" <?= ($biodata['id_biodata'] == $pesanan['biodata_id']) ? 'selected' : ''; ?>>
                                <?= $biodata['nama_lengkap']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Add input fields for other columns -->
                <div class="form-group">
                    <label for="jasa_id">Jasa</label>
                    <select class="form-control" name="jasa_id" required>
                        <?php foreach ($listJasas as $jasa) : ?>
                            <option value="<?= $jasa['id_jasa']; ?>" <?= ($jasa['id_jasa'] == $pesanan['jasa_id']) ? 'selected' : ''; ?>>
                                <?= $jasa['nama_jasa']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat_pemesanan">Alamat Pemesanan</label>
                    <input type="text" class="form-control" name="alamat_pemesanan" value="<?= $pesanan['alamat_pemesanan']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                    <input type="date" class="form-control" name="tanggal_pelaksanaan" value="<?= $pesanan['tanggal_pelaksanaan']; ?>" required>
                </div>

                <div class="form-group">
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