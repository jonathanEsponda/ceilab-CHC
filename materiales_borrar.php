<?php
    include("database/db.php");
    session_start();

    
     if (isset($_GET['id'])) {

        $cod_mat = $_GET['id'];
        $consulta = "DELETE FROM materiales WHERE cod_mat = '$cod_mat'";
        $resultado = mysqli_query($conexion, $consulta);
        
        if (!$resultado) {
            die("Consulta Fallida");
        }

        $_SESSION['mensaje'] = 'Material eliminado correctamente';
        $_SESSION['tipo_mensaje'] = 'danger';
        header("Location: materiales.php");
   
     }

?>