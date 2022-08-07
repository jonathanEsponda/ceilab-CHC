<?php

include("database/db.php");
session_start();



if (isset($_POST['con_rob_guardar'])){
    $nom_con = $_POST['nom_con'];
    $fecha_con = $_POST['fecha_con'];
    $fecha_actual = date('Y-m-d', time());

    // Validacioón de fecha > hoy
    if($fecha_con < $fecha_actual) { 
        $_SESSION['mensaje'] = 'La fecha debe ser mayor a la de hoy';
        $_SESSION['tipo_mensaje'] = 'danger';
        header("Location: con_rob.php");
        
    } else {
    $consulta = "INSERT INTO concursos_rob(nom_con, fecha_con, cod_u) VALUES ('$nom_con', '$fecha_con', null)";
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        die("Consulta fallida");
    }

    $_SESSION['mensaje'] = 'Competencia guardada correctamente';
    $_SESSION['tipo_mensaje'] = 'success';

    header("Location: con_rob.php");
}
}

?>