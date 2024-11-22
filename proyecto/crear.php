<?php
require_once 'config/Database.php';
require_once 'models/Usuario.php';

$database = new Database();
$db = $database->getConnection();
$usuario = new Usuario($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario->nombre = $_POST['nombre'] ?? '';
    $usuario->email = $_POST['email'] ?? '';
    $usuario->edad = $_POST['edad'] ?? '';

    if ($usuario->crear()) {
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegio ABC - Crear Usuario</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .main-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 40px auto;
            padding: 40px;
        }
        .side-image {
            width: 20%;
            text-align: center;
        }
        .side-image img {
            width: 100%;
            max-width: 150px;
        }
        .container {
            width: 60%;
        }
        header {
            background-color: #ed0707;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        header img {
            width: 80px;
            vertical-align: middle;
        }
        header h1 {
            display: inline;
            margin-left: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #072df1;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #072df1;
        }
        form {
            margin-top: 20px;
        }
        form div {
            margin-bottom: 15px;
        }
        form label {
            display: block;
            font-weight: bold;
        }
        form input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #072df1;
            border-radius: 5px;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #072df1;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <img src="assets/img/escudo.jpg" alt="Logo del Colegio">
    <h1>Colegio ABC</h1>
</header>

<div class="main-content">
    <!-- Imagen del lado izquierdo -->
    <div class="side-image">
        <img src="" alt="">
    </div>

    <!-- Contenido principal -->
    <div class="container">
        <h2>Crear Nuevo Estudiante</h2>
        <form method="POST">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="edad">Edad:</label>
                <input type="number" name="edad" id="edad" required>
            </div>
            <button type="submit" class="btn">Guardar</button>
            <a href="index.php" class="btn">Cancelar</a>
        </form>
    </div>

    <!-- Imagen del lado derecho -->
    <div class="side-image">
        <img src="" alt="">
    </div>
</div>

<footer>
    &copy; <?= date('Y') ?> Colegio ABC. Todos los derechos reservados.
</footer>

</body>
</html>
