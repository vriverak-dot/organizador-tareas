<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div style='padding: 30px;'>
    <h2><?= $titulo ?></h2>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: #e9ecef;">
                <th>ID</th>
                <th>Usuario</th>
                <th>Título de la tarea</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha límite</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
                <tr>
                    <td><?= $tarea['id'] ?></td>
                    <td><strong><?= $tarea['nombre_completo'] ?></strong></td>
                    <td><?= $tarea['titulo'] ?></td>
                    <td><?= $tarea['descripcion'] ?></td>
                    <td>
                        <span class="estado <?= $tarea ['estado'] ?>">
                            <?= ucfirst(str_replace('_', ' ', $tarea['estado'])) ?>
                        </span>
                    </td>
                    <td><?= $tarea['fecha_limite'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>