<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <a type="submit" class="btn btn-primary" style="float: right;" href="<?= base_url('admin/create') ?>"><i class="fas fa-plus-circle me-2" style="font-size: 18px;"></i> Tambah Data Pesanan</a>
                <h5>Data Pesanan</h5>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011-04-25</td>
                        <td>$320,800</td>
                    </tr>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>