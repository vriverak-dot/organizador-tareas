<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><?= esc($titulo) ?></h2>
        <a href="<?= base_url('tasks/create') ?>" class="btn btn-success"><?= lang('App.new_task', [], session('locale') ?? 'es') ?></a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th><?= lang('App.title', [], session('locale') ?? 'es') ?></th>
                            <th><?= lang('App.priority', [], session('locale') ?? 'es') ?></th>
                            <th><?= lang('App.status', [], session('locale') ?? 'es') ?></th>
                            <th><?= lang('App.due_date', [], session('locale') ?? 'es') ?></th>
                            <th>Creador</th>
                            <th><?= lang('App.actions', [], session('locale') ?? 'es') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($tareas) && is_array($tareas)): ?>
                            <?php foreach ($tareas as $tarea): ?>
                                <tr>
                                    <td><?= esc($tarea['id']) ?></td>
                                    <td>
                                        <a href="<?= base_url('tasks/show/' . $tarea['id']) ?>" class="text-decoration-none fw-bold">
                                            <?= esc($tarea['titulo']) ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php 
                                            $badgeColor = 'bg-secondary';
                                            if ($tarea['prioridad'] === 'Alta') {
                                                $badgeColor = 'bg-danger';
                                            } elseif ($tarea['prioridad'] === 'Media') {
                                                $badgeColor = 'bg-warning text-dark';
                                            } elseif ($tarea['prioridad'] === 'Baja') {
                                                $badgeColor = 'bg-info text-dark';
                                            }
                                        ?>
                                        <span class="badge <?= $badgeColor ?>"><?= esc($tarea['prioridad']) ?></span>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary"><?= esc($tarea['estado']) ?></span>
                                    </td>
                                    <td><?= esc($tarea['fecha_limite']) ?></td>
                                    <td><?= esc($tarea['nombre_completo']) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('tasks/edit/' . $tarea['id']) ?>" class="btn btn-warning btn-sm"><?= lang('App.edit', [], session('locale') ?? 'es') ?></a>
                                        <a href="<?= base_url('tasks/delete/' . $tarea['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta tarea?');"><?= lang('App.delete', [], session('locale') ?? 'es') ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No hay tareas registradas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
