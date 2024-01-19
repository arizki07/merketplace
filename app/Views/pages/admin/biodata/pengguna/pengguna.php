<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
    <div class="card">
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
                        <?php foreach ($biodata as $index => $item) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $item['nama_lengkap'] ?></td>
                                <td><?= $item['no_telepon'] ?></td>
                                <td><?= $item['tanggal_lahir'] ?></td>
                                <td><?= $item['alamat'] ?></td>
                                <td><?= $item['nomor_ktp'] ?></td>
                                <td><img src="<?= base_url('./assets/upload/ktp/' . $item['foto_ktp']) ?>" alt="KTP Photo" style="max-width: 100px;"></td>
                                <td>
                                    <a href="<?= base_url('admin/pengguna-jasa/edit/' . $item['id_biodata']) ?>" class="btn btn-success sm-1"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/pengguna-jasa/delete/' . $item['id_biodata']) ?>" id="deleteButton" class="btn btn-danger sm-1"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>
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