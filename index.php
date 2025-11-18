<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Iniciar Sesion</title>
    <style>
        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
        }
    </style>
</head>
<body>

<!-- Loader en el login -->
<div class="loader-container" id="loader">
    <div style="font-size: 20px; margin-bottom: 20px;">Verificando credenciales...</div>
    <div class="progress">
        <div class="indeterminate"></div>
    </div>
</div>

<div class="login-wrapper">
    <div class="login-left">
        <div class="login-card">
            <h4 class="brand-title">
                <i class="material-icons gold-text">school</i> Login
            </h4>
            <p class="login-subtitle">Iniciar Sesión</p>

            <form action="./Logica/validar.php" method="POST" onsubmit="showLoader()">
                <input type="text" id="usuario" name="nombre_usuario" placeholder="Usuario" required>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                <button class="btn login-btn" type="submit">
                    Iniciar Sesión
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function showLoader() {
        document.getElementById('loader').style.display = 'flex';
    }
</script>

</body>
</html>