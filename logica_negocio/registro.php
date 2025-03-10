<?php

// Definimos la clase Usuario
class Usuario {
    public $nombre;
    public $correo;
    private $password;

    // Constructor
    public function __construct($nombre, $correo, $password) {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->setPassword($password);
    }

    // Método para establecer la contraseña (hash)
    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Método para obtener la contraseña (solo para propósitos de prueba)
    public function getPasswordHash() {
        return $this->password;
    }

    // Método para mostrar datos (opcional)
    public function mostrarDatos() {
        return "Nombre: $this->nombre <br> Correo: $this->correo <br> Hash de la Contraseña: " . $this->password;
    }
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validaciones básicas
    if (empty($nombre) || empty($correo) || empty($password) || empty($confirm_password)) {
        die("Error: Todos los campos son obligatorios.");
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        die("Error: El correo electrónico no es válido.");
    }

    if ($password !== $confirm_password) {
        die("Error: Las contraseñas no coinciden.");
    }

    // Crear objeto Usuario
    $usuario = new Usuario($nombre, $correo, $password);

    // Mostrar los datos del usuario (solo para prueba)
    echo $usuario->mostrarDatos();
}
?>
