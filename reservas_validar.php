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
  
            $consulta2 = "UPDATE reservas SET validacion= 1 WHERE cod_res = $cod_res";
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