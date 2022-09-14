<?php

include("database/db.php");

$mensajes = '';
if (isset($_POST['con_rob_guardar'])){
    $nom_con = $_POST['nom_con'];
    $fecha_con = $_POST['fecha_con'];
    $fecha_actual = date('Y-m-d', time());

    // Validacioón de fecha > hoy
    if($fecha_con < $fecha_actual) { 
        echo'<script>
            alert("La fecha debe ser mayor a la de hoy");
            window.location="con_rob.php";
            </script>';    
    } else {
    $consulta = "INSERT INTO concursos_rob(nom_con, fecha_con, cod_u) VALUES ('$nom_con', '$fecha_con', null)";
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        die("Consulta fallida");
        
    }
    echo'<script>
        alert("Competencia guardada correctamente");
        window.location="con_rob.php";
        </script>';
}
mysqli_close($conexion);
}

?>