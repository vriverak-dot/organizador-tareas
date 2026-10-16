<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Editar Tarea</h4>
                    </div>
                    <div class="card-body">
                        <?php if (session()->has('errors')): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach (session('errors') as $error): ?>
                                        <li><?= esc('$error') ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('tasks/store/') ?>" method="post">
                            <?= csrf_field() ?>

                                <div class="mb-3">
                                    <label for="titulo" class="form-label"><?= lang('App.title', [], session('locale') ?? 'es') ?></label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= old('titulo') ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label"><?= lang('App.description', [], session('locale') ?? 'es') ?></label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" row="4" required><?= old('descripcion') ?></textarea>
                                </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="prioridad" class="form-label"><?= lang('App.priority', [], session('locale') ?? 'es') ?></label>
                                    <select class="form-select" id="prioridad" name="prioridad" required>
                                        <option value="Baja" <?= (old('prioridad', $tarea['prioridad']) == 'Baja') ? 'selected' : '' ?>>Baja</option>
                                        <option value="Media" <?= (old('prioridad', $tarea['prioridad']) == 'Media') ? 'selected' : '' ?>>Media</option>
                                        <option value="Alta" <?= (old('prioridad', $tarea['prioridad']) == 'Alta') ? 'selected' : '' ?>>Alta</option>
                                    </selected>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="estado" class="form-label"><?= lang('App.status', [], session('locale') ?? 'es') ?><</label>
                                    <select class="form-select" id="estado" name="estado" required>
                                        <option value="Pendiente" <?= (old('estado', $tarea['estado']) == 'Pendiente') ? 'selected' : '' ?>>Pendiente</option>
                                        <option value="En_Proceso" <?= (old('estado', $tarea['estado']) == 'En_Proceso') ? 'selected' : '' ?>>En Proceso</option>
                                        <option value="Completada" <?= (old('estado', $tarea['estado']) == 'Completada') ? 'selected' : '' ?>>Completada</option>
                                    </selected>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="fecha_limite" class="form-label"><?= lang('App.due_date', [], session('locale') ?? 'es') ?></label>
                                <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" value="<?= old('fecha_limite', $tarea['fecha_limite']) ?>" required>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('tasks') ?>" class="btn btn-secondary"><?= lang('App.cancel', [], session('locale') ?? 'es') ?></a>
                                <button type="submit" class="btn btn-success"><?= lang('App.save', [], session('locale') ?? 'es') ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<?= $this->endSection() ?>

