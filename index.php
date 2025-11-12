<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Iniciar Sesion</title>
</head>
<body>

<div class="container" id="container">

    <div class="form-container sign-in">
        <form action="./Logica/validar.php" method="POST">
            <h1>Iniciar sesión</h1>
            <label for="nombre_usuario">Nombre de Usuario</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>

            <br>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>

            <br>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>

</div>

<script src="script.js"></script>
</body>
</html>
