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
    <header style="background-color: #021e47; padding: 10px 25px; border-bottom: 3px solid #033268;">
    <div style="display: flex; align-items: center; gap: 15px;">
        <img src="https://amei.mx/wp-content/uploads/2016/08/UNAM-FES-Aragon.png" 
             alt="Logo UNAM" 
             style="height: 50px;">

        <div style="color: white;">
            <div style="font-size: 18px; font-weight: bold;">
                FES Aragón – UNAM
            </div>
            <div style="font-size: 13px; opacity: 0.9;">
                Registro de usuarios
            </div>
        </div>
    </div>
    </header>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
 

    <div class="card-panel white-text center-align" 
        style="background-color: #021e47; max-width: 500px; margin: 20px auto;">
            <h5 style="font-size: 34px; margin: 10px 0;">Agregar Usuario</h5>
    </div>


    <div class="container" id="container">
    <form method="POST" action="registro.php" class="formulario">
        
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Teléfono:</label>
        <input type="text" name="telefono" required><br>

        <input type="submit" value="Agregar usuario" class="boton-enviar">
    </form>

    <?php if ($mensaje): ?>
        <?php
            $claseMensaje = (strpos($mensaje, 'Error') === 0) ? 'mensaje-error' : 'mensaje-exito';
         ?>
        <div class="<?= $claseMensaje ?>">
            <p><?= $mensaje ?></p>
        </div>
    <?php endif; ?>

    <a href="./tabla.php">Volver a la lista</a>
</div>


        <footer class="page-footer" 
            style="background-color: #021e47; text-align: center; padding: 20px 0; color: white;">
            © 2025 FES Aragón - Lista y registro de usuarios. Todos los derechos reservados.
        </footer>
</body>

</html>
