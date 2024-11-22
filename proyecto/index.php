<?php
require_once 'config/Database.php';
require_once 'models/Usuario.php';

// Conexión a la base de datos
$database = new Database();
$db = $database->getConnection();
$usuario = new Usuario($db);
$stmt = $usuario->leer();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegio ABC - Gestión de Estudiantes</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>

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
        <h2>Gestión de Estudiantes</h2>
        <a href="crear.php" class="btn">Registrar Nuevo Estudiante</a>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['edad']) ?></td>
                    <td>
                        <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
                        <a href="eliminar.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
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
