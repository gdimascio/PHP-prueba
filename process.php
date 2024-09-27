<?php
    require 'config.php';

    // recibir los datos
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // comprobar datos vacios
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        die ("Formulario incompleto.");
    }

    // preparar la consulta SQL
    $query = "INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $nombre, $email, $mensaje);

    // ejecutar la consulta
    if ($stmt->execute()) {
        echo "Datos guardados!";
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }

    // cerrar declaracion
    $stmt->close();

    $conn->close();
?>
