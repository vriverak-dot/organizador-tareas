<!DOCTYPE html>
<html>
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
        nav.navbar {
            background-color: #e9ecef;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        .main-content h1 {
            font-size: 2.2em;
            margin-bottom: 10px;
            color: #212529;
        }
        .main-content p {
            color: #6c757d;
            fpont-size: 1.1em;
        }   
    </style>
</head>   
    <body>
        <nav class="navbar">
            <div class="nav-group">
                <a href="<?= base_url('/') ?>" class="nav-link">Inicio</a>
                <a href="<?= base_url('lang/en') ?>" class="nav-link">English</a>
                <a href="<?= base_url('lang/es') ?>" class="nav-link">Español</a>
            </div>

            <div class="nav-group">
                <a href="<?= base_url('auth/signup') ?>" class="nav-link">Registrarse</a>
                <a href="<?= base_url('auth/login') ?>" class="nav-link">Iniciar Sesión</a>
            </div>
        </nav>
        <main class="main-content">
            <h1>Bienvenido al Organizador de Tareas</h1>
            <p>Por favor, inicia sesión o regístrate para continuar.</p>
        </main>
    </body>
</html>