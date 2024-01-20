<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <a type="submit" class="btn btn-primary" style="float: right;" href="<?= base_url('admin/add-list-jasa') ?>"><i class="fas fa-plus-circle me-2" style="font-size: 18px;"></i> Tambah List Jasa</a>
                <h5>Data Pengguna Jasa</h5>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jasa</th>
                            <th>Jenis Jasa</th>
                            <th>Harga Jasa</th>
                            <th>Jumlah Foto</th>
                            <th>Lokasi</th>
                            <th>No. Telepon</th>
                            <th>Testimoni Foto</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jasaData as $key => $jasa) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $jasa['nama_jasa']; ?></td>
                                <td><?= $jasa['jenis_jasa']; ?></td>
                                <td><?= $jasa['harga_jasa']; ?></td>
                                <td><?= $jasa['jumlah_foto']; ?></td>
                                <td><?= $jasa['lokasi']; ?></td>
                                <td><?= $jasa['no_telepon']; ?></td>
                                <td>
                                    <!-- Displaying the image -->
                                    <?php if ($jasa['testimoni_foto']) : ?>
                                        <img src="<?= base_url('assets/upload/testi/' . $jasa['testimoni_foto']); ?>" alt="Testimoni Foto" class="img-thumbnail" width="100%">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/list-jasa/edit/' . $jasa['id_jasa']); ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/list-jasa/delete/' . $jasa['id_jasa']); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>