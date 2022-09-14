<?php

function limpiarDatos($datos){
  $datos = htmlspecialchars($datos);
  $datos = trim($datos);
  $datos = filter_var($datos, FILTER_SANITIZE_STRING);

  return $datos;
}

 ?>
