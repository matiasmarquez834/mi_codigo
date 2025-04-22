<?php
require "../models/Usuario.php"; // Importar el modelo

$usuarioModel = new Usuario($pdo); // Instanciar el modelo

// Función para obtener todos los usuarios
function obtenerUsuarios() {
    global $usuarioModel;
    echo json_encode($usuarioModel->obtenerTodos());
}

// Función para agregar un nuevo usuario
function agregarUsuario($nombre, $email, $telefono) {
    global $usuarioModel;
    if ($usuarioModel->agregar($nombre, $email, $telefono)) {
        echo json_encode(["message" => "Usuario agregado"]);
    } else {
        echo json_encode(["error" => "Error al agregar el usuario"]);
    }
}
?>
