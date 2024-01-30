<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Profile</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="<?= base_url('penyedia/profile/update/' . $item['id_biodata']) ?>"
                        enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Full Name</label>
                            <input type="text" name="nama_lengkap" class="form-control" id="basic-default-fullname"
                                value="<?= $item['nama_lengkap'] ?>" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Phone No</label>
                            <input type="text" name="no_telepon" id="basic-default-phone"
                                class="form-control phone-mask" value="<?= $item['no_telepon'] ?>" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="basic-default-company"
                                value="<?= $item['tanggal_lahir'] ?>" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Alamat</label>
                            <textarea name="alamat" id="basic-default-message" class="form-control"
                                required><?= $item['alamat'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">No KTP</label>
                            <input type="text" name="nomor_ktp" class="form-control" id="basic-default-company"
                                value="<?= $item['nomor_ktp'] ?>" required />
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto KTP</label>
                            <?php if (!empty($item['foto_ktp'])) : ?>
                            <img src="<?= base_url('assets/upload/ktp/' . $item['foto_ktp']) ?>" alt="Current Photo"
                                class="mb-2" style="max-width: 200px" />
                            <?php else : ?>
                            <p>No photo available</p>
                            <?php endif; ?>
                            <input name="foto_ktp" class="form-control" type="file" id="formFile" accept="image/*" />
                        </div>


                        <button type="submit" class="btn btn-primary me-1 mb-1" id="updateButton">Update</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        <a href="<?= base_url('penyedia/profile') ?>" class="btn btn-success me-1 mb-1">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>