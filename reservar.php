<?php 
include("database/db.php");

 if(isset($_GET['id'])) {
     $id = $_GET['id'];
 }

$mensajes = '';

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
    
    //Pendiente validar reserva 


    // $consulta1 = "SELECT COUNT(*) AS total FROM reservas WHERE fecha_res = $fecha_res";
    // $resultado1 = mysqli_query($conexion, $consulta1);
    
    $consulta = "SELECT * FROM reservas WHERE fecha_res = '$fecha_res'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_num_rows($resultado);
    
    if($filas >= 1){
    while($rows = mysqli_fetch_array($resultado)){
      echo $rows['hora_ini_res'];
      echo $rows['hora_fin_res'];
    }

    $consulta = "SELECT * FROM reservas WHERE fecha_res = '$fecha_res'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_num_rows($resultado);
    
    if($filas >= 1){
    while($rows = mysqli_fetch_array($resultado)){
      echo $rows['hora_ini_res'];
      echo $rows['hora_fin_res'];
    }

    } else {
      $consulta2 = "INSERT INTO reservas(fecha_res, hora_ini_res, hora_fin_res, grupo_res, propuesta_res, cod_u, cod_area) 
      VALUES ('$fecha_res','$hora_ini_res','$hora_fin_res','$grupo_res','$propuesta_res','$id','$cod_area')";
      $resultado2 = mysqli_query($conexion, $consulta2);
     
      if($resultado2 == true) {
      $mensajes .= "<li class='mensajeVerde'>La reserva fue realizada correctamente</li>";
      header("location: reservar.vista.php");    
  }
  }   
}
  
  
  
} 
  $mensajes .= "<li class='mensajeVerde'>Concursante registrado correctamente</li>"; 

?>


