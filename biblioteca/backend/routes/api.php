<?php
<<<<<<< HEAD
//trata de integrar este para los 3.
// ?? header('Content-Type: application/json; charset=utf-8');

require "../controllers/libros.php";       // Controlador de libros
require "../controllers/prestamos.php";   // Controlador de préstamos
require "../controllers/usuarios.php";     // Controlador de usuarios

// Obtener método HTTP y sección
$requestMethod = $_SERVER["REQUEST_METHOD"];
$seccion      = $_GET['seccion'] ?? '';

switch ($seccion) {
    case 'libros':
        // Si la solicitud es de tipo GET, se llama a la función obtenerLibros()
        if ($requestMethod === 'GET') {
            obtenerLibros();
        // Si la solicitud es de tipo POST, se procesa la entrada y se agrega un libro
        } elseif ($requestMethod === 'POST') {
            // Leer los datos enviados en el cuerpo de la solicitud (formato JSON)
            $data = json_decode(file_get_contents('php://input'), true);
            // Llamar a la función agregarLibro() pasando los valores extraídos del JSON
            agregarLibro(
                $data['titulo'] ?? '',
                $data['autor'] ?? '',
                $data['anio_publicacion'] ?? ''
            );
        // Si se usa otro método HTTP no permitido, se devuelve un mensaje de error en formato JSON    
        } else {
            echo json_encode(['error' => 'Método no permitido para la sección libros']);
        }
        break;

    case 'prestamos':
        // Si la solicitud es de tipo GET, se llama a la función obtenerPrestamos()
        if ($requestMethod === 'GET') {
            obtenerPrestamos();
        // Si la solicitud es de tipo POST, se procesa la entrada y se agrega un prestamo
        } elseif ($requestMethod === 'POST') {
            // Leer los datos enviados en el cuerpo de la solicitud (formato JSON)
            $data = json_decode(file_get_contents('php://input'), true);
            // Llamar a la función agregarPrestamo() pasando los valores extraídos del JSON    
            agregarPrestamo(
                $data['id_libro'] ?? null,
                $data['id_usuario'] ?? null,
                $data['fecha_prestamo'] ?? '',
                $data['fecha_devolucion'] ?? ''
            );
        // Si se usa otro método HTTP no permitido, se devuelve un mensaje de error en formato JSON    
        } else {
            echo json_encode(['error' => 'Método no permitido para la sección préstamos']);
        }
        break;

    case 'usuarios':
        // Si la solicitud es de tipo GET, se llama a la función obtenerUsuarios()
        if ($requestMethod === 'GET') {
            obtenerUsuarios();
        // Si la solicitud es de tipo POST, se procesa la entrada y se agrega un usuario
        } elseif ($requestMethod === 'POST') {
            // Leer los datos enviados en el cuerpo de la solicitud (formato JSON)
            $data = json_decode(file_get_contents('php://input'), true);
            // Llamar a la función agregarUsuario() pasando los valores extraídos del JSON    
            agregarUsuario(
                $data['nombre'] ?? '',
                $data['email'] ?? '',
                $data['rol'] ?? ''
            );
        // Si se usa otro método HTTP no permitido, se devuelve un mensaje de error en formato JSON
        } else {
            echo json_encode(['error' => 'Método no permitido para la sección usuarios']);
        }
        break;

    default:
        echo json_encode(['error' => 'Sección no válida']);
        break;
=======
require "../controllers/libros.php"; // Importar el controlador que maneja la lógica de negocio

// Obtener el método de la solicitud HTTP (GET, POST, etc.)
$requestMethod = $_SERVER["REQUEST_METHOD"];

// Si la solicitud es de tipo GET, se llama a la función obtenerLibros()
if ($requestMethod == "GET") {
    obtenerLibros();
} 
// Si la solicitud es de tipo POST, se procesa la entrada y se agrega un libro
elseif ($requestMethod == "POST") {
    // Leer los datos enviados en el cuerpo de la solicitud (formato JSON)
    $data = json_decode(file_get_contents("php://input"), true);
    
    // Llamar a la función agregarLibro() pasando los valores extraídos del JSON
    agregarLibro($data['titulo'], $data['autor'], $data['anio_publicacion']);
} 
// Si se usa otro método HTTP no permitido, se devuelve un mensaje de error en formato JSON
else {
    echo json_encode(["error" => "Método no permitido"]);
>>>>>>> 2d7d0de (tralalero back de libros terminado)
}
?>