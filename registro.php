<?php
include('./Logica/conexion.php');

$mensaje = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO registro (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";

    try {
        if ($conn->query($sql) === TRUE) {
            $mensaje = "Usuario registrado con éxito";
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            $mensaje = "Error: correo electrónico ya registrado.";
        } else {
            $mensaje = "Error al registrar el usuario: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="style.css">

    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<div class="login-wrapper">
    <div class="login-left">
        <div class="login-card">

            <h4 class="brand-title">
                <i class="material-icons">person_add</i> Agregar Usuario
            </h4>

            <form method="POST" action="registro.php" class="formulario">

                <label>Nombre:</label>
                <input type="text" name="nombre" required>

                <label>Email:</label>
                <input type="email" name="email" required>

                <label>Teléfono:</label>
                <input type="text" name="telefono" required>

                <button type="submit" class="login-btn boton-enviar">
                    Agregar usuario
                </button>
            </form>

            <?php if ($mensaje): ?>
                <?php $claseMensaje = (strpos($mensaje, 'Error') === 0) ? 'mensaje-error' : 'mensaje-exito'; ?>
                <div class="<?= $claseMensaje ?>">
                    <?= $mensaje ?>
                </div>
            <?php endif; ?>

            <a href="./tabla.php" class="btn btn-cancelar boton-volver">
                <i class="material-icons left">close</i>Volver a la lista
            </a>

        </div>
    </div>
</div>



</body>
</html>
