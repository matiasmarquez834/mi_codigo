<?php
require "../controllers/productos.php"; // Importar el controlador que maneja la lógica de negocio para productos

// Obtener el método de la solicitud HTTP (GET, POST, PUT, DELETE)
$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "GET") {
    if (isset($_GET['id'])) {
        mostrarProducto($_GET['id']); // Mostrar un producto específico
    } else {
        listarProductos(); // Listar todos los productos
    }
} 
elseif ($requestMethod == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    agregarProducto($data['nombre'], $data['descripcion'], $data['precio']);
} 
elseif ($requestMethod == "PUT") {
    $data = json_decode(file_get_contents("php://input"), true);
    modificarProducto($data['id'], $data['nombre'], $data['descripcion'], $data['precio']);
}
elseif ($requestMethod == "DELETE") {
    if (isset($_GET['id'])) {
        eliminarProducto($_GET['id']);
    } else {
        echo json_encode(["error" => "Falta el parámetro id para eliminar"]);
    }
}
else {
    echo json_encode(["error" => "Método no permitido"]);
}
/*
// Se importa el controlador del modelo
require "../controllers/productos.php"; 

// Se obtiene el método de la petición (GET, POST, etc.)
$requestMethod = $_SERVER["REQUEST_METHOD"];

// Se obtiene la sección (tipo de acción) por parámetro
$seccion = $_GET["seccion"] ?? null;

header("Content-Type: application/json");

if ($requestMethod === "POST") {
    switch ($seccion) {
        case "agregarProducto":
            // Requiere id, nombre y precio por POST
            $id = $_POST['id'] ?? null;
            $nombre = $_POST['nombre'] ?? null;
            $descripcion = $_POST['descripcion'] ?? null;
            $precio = $_POST['precio'] ?? null;

            if ($id && $nombre && $descripcion && $precio) {
                agregarProducto($id, $nombre, $descripcion, $precio);
            } else {
                echo json_encode(["error" => "Faltan datos para agregar el producto"]);
            }
            break;

        case "eliminarProducto":
            $id = $_POST['id_producto'] ?? null;
            if ($id) {
                eliminarProducto($id);
            } else {
                echo json_encode(["error" => "ID del producto requerido para eliminar"]);
            }
            break;

        case "actualizarProducto":
            $id = $_POST['id_producto'] ?? null;
            $nombre = $_POST['nombre_producto'] ?? null;
            $precio = $_POST['precio_producto'] ?? null;

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
*/
?>
