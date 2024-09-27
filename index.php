<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['username'])){
            echo "<h1>Bienvenido " . htmlspecialchars($_SESSION['username']) . "</h1>";
            echo "<h1>Formulario de Contacto</h1>";
            echo '<form action="process.php" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required><br><br>
            
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br><br>
            
                    <label for="mensaje">Mensaje:</label><br>
                    <textarea id="mensaje" name="mensaje" required></textarea><br><br>
            
                    <input type="submit" value="Enviar">
                </form>';
            echo '<a href="logout.php">LOGOUT</a>';
        } else {
            header("Location: login.html");
            exit();
        }
    ?>

</body>
</html>