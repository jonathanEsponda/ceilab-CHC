<?php
    include("database/db.php");
 
     if (isset($_GET['id'])) {

        $cod_u = $_GET['id'];
        $consulta = "DELETE FROM usuarios WHERE cod_u = '$cod_u'";
        $resultado = mysqli_query($conexion, $consulta);
        
        if (!$resultado) {
            die("Consulta Fallida");
        } else {
            echo'<script>
                  alert("El usuario fue borrado correctamente");
                  window.location="usuarios_lista.php";
                  </script>';
        }   
   
     }

?>