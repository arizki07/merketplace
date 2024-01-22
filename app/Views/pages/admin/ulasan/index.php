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
                        <th>Ulasan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ulasans as $key => $ulasan) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $ulasan['user_id'] ?? 'N/A'; ?></td>
                            <td><?= $ulasan['pemesanan_id'] ?? 'N/A'; ?></td>
                            <td><?= $ulasan['ulasan'] ?? 'N/A'; ?></td>
                            <td>
                                <a href="<?= base_url('ulasan/delete/' . $ulasan['id_ulasan']); ?>" class="btn btn-danger btn-sm rounded-pill btn-icon"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>