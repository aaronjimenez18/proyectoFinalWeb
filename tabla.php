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
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h3 class="center-align">Usuarios registrados</h3>

        <div class="center-align">
            <a href="registro.php" class="btn btn-guardar">
                <i class="material-icons left">person_add</i>Registrar usuario
            </a>
        </div>

        <table class="highlight centered">
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
                            <!-- Fila en modo edición -->
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
                            <!-- Fila normal -->
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
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
