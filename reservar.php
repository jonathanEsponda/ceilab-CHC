<?php 
include("database/db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

 if (isset($_POST['reservar'])){
    
         $nombre_u = $_POST['nombre_u'];
         $apellido_u = $_POST['apellido_u'];
         $ced_u = $_POST['ced_u'];
         $email_u = $_POST['email_u'];
         $tel_u = $_POST['tel_u'];
         $fecha_res = $_POST['fecha_res'];
         $hora_ini_res = $_POST['hora_ini_res'];
         $hora_fin_res = $_POST['hora_fin_res'];
         $cod_area = $_POST['cod_area'];
         $grupo_res = $_POST['grupo_res'];
         $propuesta_res = $_POST['propuesta_res'];
        

        $consulta1 = "SELECT * FROM reservas WHERE fecha_res = '$fecha_res'";
        $resultado1 = mysqli_query($conexion, $consulta1);
        $fila = mysqli_fetch_array($resultado1);
        if ($resultado1 == true){
        $hora_ini_res_resultado = $fila['hora_ini_res'];
        $hora_fin_res_resultado = $fila['hora_fin_res'];
    } 
        if($hora_ini_res != $hora_ini_res_resultado){

         $consulta = "INSERT INTO reservas(fecha_res, hora_ini_res, hora_fin_res, grupo_res, propuesta_res, cod_u, cod_area) 
         VALUES ('$fecha_res','$hora_ini_res','$hora_fin_res','$grupo_res','$propuesta_res','$id','$cod_area')";
         $resultado = mysqli_query($conexion, $consulta);
        }
         
         if ($resultado){
             echo "hay reserva";
         } else {
             echo "no hay resultado";
             
         }

         } else {
         header("Location:signup.php");
     }
?>


