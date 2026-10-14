
<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>
        
<main class="main-content">
    <?php if (!empty($usuario)): ?>
        <div class="saludo-bienvenida">
            <?= lang('App.welcome_back') ?>, <?= esc($usuario) ?></div>
        <h1><?= lang('App.app_title') ?></h1>
        <p><?= lang('App.app_desc') ?></p>
    <?php else: ?>
    <h1><?= lang('App.welcome') ?></h1>
    <p><?= lang('App.prompt') ?></p>
    <?php endif; ?>
</main>
<?= $this->endSection() ?>