<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h5>Data Pesanan</h5>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User ID</th>
                        <th>Biodata ID</th>
                        <th>Jasa ID</th>
                        <th>Alamat Pemesanan</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>No Telepon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pesanan as $key => $row) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $row['user_id'] ?></td>
                            <td><?= $row['biodata_id'] ?></td>
                            <td><?= $row['jasa_id'] ?></td>
                            <td><?= $row['alamat_pemesanan'] ?></td>
                            <td><?= $row['tanggal_pelaksanaan'] ?></td>
                            <td><?= $row['no_telepon'] ?></td>
                            <td>
                                <a href="<?= site_url('admin/pesanan/edit/' . $row['id_pemesanan']) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?= site_url('admin/pesanan/delete/' . $row['id_pemesanan']) ?>" class="btn btn-danger"><i class="fas fa-trash "></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>