<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container mt-5">
    <!-- <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Validasi Admin</h4> -->

    <!-- DataTable with Buttons -->
    <?= $this->include('components/alerts') ?>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <a type="button" class="btn btn-primary" style="float: right;" href=""><i class="fas fa-plus-circle me-2" style="font-size: 18px;"></i> Tambah Data User</a>
                <h4>Data Validasi Admin</h4>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $key => $user) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['role'] ?></td>
                                <td>
                                    <?php
                                    $statusBadgeClass = ($user['status'] == 1) ? 'badge bg-label-success' : 'badge bg-label-danger';
                                    $statusText = ($user['status'] == 1) ? '<i class="ti-xs me-1 ti ti-user-check me-1"></i>Terverifikasi' : '<i class="ti-xs me-1 ti ti-user-x me-1"></i>Belum Terverifikasi';
                                    ?>
                                    <span class="<?= $statusBadgeClass ?>"><?= $statusText ?></span>
                                </td>
                                <td>
                                    <!-- Tambahkan tombol atau tautan untuk tindakan lainnya -->
                                    <a href="<?= base_url('admin/verify/' . $user['id_user']) ?>" class="btn btn-label-primary btn-sm"><i class="ti ti-lock ti-xs me-1"></i> Verifikasi</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/ DataTable with Buttons -->

<?= $this->endsection() ?>