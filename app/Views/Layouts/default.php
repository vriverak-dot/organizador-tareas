<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Organizador de Tareas</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #e9ecef;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .nav-group {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 15px;
            padding: 5px 8px;
            transition: color 0.2s;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .main-content {
            margin-top: 80px;
            text-align: center;
            padding: 0 20px;
        }

        .saludo-bienvenida {
            font-size: 1.6em;
            margin-bottom: 20px;
            color: #007bff;
            font-weight: bold;
        }

        .main-content h1 {
            font-size: 2.2em;
            margin-bottom: 10px;
            color: #212529;
        }

        .main-content p {
            color: #6c757d;
            font-size: 1.1em;
        }   
    </style>
</head>   
<body>
    <?= $this->include('partials/navbar') ?>
    <?= $this->renderSection('content') ?>
</body>
</html>