<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="<?= base_url() ?>assets/" data-template="vertical-menu-template">

<?= $this->include('layouts/head') ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?= $this->include('layouts/sidebar') ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?= $this->include('layouts/header') ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <?= $this->renderSection('content') ?>
                    <!-- / Content -->

                    <!-- Footer -->
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                    <?= $this->include('layouts/footer') ?>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
    <?= $this->renderSection('scripts') ?>
    <?= $this->include('layouts/script') ?>
</body>

</html>