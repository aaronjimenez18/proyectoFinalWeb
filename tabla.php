<?php
include('./Logica/conexion.php');

if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $stmt = $conn->prepare("UPDATE registro SET nombre=?, email=?, telefono=? WHERE id=?");
    $stmt->bind_param("sssi", $nombre, $email, $telefono, $id);
    $stmt->execute();
    $stmt->close();
}

$edit_id = isset($_GET['editar']) ? $_GET['editar'] : null;

$result = mysqli_query($conn, "SELECT * FROM registro");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="style.css">

    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<header class="header-principal">
    <div class="header-contenido">
        <div>
            <div class="header-titulo">UNAM</div>
            <div class="header-subtitulo">Lista de usuarios</div>
        </div>
    </div>
</header>

<div class="container">

    <h3 class="center-align">Usuarios Registrados</h3>

    <div class="center-align">
        <a href="registro.php" class="btn btn-guardar">
            <i class="material-icons left">person_add</i>Registrar usuario
        </a>
    </div>

    <div class="table-responsive">
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
                        <td><?= $row['id'] ?></td>

                        <td><input type="text" name="nombre" value="<?= $row['nombre'] ?>"></td>
                        <td><input type="email" name="email" value="<?= $row['email'] ?>"></td>
                        <td><input type="text" name="telefono" value="<?= $row['telefono'] ?>"></td>

                        <td>
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="actualizar" class="btn btn-guardar">
                                <i class="material-icons left">save</i>Guardar
                            </button>
                            <a href="tabla.php" class="btn btn-cancelar">
                                <i class="material-icons left">cancel</i>Cancelar
                            </a>
                        </td>
                    </form>

                    <?php } else { ?>

                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['telefono'] ?></td>

                    <td>
                        <a href="tabla.php?editar=<?= $row['id'] ?>" class="btn btn-editar">
                            <i class="material-icons left">edit</i>Editar
                        </a>
                        <a href="./Logica/eliminar.php?id=<?= $row['id'] ?>" class="btn btn-eliminar">
                            <i class="material-icons left">delete</i>Eliminar
                        </a>
                    </td>

                    <?php } ?>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

</div>


</body>
</html>
