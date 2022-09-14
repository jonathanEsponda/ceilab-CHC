<?php
    include("database/db.php");
    
    $mensajes = '';
    
     if (isset($_GET['id'])) {

        $cod_con = $_GET['id'];
        $consulta = "DELETE FROM concursos_rob WHERE cod_con = '$cod_con'";
        $resultado = mysqli_query($conexion, $consulta);
        
        if (!$resultado) {
            die("Consulta Fallida");
        }
        echo'<script>
                  alert("El concurso fue borrado correctamente");
                  window.location="con_rob.php";
                  </script>';
   
        mysqli_close($conexion); }

?>