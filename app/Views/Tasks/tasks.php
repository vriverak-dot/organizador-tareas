<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <!-- Cabecera de la sección -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><?= esc($titulo) ?></h2>
        <a href="<?= base_url('tasks/create') ?>" class="btn btn-success">+ Nueva Tarea</a>
    </div>

    <!-- Alertas de sesión -->
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

    <!-- Contenedor de la tabla -->
    <div class="card shadow-sm">
        <div class="card-body">
            <?php if (!empty($tareas) && is_array($tareas)) : ?>
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Fecha Límite</th>
                                <th>Creador</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tareas as $tarea) : ?>
                                <tr>
                                    <td><?= esc($tarea['id']) ?></td>
                                    <td>
                                        <a href="<?= base_url('tasks/show/' . $tarea['id']) ?>" class="text-decoration-none fw-bold">
                                            <?= esc($tarea['titulo']) ?></a>
                                    </td>

                                    <td><?= esc($tarea['descripcion']) ?></td>
                                    <td>
                                        <span class="badge bg-<?= (strtolower($tarea['estado']) == 'completada') ? 'success' : 'warning text-dark' ?>">
                                            <?= esc($tarea['estado']) ?>
                                        </span>
                                    </td>
                                    <td><?= esc($tarea['fecha_limite']) ?></td>
                                    <td><?= esc($tarea['nombre_completo']) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('tasks/edit/' . $tarea['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="<?= base_url('tasks/delete/' . $tarea['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta tarea?');">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <p class="text-muted text-center my-4">No hay tareas registradas todavía. ¡Crea una nueva para comenzar!</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
