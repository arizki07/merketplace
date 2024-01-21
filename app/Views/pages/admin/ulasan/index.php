<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Data Ulasan</h4>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <a type="submit" class="btn btn-primary" style="float: right;" href="<?= base_url('admin/create-ulasan') ?>"><i class="fas fa-plus-circle me-2" style="font-size: 18px;"></i> Tambah Ulasan</a>
                <h5>Data Ulasan</h5>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Pesanan</th>
                        <th>Ulasan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ulasans as $key => $ulasan) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $ulasan['user_id'];
                                ?></td>
                            <td><?= $ulasan['pesanan_id'];
                                ?></td>
                            <td><?= $ulasan['ulasan'];
                                ?></td>
                            <td>
                                <a href="<?= base_url('ulasan/edit/' . $ulasan['id_ulasan']); ?>" class="btn btn-warning">Edit</a>
                                <a href="<?= base_url('ulasan/delete/' . $ulasan['id_ulasan']); ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>