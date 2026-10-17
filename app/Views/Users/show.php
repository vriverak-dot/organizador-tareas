<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Detalles del Usuario</h4>
                </div>
                <div class="card-body text-center">
                    
                    <div class="mb-4">
                        <?php if (!empty($user['profile_image'])): ?>
                            <img src="<?= base_url('uploads/' . $user['profile_image']) ?>" alt="Perfil" width="150" height="150" class="rounded-circle img-thumbnail object-fit-cover">
                        <?php else: ?>
                            <img src="<?= base_url('assets/default-avatar.png') ?>" alt="Default" width="150" height="150" class="rounded-circle img-thumbnail object-fit-cover">
                        <?php endif; ?>
                    </div>

                    <ul class="list-group list-group-flush text-start mb-3">
                        <li class="list-group-item"><strong>ID:</strong> <?= esc($user['id']) ?></li>
                        <li class="list-group-item"><strong>Nombre Completo:</strong> <?= esc($user['nombre_completo']) ?></li>
                        <li class="list-group-item"><strong>Usuario:</strong> <?= esc($user['usuario']) ?></li>
                        <li class="list-group-item"><strong>Correo Electrónico:</strong> <?= esc($user['email']) ?></li>
                    </ul>

                    <a href="<?= base_url('users') ?>" class="btn btn-secondary">Regresar a la lista</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
