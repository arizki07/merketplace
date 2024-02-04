<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container mt-5">
    <?= $this->include('components/alerts') ?>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h4>Data Riwayat Pemesanan</h4>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Penyedia Jasa</th>
                        <th>Alamat Pemesanan</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>No Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($pesanan as $key => $row) : ?>
                        <?php if ($row['user_id'] == session('user_id_biodata')) : ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td>
                                    <?php foreach ($biodata as $bio) : ?>
                                        <?php if ($row['biodata_id'] == $bio['id_biodata']) : ?>
                                            <?= $bio['nama_lengkap'] ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td>
                                    <?php foreach ($jasa as $key => $jas) : ?>
                                        <?php if ($jas['id_jasa'] == $row['jasa_id']) : ?>
                                            <?php foreach ($biodata as $key => $bio) : ?>
                                                <?php if ($bio['id_biodata'] == $jas['biodata_id']) : ?>
                                                    <?= $bio['nama_lengkap'] ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td><?= $row['alamat_pemesanan'] ?></td>
                                <td><?= date('d F Y', strtotime($row['tanggal_pelaksanaan'])); ?></td>
                                <td><?= $row['no_telepon'] ?></td>
                                <td>
                                    <?php foreach ($transaksi as $pes) : ?>
                                        <?php if ($pes['created_at'] == $row['created_at']) : ?>
                                            <?php if ($pes['status_pembayaran'] == 'Success') : ?>
                                                <span class="badge bg-label-success">
                                                    <?= $pes['status_pembayaran'] ?>
                                                </span>
                                            <?php elseif ($pes['status_pembayaran'] == 'Pending') : ?>
                                                <span class="badge bg-label-warning">
                                                    <?= $pes['status_pembayaran'] ?>
                                                </span>
                                            <?php else : ?>
                                                <span class="badge bg-label-danger">
                                                    <?= $pes['status_pembayaran'] ?>
                                                </span>
                                            <?php endif; ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#view-<?= $row['id_pemesanan'] ?>" class="btn btn-primary btn-sm rounded-pill btn-icon"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php foreach ($pesanan as $key => $row) : ?>
    <div class="modal fade" id="view-<?= $row['id_pemesanan'] ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">View Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <!-- PEMESANAN VIEW -->
                            <tr>
                                <th colspan="2" class="text-center bg-light">Pemesanan</th>
                            </tr>
                            <tr>
                                <th>Penyedia Jasa</th>
                                <td>
                                    <?php foreach ($jasa as $jas) : ?>
                                        <?php if ($row['jasa_id'] == $jas['id_jasa']) : ?>
                                            <?= $jas['nama_jasa'] ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Customer</th>
                                <td>
                                    <?php foreach ($biodata as $bio) : ?>
                                        <?php if ($row['biodata_id'] == $bio['id_biodata']) : ?>
                                            <?= $bio['nama_lengkap'] ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Pelaksanaan</th>
                                <td><?= $row['tanggal_pelaksanaan'] ?></td>
                            </tr>
                            <tr>
                                <th>Kontak Customer</th>
                                <td><?= $row['no_telepon'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat Pelaksanaan</th>
                                <td><?= $row['alamat_pemesanan'] ?></td>
                            </tr>

                            <!-- TRANSAKSI VIEW -->
                            <tr>
                                <th colspan="2" class="text-center bg-light">Detail Transaksi</th>
                            </tr>

                            <?php foreach ($transaksi as $t) : ?>
                                <?php if ($row['id_pemesanan'] == $t['pemesanan_id']) : ?>
                                    <tr>
                                        <th>Nomor Order</th>
                                        <td>
                                            ID-<?= $t['order_id'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Pembayaran</th>
                                        <td>
                                            Rp <?= number_format($t['jumlah_transaksi'], 0, ',', '.'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Metode Pembayaran</th>
                                        <td>
                                            <?= $t['metode_pembayaran'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status Pembayaran</th>
                                        <td>
                                            <?php if ($t['status_pembayaran'] == 'Success') : ?>
                                                <span class="badge bg-label-success">
                                                    <?= $t['status_pembayaran'] ?>
                                                </span>
                                            <?php elseif ($t['status_pembayaran'] == 'Pending') : ?>
                                                <span class="badge bg-label-warning">
                                                    <?= $t['status_pembayaran'] ?>
                                                </span>
                                            <?php else : ?>
                                                <span class="badge bg-label-danger">
                                                    <?= $t['status_pembayaran'] ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pembayaran</th>
                                        <td>
                                            <?= date('l, d M Y', strtotime($t['created_at'])) ?> , <?= date('H:i', strtotime($t['created_at'])) ?> WIB
                                        </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection() ?>