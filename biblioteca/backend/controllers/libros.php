<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Libro.php';

$libroModel = new Libro($pdo); // Instancia del modelo

function obtenerLibros() {
    try {
        $pdo = conectar(); // Esto debe venir de conexion.php
        $libro = new Libro($pdo);
        $libros = $libro->obtenerTodos(); // Método definido en Libro.php
        echo json_encode($libros);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

function eliminarLibro($id) {
    $pdo = conectar(); // Obtenés el objeto PDO
    $libro = new Libro($pdo); // Instanciás el modelo
    
    $resultado = $libro->eliminar($id);

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