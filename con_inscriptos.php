<?php 
include("includes/header.php");
include("database/db.php");
session_start();
if(!isset($_SESSION['rol'])){
    header('location:login.php');
} else{
    if($_SESSION['rol'] != 1){
        header('location: login.php');
    }
}
?>

<div class="container">
    <div class="row">
    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre del concurso</th>
                            <th>Fecha</th>
                            <th>Categoría</th>
                            <th>Institución</th>
                            <th>Grupo</th>
                            <th>Docente</th>
                            <th>Nombre del robot</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $consulta = "SELECT * FROM inscribe INNER JOIN concursantes ON inscribe.cod_concursante = concursantes.cod_concursante
                        RIGHT JOIN concursos_rob ON inscribe.cod_con = concursos_rob.cod_con ORDER BY concursos_rob.cod_con, cat_concursante";
                        
                        $result = mysqli_query($conexion, $consulta);

                        while($fila = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $fila['nom_con']?></td>
                                <td><?php echo $fila['fecha_con']?></td>
                                <td><?php echo $fila['cat_concursante']?></td>
                                <td><?php echo $fila['nom_institucion']?></td>
                                <td><?php echo $fila['nom_grupo']?></td>
                                <td><?php echo $fila['nom_docente']?></td>
                                <td><?php echo $fila['nom_robot']?></td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
    </div>
</div>