<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="text-center mb-4"><?= lang('App.users') ?? 'Lista de Usuarios' ?></h2>
  
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre / Usuario</th>
                            <th>Correo Electrónico</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                            <?php foreach ($usuarios as $u): ?>
                                <tr>
                                    <td><?= esc($u['id'] ?? '') ?></td>
                                    <td><?= esc($u['nombre_completo'] ?? $u['username'] ?? 'N/A') ?></td>
                                    <td><?= esc($u['email'] ?? 'N/A') ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('users/show/' . ($u['id'] ?? 0)) ?>" class="btn btn-sm btn-outline-primary">Ver</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay usuarios registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="<?= base_url('/') ?>" class="btn btn-secondary">Regresar al Inicio</a>
    </div>
</div>

<?= $this->endSection() ?>
