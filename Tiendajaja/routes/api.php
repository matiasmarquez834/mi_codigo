<?php
// Se importa el controlador del modelo
require "../controllers/productos.php"; 

// Se obtiene el método de la petición (GET, POST, etc.)
$requestMethod = $_SERVER["REQUEST_METHOD"];

// Se obtiene la sección (tipo de acción) por parámetro
$seccion = $_GET["seccion"] ?? null;

header("Content-Type: application/json");

if ($requestMethod === "POST") {
    switch ($seccion) {
        case "añadirProducto":
            // Requiere id, nombre y precio por POST
            $id = $_POST['id'] ?? null;
            $nombre = $_POST['nombre'] ?? null;
            $precio = $_POST['precio'] ?? null;

            if ($id && $nombre && $precio) {
                agregarProducto($id, $nombre, $precio);
            } else {
                echo json_encode(["error" => "Faltan datos para agregar el producto"]);
            }
            break;

        case "eliminarProducto":
            $id = $_POST['id'] ?? null;
            if ($id) {
                eliminarProducto($id);
            } else {
                echo json_encode(["error" => "ID del producto requerido para eliminar"]);
            }
            break;

        case "actualizarProducto":
            $id = $_POST['id'] ?? null;
            $nombre = $_POST['nombre'] ?? null;
            $precio = $_POST['precio'] ?? null;

            if ($id && $nombre && $precio) {
                actualizarProducto($id, $nombre, $precio);
            } else {
                echo json_encode(["error" => "Faltan datos para actualizar el producto"]);
            }
            break;

        default:
            echo json_encode(["error" => "Sección POST no válida o no especificada."]);
            break;
    }
}

if ($requestMethod === "GET") {
    switch ($seccion) {
        case "productos":
            obtenerProducto(); // Devuelve todos
            break;

        case "verProducto":
            $id = $_GET['id'] ?? null;
            if ($id) {
                obtenerProductoPorId($id); // Devuelve uno
            } else {
                echo json_encode(["error" => "ID del producto requerido para ver"]);
            }
            break;

        default:
            echo json_encode(["error" => "Sección GET no válida o no especificada."]);
            break;
    }
}
?>
