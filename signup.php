<?php 
include ("database/db.php");
include ("functions.php");

$mensajes = '';

if (isset($_POST['registrar'])){
    if(strlen($_POST['nombre_u']) >= 1 && strlen($_POST['apellido_u']) >= 1 && strlen($_POST['ced_u']) == 8 &&
    strlen($_POST['email_u']) >= 1 && strlen($_POST['clave_u']) >= 1 && strlen($_POST['tel_u']) >= 1) {
       
        $nombre_u = limpiarDatos($_POST['nombre_u']);
        $apellido_u = limpiarDatos($_POST['apellido_u']);
        $ced_u = limpiarDatos($_POST['ced_u']);
        $email_u = limpiarDatos($_POST['email_u']);
        $clave_u = limpiarDatos($_POST['clave_u']);
        $tel_u = limpiarDatos($_POST['tel_u']);
        
        $consulta = "INSERT INTO usuarios(nombre_u, apellido_u, ced_u, email_u, clave_u, tel_u, cod_tipo, estado_u) 
        VALUES ('$nombre_u','$apellido_u','$ced_u','$email_u', ' $clave_u', '$tel_u', 2, 'activo')";
        $resultado = mysqli_query($conexion, $consulta);
        
        if ($resultado){
            echo'<script>
                  alert("Usuario registrado correctamente");
                  window.location="login.vista.php";
                  </script>';
        } else {
            echo'<script>
                  alert("No se pudo registrar el usuario");
                  window.location="signup.vista.php";
                  </script>';
        }
        
        }else {
            echo'<script>
                  alert("Ingrese la cédula correctamente, sin puntos ni guiones");
                  window.location="signup.vista.php";
                  </script>';
        }
        mysqli_close($conexion);
    } else {
        echo'<script>
                  alert("El usuario no se registró");
                  window.location="signup.vista.php";
                  </script>';
    }
?>