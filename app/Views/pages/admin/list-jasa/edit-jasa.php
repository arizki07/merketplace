<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Basic Layout</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/list-jasa/update/' . $jasaData['id_jasa']) ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_jasa" class="form-label">Nama Jasa:</label>
                            <input type="text" name="nama_jasa" class="form-control" value="<?= $jasaData['nama_jasa'] ?>" required>
                        </div>
                        <?php foreach($biodata as $bio) : ?>
                                <?php if($biodata as $bio) : ?>
                                <?php endif ?>
                                <?php endforeach ?>
                        <div class="mb-3">
                            <label for="jenis_jasa" class="form-label">Jenis Jasa:</label>
                            <input type="text" name="jenis_jasa" class="form-control" value="<?= $jasaData['jenis_jasa'] ?>" required>
                        </div>`

                        <div class="mb-3">
                            <label for="harga_jasa" class="form-label">Harga Jasa:</label>
                            <input type="text" name="harga_jasa" class="form-control" value="<?= $jasaData['harga_jasa'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_foto" class="form-label">Jumlah Foto:</label>
                            <input type="text" name="jumlah_foto" class="form-control" value="<?= $jasaData['jumlah_foto'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi:</label>
                            <textarea name="lokasi" class="form-control" required><?= $jasaData['lokasi'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">No. Telepon:</label>
                            <input type="text" name="no_telepon" class="form-control" value="<?= $jasaData['no_telepon'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">testimoni Foto</label>
                            <?php if (!empty($jasaData['testimoni_foto'])) : ?>
                                <img src="<?= base_url('assets/upload/testi/' . $jasaData['testimoni_foto']) ?>" alt="Current Photo" class="mb-2" style="max-width: 200px" />
                            <?php else : ?>
                                <p>No photo available</p>
                            <?php endif; ?>
                            <input name="testimoni_foto" class="form-control" type="file" id="formFile" accept="image/*" />
                        </div>

                        <button type="submit" class="btn btn-primary">Update Jasa</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        <a href="<?= base_url('list-jasa'); ?>" class="btn btn-warning">Back to List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>