<?php
include('./Logica/conexion.php');

$mensaje = ""; // variable para mostrar luego

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO registro (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "usuario registrado con éxito";
    } else {
        $mensaje = "error al registrar el usuario " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="container" id="container">
        <h1 class="titulo">Agregar Usuario</h1>

        <form method="POST" action="registro.php" class="formulario">
            
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" required><br>

            <input type="submit" value="agregar usuario" class="boton-enviar">
        </form>

        <?php if ($mensaje): ?>
            <div class="mensaje-exito">
                <p><?= $mensaje ?></p>
            </div>
        <?php endif; ?>

        <a href="./tabla.php">Volver a la lista</a>
    </div>

</body>

</html>