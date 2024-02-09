<?php if (session()->has('success')) : ?>
    <div class="alert alert-success hide-alert" role="alert">
        <i class="me-2 fas fa-check-circle"></i>
        <?= session('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->has('success-dua')) : ?>
    <div class="alert alert-success" role="alert">
        <!-- <i class="me-2 fas fa-check-circle"></i> -->
        <?= session('success-dua') ?>
    </div>
<?php endif; ?>

<?php if (session()->has('error-dua')) : ?>
    <div class="alert alert-danger" role="alert">
        <!-- <i class="me-2 fas fa-check-circle"></i> -->
        <?= session('error-dua') ?>
    </div>
<?php endif; ?>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger hide-alert" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <?= session('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger hide-alert" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <?php foreach (session('errors') as $error) : ?>
            <?= esc($error) ?><br>
        <?php endforeach ?>
    </div>
<?php endif; ?>


<?= $this->section('scripts') ?>
<script>
    setTimeout(function() {
        $('.hide-alert').fadeOut('slow');
    }, 3500);
</script>
<?= $this->endSection() ?>