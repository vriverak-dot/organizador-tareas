<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title mb-4">Actualizar Perfil</h3>

                    <form action="<?= base_url('profile/update') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="nombre_completo" class="form-label">Nombre</label>
                            <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" value="<?= esc($user['nombre_completo']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electronico</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= esc($user['email']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <?php if (!empty($user['profile_image'])): ?>
                                <img src="<?= base_url('uploads/' . $user['profile_image']) ?>" alt="Profile" width="150" class="img-thumbnail mb-2"><br>
                            <?php else: ?>
                                <img src="<?= base_url('assets/default-avatar.png') ?>" alt="Profile" width="150" class="img-thumbnail mb-2"><br>
                            <?php endif; ?>
                            <a href="<?= base_url('profile/delete-image') ?>" class="btn btn-danger btn-sm">Delete Profile image</a>
                        </div>
     
                        <div class="mb-3">
                            <label>Name</label>
                            <p class="text-muted"><?= esc($user['nombre_completo'] ?? $user['nombre_completo']) ?></p>
                        </div>
                        
                        <div class="mb-3">
                            <label>email</label>
                            <p class="text-muted"><?= esc($user['email']) ?></p>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <a href="<?= base_url('profile/edit') ?>" class="btn btn-primary">Edit</a>
                            <a href="<?= base_url('profile/change-password') ?>" class="btn btn-primary">Change password</a>
                            <a href="<?= base_url('profile/change-image') ?>" class="btn btn-primary">Change profile image</a>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success me-2">Guardar</button>
                            <a href="<?= base_url('profile') ?>" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
