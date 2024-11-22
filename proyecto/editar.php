<?php
require_once 'config/Database.php';
require_once 'models/Usuario.php';

$database = new Database();
$db = $database->getConnection();
$usuario = new Usuario($db);

if (isset($_GET['id'])) {
    $usuario->id = $_GET['id'];
    $stmt = $usuario->leerUno();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        header('Location: index.php');
        exit;
    }

    $usuario->nombre = $row['nombre'];
    $usuario->email = $row['email'];
    $usuario->edad = $row['edad'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario->id = $_POST['id'];
    $usuario->nombre = $_POST['nombre'];
    $usuario->email = $_POST['email'];
    $usuario->edad = $_POST['edad'];

    if ($usuario->actualizar()) {
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
    <title>Colegio ABC - Editar Usuario</title>
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
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form div {
            margin-bottom: 15px;
        }
        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        form input[type="text"],
        form input[type="email"],
        form input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
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
        <img src="assets/img/escudo_11.jpg" alt="Imagen izquierda">
    </div>

    <!-- Contenido principal -->
    <div class="container">
        <h2>Editar Usuario</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->id) ?>">
            <div>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?= htmlspecialchars($usuario->nombre) ?>" required>
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($usuario->email) ?>" required>
            </div>
            <div>
                <label>Edad:</label>
                <input type="number" name="edad" value="<?= htmlspecialchars($usuario->edad) ?>" required>
            </div>
            <button type="submit" class="btn">Actualizar</button>
            <a href="index.php" class="btn">Cancelar</a>
        </form>
    </div>

    <!-- Imagen del lado derecho -->
    <div class="side-image">
        <img src="assets/img/escudo_2.jpg" alt="Imagen derecha">
    </div>
</div>

<footer>
    &copy; <?= date('Y') ?> Colegio ABC. Todos los derechos reservados.
</footer>

</body>
</html>
