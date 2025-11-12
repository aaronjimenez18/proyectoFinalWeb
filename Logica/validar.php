<?php
session_start();
 include ('./conexion.php');    
 $usuario = $_POST['nombre_usuario'];
 $password =$_POST['password'];

$q = "SELECT COUNT(*) as contar FROM login WHERE username ='$usuario' AND password ='$password'";

$consulta = mysqli_query($conn,$q);

$array=mysqli_fetch_array($consulta);
if( $array['contar']>0){

    $_SESSION['username']=$usuario;
    header("location: ../tabla.php");

}else{
    header("location: ../index.php");
}

?>
