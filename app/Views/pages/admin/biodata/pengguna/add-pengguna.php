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
                    <form method="post" action="<?= site_url('admin/create-pengguna') ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Full Name</label>
                            <input type="text" name="nama_lengkap" class="form-control" id="basic-default-fullname" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Phone No</label>
                            <input type="text" name="no_telepon" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="basic-default-company" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Alamat</label>
                            <textarea name="alamat" id="basic-default-message" class="form-control" placeholder="Isi alamat sesuai KTP" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">No KTP</label>
                            <input type="text" name="nomor_ktp" class="form-control" id="basic-default-company" placeholder="Isi Nomer KTP" required />
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto KTP</label>
                            <input name="foto_ktp" class="form-control" type="file" id="formFile" required />
                        </div>
                        <button type="submit" class="btn btn-primary me-1 mb-1" id="createButton">Send</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        <a href="<?= base_url('admin/pengguna-jasa') ?>" class="btn btn-success me-1 mb-1">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('createButton').addEventListener('click', function(event) {
        // Function to show SweetAlert2 notificatio
        function showSuccessNotification() {
            Swal.fire({
                icon: 'success',
                title: 'Form Submitted!',
                text: 'Your form has been successfully submitted.',
                showConfirmButton: false, // Hide the confirmation button
                timer: 2000, // Auto clo
            });
        }

        // Call the function to show the notification
        showSuccessNotification();
    });
</script>

<?= $this->endsection() ?>