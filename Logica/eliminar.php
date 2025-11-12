<?php
include('conexion.php');

if (!isset($_GET['id'])) {
    die("Error: Falta el parámetro ID");
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM registro WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: ../tabla.php');
    exit();
} else {
    echo "Error al eliminar: " . $conn->error;
}
?>
