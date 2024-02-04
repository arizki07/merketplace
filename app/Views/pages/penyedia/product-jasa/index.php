<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> <?= $title; ?></h4>
    <?= $this->include('components/alerts') ?>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <a type="submit" class="btn btn-primary" style="float: right;" href="<?= base_url('penyedia/add-list-jasa') ?>"><i class="fas fa-plus-circle me-2" style="font-size: 18px;"></i> Tambah List Jasa</a>
                <h5>Data Pengguna Jasa</h5>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jasa</th>
                            <th>Jenis Jasa</th>
                            <th>Harga Jasa</th>
                            <th>Jumlah Take</th>
                            <th>Lokasi</th>
                            <th>No. Telepon</th>
                            <th>Testimoni Foto</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jasaData as $key => $jasa) : ?>
                            <?php if ($jasa['user_id'] == session('user_id_biodata')) : ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $jasa['nama_jasa']; ?></td>
                                    <td><?= $jasa['jenis_jasa']; ?></td>
                                    <td><?= 'Rp ' . number_format($jasa['harga_jasa'], 0, ',', '.'); ?></td>
                                    <td><?= $jasa['jumlah_foto']; ?> Take</td>
                                    <td><?= $jasa['lokasi']; ?></td>
                                    <td><?= $jasa['no_telepon']; ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/upload/testi/' . $jasa['testimoni_foto']); ?>" alt="Testimoni Foto" class="img-thumbnail" style="border-radius: 50%; width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/list-jasa/edit/' . $jasa['id_jasa']); ?>" class="btn btn-warning btn-sm rounded-pill btn-icon"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('admin/list-jasa/delete/' . $jasa['id_jasa']); ?>" class="btn btn-danger btn-sm rounded-pill btn-icon"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>