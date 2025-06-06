<?php
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
?>
