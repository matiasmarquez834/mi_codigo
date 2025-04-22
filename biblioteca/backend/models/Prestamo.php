<?php
// Se importa el archivo que contiene la configuración de la base de datos
require "../config/database.php";

// Definición de la clase Prestamo que interactúa con la tabla 'prestamos' en la base de datos
class Prestamo {
    private $pdo; // Conexión PDO

    // Constructor que recibe la conexión a la base de datos
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para obtener todos los préstamos
    public function obtenerTodos() {
        // Prepara la consulta SQL para seleccionar todos los registros de la tabla 'prestamos'
        $stmt = $this->pdo->prepare("SELECT * FROM prestamos");

        // Ejecuta la consulta
        $stmt->execute();

        // Devuelve todos los resultados como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para agregar un nuevo préstamo
    public function agregar($id_libro, $id_usuario, $fecha_prestamos, $fecha_devolucion) {
        // Prepara la consulta SQL para insertar un nuevo registro en la tabla 'prestamos'
        $stmt = $this->pdo->prepare(
            "INSERT INTO prestamos (id_libro, id_usuario, fecha_prestamos, fecha_devolucion) 
             VALUES (:id_libro, :id_usuario, :fecha_prestamos, :fecha_devolucion)"
        );

        // Ejecuta la consulta con los parámetros
        return $stmt->execute([
            "id_libro" => $id_libro,
            "id_usuario" => $id_usuario,
            "fecha_prestamos" => $fecha_prestamos,
            "fecha_devolucion" => $fecha_devolucion
        ]);
    }
}
?>
