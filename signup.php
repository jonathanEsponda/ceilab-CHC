<?php 
include ("database/db.php");
include ("functions.php");

$mensajes = '';

if (isset($_POST['registrar'])){
    if(strlen($_POST['nombre_u']) >= 1 && strlen($_POST['apellido_u']) >= 1 && strlen($_POST['ced_u']) >= 1 &&
    strlen($_POST['email_u']) >= 1 && strlen($_POST['clave_u']) >= 1 && strlen($_POST['tel_u']) >= 1) {
        $nombre_u = limpiarDatos($_POST['nombre_u']);
        $apellido_u = limpiarDatos($_POST['apellido_u']);
        $ced_u = limpiarDatos($_POST['ced_u']);
        $email_u = limpiarDatos($_POST['email_u']);
        $clave_u = limpiarDatos($_POST['clave_u']);
        $tel_u = limpiarDatos($_POST['tel_u']);
        $cod_tipo = $_POST['cod_tipo'];
        $consulta = "INSERT INTO usuarios(nombre_u, apellido_u, ced_u, email_u, clave_u, tel_u, cod_tipo, estado_u) 
        VALUES ('$nombre_u','$apellido_u','$ced_u','$email_u', ' $clave_u', '$tel_u', '$cod_tipo', 'activo')";
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado){
            $mensajes .= "<li class='mensajeVerde'>Usuario registrado correctamente</li>"; 
            require "login.vista.php";
        } else {
            $mensajes .= "<li class='mensajeVerde'>El usuario no se registró</li>"; 
            require "signup.vista.php";
        }
        }
    } else {
        $mensajes .= "<li class='mensajeVerde'>El usuario no se registró</li>"; 
            require "signup.vista.php";
    }
?>