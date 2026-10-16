
<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show text-center container mt-3" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show text-center container mt-3" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
        
<main class="main-content container text-center mt-5">
    <?php if (!empty($usuario)): ?>
        <div class="saludo-bienvenida mb-2">
            <?= lang('App.welcome_back') ?>, <?= esc($usuario) ?></div>
        <h2 class="display-4"><?= lang('App.app_title') ?></h2>
        <p class="lead"><?= lang('App.app_desc') ?></p>
    <?php else: ?>
    <h1 class="display-4"><?= lang('App.welcome') ?></h1>
    <p class="lead"><?= lang('App.prompt') ?></p>
    <?php endif; ?>
</main>
<?= $this->endSection() ?>
