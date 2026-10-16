
<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>
        
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