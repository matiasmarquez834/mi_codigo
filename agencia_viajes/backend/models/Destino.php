<?php
// Se importa el archivo que contiene la configuración de la base de datos, que establece la conexión
require_once "../config/database.php"; // Importar la conexión a la base de datos

// Definición de la clase Libro que interactuará con la tabla 'libros' en la base de datos
class Destino {
    private $pdo;  // Declaración de una propiedad privada para almacenar la conexión PDO

    // El constructor recibe el objeto $pdo (conexión a la base de datos) y lo asigna a la propiedad $this->pdo
    public function __construct($pdo) {
        $this->pdo = $pdo;  // Asigna la conexión PDO a la propiedad de la clase
    }

    // Método para obtener todos los libros de la base de datos
    public function obtenerTodos() {
        // Prepara la consulta SQL para seleccionar todos los registros de la tabla 'destino'
        $stmt = $this->pdo->prepare("SELECT * FROM destino");
        
        // Ejecuta la consulta
        $stmt->execute();
        
        // Devuelve todos los resultados como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function agregar($destinoNombre, $descripcionDestino, $destinoPais, $destinoCiudad, $atracciones) {
    $stmt = $this->pdo->prepare("INSERT INTO destino (nombre_destino, descripcion_destino, pais_destino, ciudad_destino, atracciones_principales)
        VALUES (:nombre, :descripcion, :pais, :ciudad, :atracciones)");

    return $stmt->execute([
        "nombre" => $destinoNombre,
        "descripcion" => $descripcionDestino,
        "pais" => $destinoPais,
        "ciudad" => $destinoCiudad,
        "atracciones" => $atracciones
    ]);
}

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM destino WHERE id_destino = :id");
        return $stmt->execute(['id' => $id]);
    }
    
}
?>
