
<?php
    include("database/db.php");
    $mensajes = '';
     if (isset($_GET['id'])) {

        $cod_mat = $_GET['id'];
        $consulta = "DELETE FROM materiales WHERE cod_mat = '$cod_mat'";
        $resultado = mysqli_query($conexion, $consulta);
        
        if (!$resultado) {
            die("Consulta Fallida");
        }

        $mensajes .= "<li class='mensajeRojo'>Material eliminado correctamente</li>"; 
        
        require "materiales.php";
   
     }

?>