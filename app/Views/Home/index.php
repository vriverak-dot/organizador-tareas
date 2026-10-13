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
        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }
        p {
            text-align: center;
            color: #666;
        }
        a {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
        .contenedor {
            text-align: center;
            margin-top: 30px;
        }   
    </style>
</head>   
    <body>
        <h1>Bienvenido al Organizador de Tareas</h1>
        <p>Por favor, inicia sesión o regístrate para continuar.</p>

        <div class="contenedor">
            <a href="<?= base_url('auth/login') ?>">Iniciar Sesión</a>
            <a href="<?= base_url('auth/signup') ?>">Registrarse</a>       
        </div>
    </body>

</html>
