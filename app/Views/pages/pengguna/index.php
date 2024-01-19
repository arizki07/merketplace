<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="row">
    <?php
    $session = \Config\Services::session();
    $successMessage = $session->getFlashdata('success');
    if ($successMessage) {
        echo '<div id="successAlert" class="alert alert-success">' . $successMessage . '</div>';
        echo '
    <script>
        setTimeout(function() {
            var successAlert = document.getElementById("successAlert");
            if (successAlert) {
                successAlert.style.display = "none";
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    </script>';
    }
    ?>
    <!-- View sales -->
    <div class="col-xl-4 mb-4 col-lg-5 col-12">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-7">
                    <div class="card-body text-nowrap">
                        <h5 class="card-title mb-0">Congratulations <?= session()->get('username') ?>! 🎉</h5>
                        <p class="mb-2">Best seller of the month</p>
                        <h4 class="text-primary mb-1">$48.9k</h4>
                        <a href="javascript:;" class="btn btn-primary">View Sales</a>
                    </div>
                </div>
                <div class="col-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="<?= base_url() ?>assets/img/illustrations/card-advance-sale.png" height="140" alt="view sales" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- View sales -->

    <!-- Statistics -->
    <div class="col-xl-8 mb-4 col-lg-7 col-12">
        <div class="card h-100">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title mb-0">Statistics</h5>
                    <small class="text-muted">Updated 1 month ago</small>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>