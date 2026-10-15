<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><?= esc($tarea['titulo']) ?></h5>
                    <a href="<?= base_url('tasks') ?>" class="btn btn-sm btn-outline-light">Volver</a>
                </div>
                <div class="card-body">
                    <p><strong>Descripción:</strong></p>
                    <p class="text-muted bg-light p-3 rounded"><?= nl2br(esc($tarea['descripcion'])) ?></p>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Prioridad:</strong> 
                            <span class="badge bg-<?= $tarea['prioridad'] == 'Alta' ? 'danger' : ($tarea['prioridad'] == 'Media' ? 'warning text-dark' : 'info text-dark') ?>">
                                <?= esc($tarea['prioridad']) ?>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <strong>Estado:</strong> 
                            <span class="badge bg-secondary"><?= esc($tarea['estado']) ?></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>Fecha Límite:</strong> <?= esc($tarea['fecha_limite']) ?>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="<?= base_url('tasks/edit/' . $tarea['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="<?= base_url('tasks/delete/' . $tarea['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta tarea?');">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
