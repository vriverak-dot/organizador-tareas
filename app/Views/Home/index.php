
<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>
        
<main class="main-content">
    <?php if (!empty($usuario)): ?>
        <div class="saludo-bienvenida">
            Bienvenido, <?= esc($usuario) ?></div>
        <h1>Organizador de Tareas</h1>
        <p>Gestiona y revisa tus tareas pendientes de manera eficiente.</p>
    <?php else: ?>
    <h1>Bienvenido al Organizador de Tareas</h1>
    <p>Por favor, inicia sesión o regístrate para continuar.</p>
    <?php endif; ?>
</main>
<?= $this->endSection() ?>