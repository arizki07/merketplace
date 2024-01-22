<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Transaksi</h4>
    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Pemesanan</th>
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
                            <td><?= $transaksi['user_id'] ?></td>
                            <td><?= $transaksi['pemesanan_id'] ?></td>
                            <td><?= $transaksi['order_id'] ?></td>
                            <td><?= $transaksi['jumlah_transaksi'] ?></td>
                            <td>$<?= $transaksi['metode_pembayaran'] ?></td>
                            <td><?= $transaksi['status_pembayaran'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/transaksi/delete/' . $transaksi['id_transaksi']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>