<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: <div id="f4f6f9">
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left; 
            border-bottom: 1px solid #ddd;
        }
        th {   
            background-color: #007bff;
            color: #fff;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .estado {
            font-weight: bold; 
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-block;
        }
        .completada {
            background-color: #d4edda;
            color: #155723;
        }
        .en_progreso {
            background-color: #fff3cd;
            color: #856404;
        }
        .pendiente {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <h1><?= $titulo ?></h1>
    <table>
        <thead>
            <tr>
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
</body>
</html>