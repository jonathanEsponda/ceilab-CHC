<?php
    include("database/db.php");
    session_start();

    
     if (isset($_GET['id'])) {

        $cod_con = $_GET['id'];
        $consulta = "DELETE FROM concursos_rob WHERE cod_con = '$cod_con'";
        $resultado = mysqli_query($conexion, $consulta);
        
        if (!$resultado) {
            die("Consulta Fallida");
        }

        $_SESSION['mensaje'] = 'Competencia eliminada correctamente';
        $_SESSION['tipo_mensaje'] = 'danger';
        header("Location: con_rob.php");
   
     }

?>