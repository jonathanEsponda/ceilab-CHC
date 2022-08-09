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
    
           // $consulta = "SELECT * FROM reservas WHERE NOT EXISTS(SELECT * FROM reservas WHERE (fecha_res = '$fecha_res' AND hora_ini_res = '$hora_ini_res'))";
        //    $consulta = "SELECT * FROM reservas WHERE fecha_res = '$fecha_res' AND hora_ini_res = '$hora_ini_res'"; 
        //    $resultado = mysqli_query($conexion, $consulta);
        //     while($filas = mysqli_fetch_array($resultado)){
        //         echo $filas['hora_ini_res'];
        //         echo $filas['hora_fin_res']; 
        //     }  
            
            // if(!$filas) {
            //      $consulta2 = "INSERT INTO reservas(fecha_res, hora_ini_res, hora_fin_res, grupo_res, propuesta_res, cod_u, cod_area) 
            //      VALUES ('$fecha_res','$hora_ini_res','$hora_fin_res','$grupo_res','$propuesta_res','$id','$cod_area')";
            //      $resultado2 = mysqli_query($conexion, $consulta2);
            //  } else {
                //  $fila = mysqli_fetch_array($resultado);
                //  $hora_ini_res_resultado = $fila['hora_ini_res'];   
                //  $hora_fin_res_resultado = $fila['hora_fin_res'];
                //  echo $hora_ini_res_resultado;
                //  echo $hora_fin_res_resultado;
            //  }   
        
        
            // while($fila = mysqli_fetch_assoc($resultado)){
            //      // $row_fecha_reservas = $fila['fecha_res'];
            //      $row_fecha_reservas[]= $fila;
            //  }
            //  if($fila != $fecha_res){
            //     echo "en esa fecha no hay reservas";
            //  } else {
            //     echo "esa fecha ya tiene reservas";
            //  }
            

        //  $fecha_res_resultado = $fila['fecha_res'];
        //  $hora_ini_res_resultado = $fila['hora_ini_res'];
        //  $hora_fin_res_resultado = $fila['hora_fin_res'];
        
        //  $consulta1 = "SELECT * FROM reservas WHERE fecha_res = '$fecha_res'";
        //  $resultado1 = mysqli_query($conexion, $consulta1);
        
        //      $fila = mysqli_fetch_array($resultado1);
            
           
        //      if ($resultado1 == true){
                
                
        //          if ($resultado1 == true && $hora_ini_res_resultado != $hora_ini_res && $hora_fin_res_resultado > $hora_fin_res){
                  
                
        //      } else {
        //          $consulta3 = "INSERT INTO reservas(fecha_res, hora_ini_res, hora_fin_res, grupo_res, propuesta_res, cod_u, cod_area) 
        //          VALUES ('$fecha_res','$hora_ini_res','$hora_fin_res','$grupo_res','$propuesta_res','$id','$cod_area')";
        //          $resultado3 = mysqli_query($conexion, $consulta3);
        //      } 
        //      }
                
          
    // } else {
    //     echo "No se obtuvo resultado 1"; 
    }
    //     if($hora_ini_res != $hora_ini_res_resultado){

         
    //      } else {
    //      header("Location:resevar.vista.php");
    //  }
?>


