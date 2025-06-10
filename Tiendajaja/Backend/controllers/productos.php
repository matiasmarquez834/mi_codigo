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
?>
