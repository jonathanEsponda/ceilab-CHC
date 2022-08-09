<?php

include("database/db.php");

$mensajes = '';
if (isset($_POST['materiales_guardar'])){
    $nom_mat = $_POST['nom_mat'];
    $cantidad = $_POST['cantidad'];
    $fecha_ingreso = date('Y-m-d', time());

    $consulta = "INSERT INTO materiales(nom_mat, cantidad, fecha_ingreso) VALUES ('$nom_mat', '$cantidad', '$fecha_ingreso')";
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        die("Consulta fallida");
    }

    $mensajes .= "<li class='mensajeVerde'>Material ingresado correctamente</li>"; 

    require "materiales.php";
}


?>