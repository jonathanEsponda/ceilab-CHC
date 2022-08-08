<?php include("includes/header.php");
session_start();

  if(!isset($_SESSION['rol'])){
          header('location: login.php');
      }else{
          if($_SESSION['rol'] != 1){
              header('location: login.php');
          }
      }

  if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
  }   
?>
<!-- Nuevo registro -->
 <div class="container" >

    <a href="usuarios_lista.php">Lista de Usuarios</a>
    <a href="con_rob.php">Concursos de robótica</a>
    <a href="materiales.php">Materiales del laboratorio</a>
    <a href="con_inscriptos.php">Inscriptos en concursos</a>
    
</div> 