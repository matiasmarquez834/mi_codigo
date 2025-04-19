<?php
//trata de integrar este para los 3.
header('Content-Type: application/json; charset=utf-8');

require "../controllers/libros.php";       // Controlador de libros
require "../controllers/prestamos.php";   // Controlador de préstamos
require "../controllers/usuarios.php";     // Controlador de usuarios

// Obtener método HTTP y sección
$requestMethod = $_SERVER["REQUEST_METHOD"];
$seccion      = $_GET['seccion'] ?? '';

switch ($seccion) {
    case 'libros':
        if ($requestMethod === 'GET') {
            obtenerLibros();
        } elseif ($requestMethod === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            agregarLibro(
                $data['titulo'] ?? '',
                $data['autor'] ?? '',
                $data['anio_publicacion'] ?? ''
            );
        } else {
            echo json_encode(['error' => 'Método no permitido para libros']);
        }
        break;

    case 'prestamos':
        if ($requestMethod === 'GET') {
            obtenerPrestamos();
        } elseif ($requestMethod === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            agregarPrestamo(
                $data['id_libro'] ?? null,
                $data['id_usuario'] ?? null,
                $data['fecha_prestamo'] ?? '',
                $data['fecha_devolucion'] ?? ''
            );
        } else {
            echo json_encode(['error' => 'Método no permitido para préstamos']);
        }
        break;

    case 'usuarios':
        if ($requestMethod === 'GET') {
            obtenerUsuarios();
        } elseif ($requestMethod === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            agregarUsuario(
                $data['nombre'] ?? '',
                $data['email'] ?? '',
                $data['rol'] ?? ''
            );
        } else {
            echo json_encode(['error' => 'Método no permitido para usuarios']);
        }
        break;

    default:
        echo json_encode(['error' => 'Sección no válida']);
        break;
}
?>