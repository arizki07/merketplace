<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container mt-5">
    <?= $this->include('components/alerts') ?>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h4>Data Riwayat Pemesanan</h4>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Penyedia Jasa</th>
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
                            <td>
                                <?php foreach ($biodata as $bio): ?>
                                    <?php if ($row['biodata_id'] == $bio['id_biodata']): ?>
                                        <?= $bio['nama_lengkap'] ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                            <td>
                                <?php foreach ($jasa as $key => $jas): ?>
                                    <?php if ($jas['id_jasa'] == $row['jasa_id']): ?>
                                        <?php foreach ($biodata as $key => $bio): ?>
                                            <?php if ($bio['id_biodata'] == $jas['biodata_id']): ?>
                                                <?= $bio['nama_lengkap'] ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                            <td><?= $row['alamat_pemesanan'] ?></td>
                            <td><?= date('d F Y', strtotime($row['tanggal_pelaksanaan'])); ?></td>
                            <td><?= $row['no_telepon'] ?></td>
                            <td>
                                <a href="<?= site_url('admin/pesanan/edit/' . $row['id_pemesanan']) ?>" class="btn btn-warning btn-sm rounded-pill btn-icon"><i class="fas fa-edit"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#delete-<?= $row['id_pemesanan'] ?>" class="btn btn-danger btn-sm rounded-pill btn-icon"><i class="fas fa-trash "></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <?php foreach ($pesanan as $key => $row) : ?>
        <div class="modal fade" id="delete-<?= $row['id_pemesanan'] ?>" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi Penghapusan Riwayat Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghapus data ini? Data akan secara permanen dihapus dari database.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                  Close
              </button>
              <a type="button" href="<?= base_url('admin/pesanan/delete/' . $row['id_pemesanan']) ?>" class="btn btn-primary">Hapus</a>
          </div>
      </div>
  </div>
</div>
<?php endforeach ?>
<?= $this->endSection() ?>