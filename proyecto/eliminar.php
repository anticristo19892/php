<?php
require_once 'config/Database.php';
require_once 'models/Usuario.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();
    $usuario = new Usuario($db);
    $usuario->id = $_GET['id'];
    $usuario->eliminar();
}

header('Location: index.php');
exit;