<?php
// Se importa el archivo que contiene la configuración de la base de datos, que establece la conexión
require_once "../config/database.php"; // Importar la conexión a la base de datos

// Definición de la clase Libro que interactuará con la tabla 'libros' en la base de datos
class producto {
    private $pdo;  // Declaración de una propiedad privada para almacenar la conexión PDO

    // El constructor recibe el objeto $pdo (conexión a la base de datos) y lo asigna a la propiedad $this->pdo
    public function __construct($pdo) {
        $this->pdo = $pdo;  // Asigna la conexión PDO a la propiedad de la clase
    }

    // Método para obtener todos los libros de la base de datos
    public function obtenerTodos() {
        // Prepara la consulta SQL para seleccionar todos los registros de la tabla 'productos'
        $stmt = $this->pdo->prepare("SELECT * FROM productos");
        
        // Ejecuta la consulta
        $stmt->execute();
        
        // Devuelve todos los resultados como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($ID_producto, $Nombre_producto, $precioProducto, $categoriaProducto, $imagenProducto) {
    $stmt = $this->pdo->prepare("INSERT INTO productos (nombre_producto, descripcion_producto, precio_producto, categoria_producto, imagen_producto)
        VALUES (:nombre, :descripcion, :precio, :categoria, :imagen)");

    return $stmt->execute([
        "nombre" => $productoNombre,
        "descripcion" => $descripcionProducto,
        "precio" => $precioProducto,
        "categoria" => $categoriaProducto,
        "imagen" => $imagenProducto
    ]);
}

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE id_producto = :id");
        return $stmt->execute(['id' => $id]);
    }
    
}
?>
