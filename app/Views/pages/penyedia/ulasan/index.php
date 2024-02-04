<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Data Ulasan</h4>
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
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($ulasans as $key => $ulasan) : ?>
                        <?php if ($ulasan['user_id'] == session('user_id_biodata')) : ?>
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
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>