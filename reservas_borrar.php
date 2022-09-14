<?php
    include("database/db.php");
 
     if (isset($_GET['id'])) {

        $cod_res = $_GET['id'];
        $consulta = "DELETE FROM reservas WHERE cod_res = '$cod_res'";
        $resultado = mysqli_query($conexion, $consulta);
        
        if (!$resultado) {
            die("Consulta Fallida");
        } else {
            echo'<script>
                  alert("La reserva fue borrada correctamente");
                  window.location="home_admin.php";
                  </script>';
        }   
        mysqli_close($conexion);
     }

?>