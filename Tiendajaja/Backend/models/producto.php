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
/*
// Se importa el archivo que contiene la configuración de la base de datos, que establece la conexión
require "../config/conexion.php"; 

// Definición de la clase 'producto' que interactúa con la tabla 'productos' en la base de datos
class producto {
    // Propiedad privada para almacenar la conexión PDO
    private $pdo;

    // Constructor: recibe una instancia de PDO (conexión a la base de datos) y la asigna a $this->pdo
    public function __construct($pdo) {
        $this->pdo = $pdo;  
    }

    // READ: Método para obtener todos los productos
    public function obtenerTodos() {
        // 1. Prepara la consulta SQL para seleccionar todos los registros de la tabla 'productos'
        $stmt = $this->pdo->prepare("SELECT * FROM productos");

        // 2. Ejecuta la consulta
        $stmt->execute();

        // 3. Devuelve todos los resultados como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ (individual): Método para obtener un solo producto por su ID
    public function obtenerPorId($ID_producto) {
        // Prepara la consulta con un marcador de posición para evitar inyecciones SQL
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE id_producto = :id");

        // Ejecuta la consulta con el parámetro correspondiente
        $stmt->execute(['id' => $ID_producto]);

        // Devuelve un solo resultado como array asociativo
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // CREATE: Método para agregar un nuevo producto a la base de datos
    public function agregar($ID_producto, $Nombre_producto, $Descripcion_producto, $Precio_producto) {
        // Prepara la consulta de inserción con parámetros nombrados
        $stmt = $this->pdo->prepare("INSERT INTO productos (id, nombre, descripcion, precio)
            VALUES (:id, :nombre, :descripcion, :precio)");

        // Ejecuta la consulta pasando los valores en un array asociativo
        return $stmt->execute([
            "id" => $ID_producto,
            "nombre" => $Nombre_producto,
            "descripcion" => $Descripcion_producto,
            "precio" => $Precio_producto
        ]);
    }

    // UPDATE: Método para actualizar los datos de un producto existente
    public function actualizar($ID_producto, $Nombre_producto, $Precio_producto) {
        // Prepara la consulta de actualización
        $stmt = $this->pdo->prepare("UPDATE productos 
            SET nombre_producto = :nombre, precio_producto = :precio 
            WHERE id_producto = :id");

        // Ejecuta la consulta con los nuevos valores
        return $stmt->execute([
            "id" => $ID_producto,
            "nombre" => $Nombre_producto,
            "precio" => $Precio_producto
        ]);
    }

    // DELETE: Método para eliminar un producto según su ID
    public function eliminar($ID_producto) {
        // Prepara la consulta de eliminación
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE id_producto = :id");

        // Ejecuta la eliminación del producto correspondiente
        return $stmt->execute(['id' => $ID_producto]);
    }
}
*/
?>

