<?php 
session_start();
// if(!isset($_SESSION['usuario'])){
//     header('location:login.php');
// }

 if(!isset($_SESSION['rol'])){
   header('location: login.php');
 }else{
   if($_SESSION['rol'] != 2){
       header('location: login.php');
   }
 }

 if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
}

 include ("index.php");
?>






