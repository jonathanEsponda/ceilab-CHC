
<?php 
include ("database/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$ced_u = $_POST['ced_u'];
$clave_u = $_POST['clave_u'];
session_start();
$_SESSION["usuario"] = $ced_u;

//consulta
 $consulta = "SELECT * FROM usuarios WHERE ced_u = '$ced_u' AND clave_u = ' $clave_u' ";
 $datos =mysqli_query($conexion, $consulta);
 $filas = mysqli_fetch_array($datos);

// Se crea la sesión 'rol'
if($filas == true){
 $rol = $filas['cod_tipo'];
 $_SESSION['rol'] = $rol;

 // Validación de tipo de usuario
 if($filas['cod_tipo'] == 1){ 
    header("location:home_admin.php");
} else if($filas['cod_tipo'] == 2){
    header("location:home_user.php");
 } else {
  echo "error al ingresar";
 }
} else {
    $_SESSION['mensaje'] = 'Cédula o contraseña ingresadas son incorrectas';
    $_SESSION['tipo_mensaje'] = 'danger';
    header('location: login.php');
}
 mysqli_free_result($datos);
 mysqli_close($conexion);
}





?>
