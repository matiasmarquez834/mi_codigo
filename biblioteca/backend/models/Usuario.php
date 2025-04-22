<?php
require "../config/database.php"; // Conexión a la base de datos

// Clase que representa la tabla 'usuario'
class Usuario {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Obtener todos los usuarios
    public function obtenerTodos() {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar un nuevo usuario
    public function agregar($nombre, $email, $telefono) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO usuario (nombre, email, telefono) 
             VALUES (:nombre, :email, :telefono)"
        );

        return $stmt->execute([
            "nombre" => $nombre,
            "email" => $email,
            "telefono" => $telefono
        ]);
    }
}
?>
