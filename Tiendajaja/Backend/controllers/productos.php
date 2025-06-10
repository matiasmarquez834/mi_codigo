<?php
require "../models/producto.php";


$productoModel = new Producto($pdo); // Instancia del modelo

function listarProductos() {
    global $productoModel;
    echo json_encode($productoModel->obtenerTodos());
}

function mostrarProducto($id) {
    global $productoModel;
    $producto = $productoModel->obtenerPorId($id);
    if ($producto) {
        echo json_encode($producto);
    } else {
        echo json_encode(["error" => "Producto no encontrado"]);
    }
}

function agregarProducto($nombre, $descripcion, $precio) {
    global $productoModel;
    if ($productoModel->agregar($nombre, $descripcion, $precio)) {
        echo json_encode(["mensaje" => "Producto agregado"]);
    } else {
        echo json_encode(["error" => "No se pudo agregar"]);
    }
}

function modificarProducto($id, $nombre, $descripcion, $precio) {
    global $productoModel;
    if ($productoModel->modificar($id, $nombre, $descripcion, $precio)) {
        echo json_encode(["mensaje" => "Producto modificado", "id" => $id]);
    } else {
        echo json_encode(["error" => "No se pudo modificar"]);
    }
}

function eliminarProducto($id) {
    global $productoModel;
    if ($productoModel->eliminar($id)) {
        echo json_encode(["mensaje" => "Producto eliminado", "id" => $id]);
    } else {
        echo json_encode(["error" => "No se pudo eliminar"]);
    }
}
/*
require "../config/conexion.php"; // Conexión PDO
require "../models/producto.php"; // Importar el modelo

$productoModel = new producto($pdo); // Instancia del modelo

// Función para obtener todos los productos
function obtenerProducto() {
    global $productoModel;
    echo json_encode($productoModel->obtenerTodos());
}

// Función para obtener un producto por ID
function obtenerProductoPorId($ID_producto) {
    global $productoModel;
    echo json_encode($productoModel->obtenerPorId($ID_producto));
}

// Función para agregar un nuevo producto
function agregarProducto($ID_producto, $Nombre_producto, $Descripcion_producto, $Precio_producto) {
    global $productoModel;
    if ($productoModel->agregar($ID_producto, $Nombre_producto, $Descripcion_producto, $Precio_producto)) {
        echo json_encode(["message" => "Producto agregado"]);
    } else {
        echo json_encode(["error" => "Error al agregar el producto"]);
    }
}

// Función para actualizar un producto existente
function actualizarProducto($ID_producto, $Nombre_producto, $Precio_producto) {
    global $productoModel;
    if ($productoModel->actualizar($ID_producto, $Nombre_producto, $Precio_producto)) {
        echo json_encode(["message" => "Producto actualizado"]);
    } else {
        echo json_encode(["error" => "Error al actualizar el producto"]);
    }
}

// Función para eliminar un producto por ID
function eliminarProducto($ID_producto) {
    global $productoModel;
    if ($productoModel->eliminar($ID_producto)) {
        echo json_encode(["message" => "Producto eliminado"]);
    } else {
        echo json_encode(["error" => "Error al eliminar el producto"]);
    }
}
*/
?>
