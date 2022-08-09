<?php 
include ("database/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$ced_u = $_POST['ced_u'];
$clave_u = $_POST['clave_u'];
session_start();

$mensajes = '';
//consulta
 $consulta = "SELECT * FROM usuarios WHERE ced_u = '$ced_u' AND clave_u = ' $clave_u' ";
 $datos =mysqli_query($conexion, $consulta);
 $filas = mysqli_fetch_array($datos);
 
if($filas == true){
    // Se crea la sesión 'rol'
    $rol = $filas['cod_tipo'];
    $_SESSION['rol'] = $rol;
        // Se crea la sesión ID
        $id = $filas['cod_u'];
        $_SESSION['id'] = $id;

 // Validación de tipo de usuario
 if($filas['cod_tipo'] == 1){ 
    header("location:home_admin.php");
} else if($filas['cod_tipo'] == 2){
    header("location:home_user.php");
} else {
  echo "error al ingresar";
 }
} else {
    
    $mensajes .= "<li class='mensajeRojo'>La cédula o contraseña ingresadas son incorrectas</li>"; 

    require "login.vista.php";
    
}
 mysqli_free_result($datos);
 mysqli_close($conexion);
}


?>