<?php include("includes/header.php");
session_start();

 if(!isset($_SESSION['rol'])){
         header('location: login.php');
     }else{
         if($_SESSION['rol'] != 1){
             header('location: login.php');
         }
     }
?>
<!-- Nuevo registro -->
<div class="container" >

    <a href="usuarios_lista.php">Lista de Usuarios</a>
    <a href="con_rob.php">Concursos de robótica</a>
    <a href="materiales.php">Materiales del laboratorio</a>
</div>