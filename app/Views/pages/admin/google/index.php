<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container mt-5">
    <!-- <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Validasi Admin</h4> -->

    <!-- DataTable with Buttons -->
    <?= $this->include('components/alerts') ?>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h4>Data Akses With Google</h4>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Google</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($google as $key => $go) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $go['google_id'] ?></td>
                                <td><?= $go['name'] ?></td>
                                <td><?= $go['email'] ?></td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete-<?= $go['id'] ?>" class="btn btn-danger rounded-pill btn-sm btn-icon"><i class="ti ti-trash ti-xs"></i></a>
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

<?php foreach ($google as $key => $go) : ?>
    <div class="modal fade" id="delete-<?= $go['id'] ?>" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi Penghapusan Google</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="modal-body">
            <p>Yakin ingin menghapus data ini? Data akan secara permanen dihapus dari database.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
              Close
          </button>
          <a type="button" href="<?= base_url('admin/google/delete/' . $go['id']) ?>" class="btn btn-primary">Hapus</a>
      </div>
  </div>
</div>
</div>
<?php endforeach ?>

<?= $this->endsection() ?>