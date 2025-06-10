<?php
require "../config/conexion.php"; // Importar la conexión a la base de datos

// Definición de la clase Producto que interactuará con la tabla 'productos' en la base de datos
class Producto {
    private $pdo; // Propiedad privada para almacenar la conexión mysqli

    // El constructor recibe el objeto $conn (conexión a la base de datos) y lo asigna a la propiedad $this->conn
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para obtener todos los productos de la base de datos
    public function obtenerTodos() {
        $stmt = $this->pdo->prepare("SELECT * FROM productos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un producto por ID
    public function obtenerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para agregar un nuevo producto
    public function agregar($nombre, $descripcion, $precio) {
        $stmt = $this->pdo->prepare("INSERT INTO productos (nombre, descripcion, precio) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $descripcion, $precio]);
    }

    // Método para modificar un producto existente
    public function modificar($id, $nombre, $descripcion, $precio) {
        $stmt = $this->pdo->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=? WHERE id=?");
        return $stmt->execute([$nombre, $descripcion, $precio, $id]);
    }

    // Método para eliminar un producto
    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>

