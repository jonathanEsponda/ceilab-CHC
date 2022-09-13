<?php 
 include("database/db.php");

 session_start();
    if(!isset($_SESSION['rol'])){
        header('location:login.vista.php');
    } 
    if(isset($_SESSION['id'])){
      $id = $_SESSION['id'];
    }  

    if(isset($_GET['id'])) {
        $cod_res = $_GET['id'];
        $consulta = "SELECT * FROM reservas WHERE cod_res = '$cod_res'";
        $resultado = mysqli_query($conexion, $consulta);
        if (mysqli_num_rows($resultado) == 1) {
            $fila = mysqli_fetch_array($resultado);
            $fecha_res = $fila['fecha_res'];
            $hora_ini_res = $fila['hora_ini_res'];
            $hora_fin_res = $fila['hora_fin_res'];
            $grupo_res = $fila['grupo_res'];
            $propuesta_res = $fila['propuesta_res'];
            $cod_u  = $fila['cod_u'];
            $cod_area  = $fila['cod_area'];
            $validacion  = $fila['validacion'];

            $consulta2 = "UPDATE reservas SET fecha_res='$fecha_res',hora_ini_res='$hora_ini_res',hora_fin_res='$hora_fin_res',grupo_res='$grupo_res',propuesta_res='$propuesta_res',`cod_u`='$cod_u',cod_area='$cod_area',validacion= 1 WHERE cod_res = $cod_res";
            $resultado2 = mysqli_query($conexion, $consulta2);
            if($resultado2){
                echo'<script>
                  alert("La reserva se validó correctamente");
                  window.location="reservas_lista.php";
                </script>';
            }
    }
    
        
    


    }

?>