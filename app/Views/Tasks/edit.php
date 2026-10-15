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

                        <form action="<?= base_url('tasks/update/' . $tarea['id']) ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= old('titulo', $tarea['titulo']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" row="3" required><?= old('descripcion', $tarea['descripcion']) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado:</label>
                                <select class="form-select" id="estado" name="estado" required>
                                    <option value="Pendiente" <?= (old('estado', $tarea['estado']) == 'Pendiente') ? 'selected' : '' ?>>Pendiente</option>
                                    <option value="Completada" <?= (old('estado', $tarea['estado']) == 'Completada') ? 'selected' : '' ?>>Completada</option>
                                </selected>
                            </div>

                            <div class="mb-3">
                                <label for="fecha_limite" class="form-label">Fecha Límite:</label>
                                <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" value="<?= old('fecha_limite', $tarea['fecha_limite']) ?>" required>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('tasks') ?>" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-warning">Actualizar Tarea</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>




                            




                    
                

