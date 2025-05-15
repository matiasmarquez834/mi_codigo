<?php
require_once "../config/database.php";
require_once "../models/Libro.php";

$libroModel = new Libro($pdo); // Instancia el modelo con PDO

function obtenerLibros() {
    global $libroModel;
    try {
        $libros = $libroModel->obtenerTodos();
        echo json_encode($libros);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

function eliminarLibro($id) {
    global $libroModel;
    $resultado = $libroModel->eliminar($id);

    if ($resultado) {
        echo json_encode(['mensaje' => 'Libro eliminado correctamente']);
    } else {
        echo json_encode(['error' => 'No se pudo eliminar el libro']);
    }
}

function agregarLibro($titulo, $autor, $anio_publicacion) {
    global $libroModel;
    if ($libroModel->agregar($titulo, $autor, $anio_publicacion)) {
        echo json_encode(["message" => "Libro agregado"]);
    } else {
        echo json_encode(["error" => "Error al agregar el libro"]);
    }
}
?>