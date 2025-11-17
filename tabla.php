<?php
include('./Logica/conexion.php');


if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];


    $sql = "UPDATE registro SET nombre='$nombre', email='$email', telefono='$telefono' WHERE id=$id";
    mysqli_query($conn, $sql);
}


$edit_id = isset($_GET['editar']) ? $_GET['editar'] : null;


$result = mysqli_query($conn, "SELECT * FROM registro");
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
                Lista de usuarios
            </div>
        </div>
    </div>
    </header>

    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <div class="card-panel white-text center-align" 
            style="background-color: #021e47; max-width: 500px; margin: 20px auto;">
                <h5 style="font-size: 34px; margin: 10px 0;">Usuarios Registrados</h5>
        </div>


        <div class="center-align">
            <a href="registro.php" class="btn btn-guardar">
                <i class="material-icons left">person_add</i>Registrar usuario
            </a>
        </div>

        <table class="highlight centered z-depth-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <?php if ($edit_id == $row['id']) { ?>
                            <form method="POST" action="tabla.php">
                                <td><?php echo $row['id']; ?></td>
                                <td><input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"></td>
                                <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
                                <td><input type="text" name="telefono" value="<?php echo $row['telefono']; ?>"></td>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="actualizar" class="btn btn-guardar">
                                        <i class="material-icons left">save</i>Guardar
                                    </button>
                                    <a href="tabla.php" class="btn btn-cancelar">
                                        <i class="material-icons left">cancel</i>Cancelar
                                    </a>
                                </td>
                            </form>
                        <?php } else { ?>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td>
                                <a href="tabla.php?editar=<?php echo $row['id']; ?>" class="btn btn-editar">
                                    <i class="material-icons left">edit</i>Editar
                                </a>
                                <a href="./Logica/eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-eliminar">
                                    <i class="material-icons left">delete</i>Eliminar
                                </a>
                            </td>
                        <?php } ?>
                    </tr>x
                <?php } ?>
            </tbody>
        </table>
    </div>

        <footer class="page-footer" 
            style="background-color: #021e47; text-align: center; padding: 20px 0; color: white;">
            © 2025 FES Aragón - Lista y registro de usuarios. Todos los derechos reservados.
        </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

