<?php
// Datos de conexión a la base de datos
$db_host = "localhost";
$db_user = "root";  // Cambia por tu usuario de MySQL
$db_password = "";  // Cambia por tu contraseña de MySQL
$db_name = "php_prueba";

// Crear la conexión
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>