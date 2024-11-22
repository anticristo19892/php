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

    <!-- Incluir AlertifyJS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css">

    <!-- Incluir AlertifyJS JS -->
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
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
                        <a href="javascript:void(0);" onclick="eliminarEstudiante(<?= $row['id'] ?>)">Eliminar</a>
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

<script>
    // Función que usa AlertifyJS para confirmar eliminación
    function eliminarEstudiante(id) {
        alertify.confirm('Eliminar Estudiante', '¿Está seguro de que desea eliminar este estudiante?',
            function() {
                // Si el usuario confirma, redirige a la página de eliminación
                window.location.href = 'eliminar.php?id=' + id;
            },
            function() {
                // Si el usuario cancela, muestra un mensaje de error
                alertify.error('Operación cancelada');
            });
        return false; // Previene la acción predeterminada del enlace
    }
</script>

</body>
</html>
