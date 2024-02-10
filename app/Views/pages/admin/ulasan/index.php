<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Data Ulasan</h4>
    <?= $this->include('components/alerts') ?>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h5>Data Ulasan</h5>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Pesanan</th>
                        <th>Jenis Pesanan</th>
                        <th>Ulasan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($ulasans as $key => $ulasan) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td>
                                <?php foreach ($users as $bio) : ?>
                                    <?php if ($ulasan['user_id'] == $bio['id_user']) : ?>
                                        <?= $bio['username'] ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                            <td>
                                <?php foreach ($pesanans as $pes) : ?>
                                    <?php foreach ($jasa as $j) : ?>
                                        <?php if ($pes['id_pemesanan'] == $ulasan['pemesanan_id']) : ?>
                                            <?php if ($j['id_jasa'] == $pes['jasa_id']) : ?>
                                                <?= $j['nama_jasa'] ?>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            </td>
                            <td>
                                <?php foreach ($pesanans as $pes) : ?>
                                    <?php foreach ($jasa as $j) : ?>
                                        <?php if ($pes['id_pemesanan'] == $ulasan['pemesanan_id']) : ?>
                                            <?php if ($j['id_jasa'] == $pes['jasa_id']) : ?>
                                                <?= $j['jenis_jasa'] ?>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            </td>
                            <td><?= $ulasan['ulasan'] ?? 'N/A'; ?></td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm rounded-pill btn-icon" data-bs-toggle="modal" data-bs-target="#delete-<?= $ulasan['id_ulasan'] ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php foreach ($ulasans as $key => $ulasan) : ?>
    <div class="modal fade" id="delete-<?= $ulasan['id_ulasan'] ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi Penghapusan Ulasan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus data ini? Data akan secara permanen dihapus dari database.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <a type="button" href="<?= base_url('admin/ulasan/delete/' . $ulasan['id_ulasan']) ?>" class="btn btn-primary">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?= $this->endSection() ?>