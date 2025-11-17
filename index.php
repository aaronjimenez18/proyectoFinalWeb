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

<div class="login-wrapper">

    <div class="login-left">
        <div class="login-card">

            <h4 class="brand-title">
                <i class="material-icons gold-text">school</i> Login
            </h4>

            <p class="login-subtitle">Iniciar Sesión</p>

            <form action="./Logica/validar.php" method="POST">

                <input type="text" id="usuario" name="nombre_usuario" placeholder="Usuario" required>

                <input type="password" id="password" name="password" placeholder="Contraseña" required>

                <button class="btn login-btn" type="submit">
                    Iniciar Sesión
                </button>

            </form>

        </div>
    </div>

    <div class="login-right">
        <img src="https://www.unam.mx/sites/default/files/images/unam.svg" class="side-img">
    </div>

</div>

</body>
</html>
