<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Lista de Usuarios</h2>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nombre Completo</th>
                            <th>Usuario</th>
                            <th>Correo Electrónico</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users) && is_array($users)): ?>
                            <?php foreach ($users as $u): ?>
                                <tr>
                                    <td><?= esc($u['id']) ?></td>
                                    <td>
                                        <?php if (!empty($u['profile_image'])): ?>
                                            <img src="<?= base_url('uploads/' . $u['profile_image']) ?>" alt="Foto" width="40" height="40" class="rounded-circle object-fit-cover">
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Sin foto</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= esc($u['nombre_completo']) ?></td>
                                    <td><?= esc($u['usuario']) ?></td>
                                    <td><?= esc($u['email']) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('users/show/' . $u['id']) ?>" class="btn btn-sm btn-info text-white">
                                            Ver Detalle
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-3">No hay usuarios registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
