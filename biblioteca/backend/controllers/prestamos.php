<?php
require "../models/Prestamo.php"; // Importar el modelo

$prestamoModel = new Prestamo($pdo); // Instancia del modelo

// Función para obtener todos los préstamos
function obtenerPrestamos() {
    global $prestamoModel;
    echo json_encode($prestamoModel->obtenerTodos());
}

// Función para agregar un nuevo préstamo
function agregarPrestamo($id_libro, $id_usuario, $fecha_prestamos, $fecha_devolucion) {
    global $prestamoModel;
    if ($prestamoModel->agregar($id_libro, $id_usuario, $fecha_prestamos, $fecha_devolucion)) {
        echo json_encode(["message" => "Préstamo agregado"]);
    } else {
        echo json_encode(["error" => "Error al agregar el préstamo"]);
    }
}
?>
