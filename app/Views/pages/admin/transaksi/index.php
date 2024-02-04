<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container mt-5">
    <?= $this->include('components/alerts') ?>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h4>Data Transaksi Pembayaran</h4>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Order</th>
                        <th>Jumlah Transaksi</th>
                        <th>Metode Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaksis as $key => $transaksi) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td>
                                <?php foreach ($users as $key => $u) : ?>
                                    <?php if ($u['id_user'] == $transaksi['user_id']) : ?>
                                        <?= $u['username'] ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                            <td>ID-<?= $transaksi['order_id'] ?></td>
                            <td>Rp <?= number_format($transaksi['jumlah_transaksi'], 0, ',', '.'); ?></td>
                            <td><?= $transaksi['metode_pembayaran'] ?></td>
                            <td>
                                <?php if ($transaksi['status_pembayaran'] == 'Success') : ?>
                                    <span class="badge bg-label-success">
                                        <?= $transaksi['status_pembayaran'] ?>
                                    </span>
                                <?php elseif ($transaksi['status_pembayaran'] == 'Pending') : ?>
                                    <span class="badge bg-label-warning">
                                        <?= $transaksi['status_pembayaran'] ?>
                                    </span>
                                <?php else : ?>
                                    <span class="badge bg-label-danger">
                                        <?= $transaksi['status_pembayaran'] ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm rounded-pill btn-icon" data-bs-toggle="modal" data-bs-target="#delete-<?= $transaksi['id_transaksi'] ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php foreach ($transaksis as $key => $transaksi) : ?>
    <div class="modal fade" id="delete-<?= $transaksi['id_transaksi'] ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi Penghapusan Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus data ini? Data akan secara permanen dihapus dari database.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <a type="button" href="<?= base_url('admin/transaksi/delete/' . $transaksi['id_transaksi']) ?>" class="btn btn-primary">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?= $this->endSection() ?>