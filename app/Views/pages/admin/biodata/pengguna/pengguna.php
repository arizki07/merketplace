<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4> -->
    <?= $this->include('components/alerts') ?>
    <div class="card mt-5">
        <div class="card-body">
            <div class="card-header">
                <a type="submit" class="btn btn-primary" style="float: right;" href="<?= base_url('admin/add-pengguna') ?>"><i class="fas fa-plus-circle me-2" style="font-size: 18px;"></i> Tambah Data Pengguna Jasa</a>
                <h5>Data Pengguna Jasa</h5>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone No</th>
                            <th>Birthdate</th>
                            <th>Address</th>
                            <th>ID Number</th>
                            <th>KTP Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user as $index_user => $item_user) : ?>
                            <?php foreach ($biodata as $index_bio => $bio) : ?>
                                <?php if ($item_user['id_user'] == $bio['user_id']) : ?>
                                    <?php if ($item_user['role'] == 'Pengguna') : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $bio['nama_lengkap'] ?></td>
                                            <td><?= $bio['no_telepon'] ?></td>
                                            <td><?= $bio['tanggal_lahir'] ?></td>
                                            <td><?= $bio['alamat'] ?></td>
                                            <td><?= $bio['nomor_ktp'] ?></td>
                                            <td><img src="<?= base_url('./assets/upload/ktp/' . $bio['foto_ktp']) ?>" alt="KTP Photo" style="max-width: 100px;"></td>
                                            <td>
                                                <a href="<?= base_url('admin/penyedia-jasa/edit/' . $bio['id_biodata']) ?>" class="btn btn-warning btn-sm rounded-pill btn-icon"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/penyedia-jasa/delete/' . $bio['id_biodata']) ?>" id="deleteButton" class="btn btn-danger btn-sm rounded-pill btn-icon"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript code using SweetAlert
    document.getElementById('deleteButton').addEventListener('click', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                    icon: 'success'
                });

                // Add your logic to perform the actual deletion here
                Example: window.location.href = "<?= base_url('admin/pengguna-jasa') ?>";
            }
        });
    });
</script>

<?= $this->endsection() ?>