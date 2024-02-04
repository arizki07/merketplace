<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <?= $this->renderSection('heads') ?>
    <?= $this->include('layouts/landing/head.php') ?>
</head>

<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <?= $this->include('layouts/landing/header.php') ?>
    </header>
    <!-- End Header Area -->

    <!-- start banner Area -->
    <?= $this->renderSection('content') ?>
    <!-- End related-product Area -->

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <?= $this->include('layouts/landing/footer.php') ?>
    </footer>
    <!-- End footer Area -->

    <?= $this->include('layouts/landing/script.php') ?>
    <?= $this->renderSection('scripts') ?>
</body>

</html>