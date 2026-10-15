<?= $this->extend('layouts/default') ?>
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
                    <p class="text-muted"><?= nl2br(esc($tarea['descripcion'])) ?></p>
                </div>
                <div class="card-footer text-end">
                    <a href="<?= base_url('tasks/edit/' . $tarea['id']) ?>" class="btn btn-warning btn-sm"><?= lang('App.edit', [], session('locale') ?? 'es') ?></a>
                    <a href="<?= base_url('tasks/delete/' . $tarea['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta tarea?');"><?= lang('App.delete', [], session('locale') ?? 'es') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
