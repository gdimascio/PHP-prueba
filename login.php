<?php
session_start();
require 'config.php';

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta para buscar al usuario
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc(); // Primera fila del resultado
$hash = password_hash($user['password'], PASSWORD_DEFAULT); // Contraseña hasheada
// Comprobar si existe el usuario y contraseña
if ($result->num_rows > 0 && password_verify($password, $hash)) {

    // Guardar datos en la sesión
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: index.php");
    exit();
    } else {
        echo "Usuario o contraseña no existe.";
    }

// Cerrar conexión
$stmt->close();
$conn->close();
?>
