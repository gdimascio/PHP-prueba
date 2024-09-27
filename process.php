<?php
    require 'config.php';
    
    // recibir los datos
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
        // preparar la consulta SQL
        $stmt = $conn->prepare("INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $mensaje);

        // ejecutar la consulta
        if ($stmt->execute()) {
            echo "Datos guardados!";
        } else {
            echo "Error al guardar los datos: " . $conn->erro;
        }

        // cerrar declaracion
        $stmt->close();
    } else {
        echo "Formulario incompleto.";
    }

    $conn->close();
?>
