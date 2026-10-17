<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white text-center">
            <h3><?= lang('App.profile') ?? 'Perfil de Usuario' ?></h3>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="mb-3 text-center">
                <div class="display-6 fw-bold text-primary">
                    <?= esc($usuario['nombre_completo'] ?? $usuario['nombre'] ?? $usuario['username'] ?? 'Usuario') ?>
                </div>
                <small class="text-muted"><?= esc($usuario['email'] ?? '') ?></small>
            </div>

            <hr>

            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>ID de Usuario:</strong>
                    <span><?= esc($usuario['id'] ?? session()->get('user_id')) ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Nombre / Usuario:</strong>
                    <span><?= esc($usuario['nombre_completo'] ?? $usuario['username'] ?? 'N/A') ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Correo Electrónico:</strong>
                    <span><?= esc($usuario['email'] ?? 'N/A') ?></span>
                </li>
            </ul>

            <div class="mb-3">
                <?php if (!empty($usuario['profile_image'])): ?>
                    <img src="<?= base_url('uploads/' . $usuario['profile_image']) ?>" alt="Profile" width="150" class="img-thumbnail mb-2"><br>
                <?php else: ?>
                    <img src="<?= base_url('assets/default-avatar.png') ?>" alt="Profile" width="150" class="img-thumbnail mb-2"><br>
                <?php endif; ?>
                    <a href="<?= base_url('profile/delete-image') ?>" class="btn btn-danger btn-sm">Delete Profile image</a>
            </div>

            <div class="mb-3">
                <label>Name</label>
                <p class="text-muted"><?= esc($usuario['nombre_completo'] ?? $usuario['name']) ?></p>
            </div>

            <div class="mb-3">
                <label>email</label>
                <p class="text-muted"><?= esc($usuario['email']) ?></p>
            </div>
            
            <div class="d-flex gap-2">
                <a href="<?= base_url('profile/edit') ?>" class="btn btn-primary">Edit</a>
                <a href="<?= base_url('profile/change-password') ?>" class="btn btn-primary">Change password</a>
                <a href="<?= base_url('profile/change-image') ?>" class="btn btn-primary">Change profile image</a>
            </div>
            
            <div class="d-flex justify-content-between mt-4">
                <a href="<?= base_url('/') ?>" class="btn btn-secondary">Regresar al Inicio</a>
                <a href="<?= base_url('profile/edit') ?>" class="btn btn-primary">Editar Perfil</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
