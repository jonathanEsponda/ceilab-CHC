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
                            <th>Nombre competencia</th>
                            <th>Fecha</th>
                            <th>Institución</th>
                            <th>Grupo</th>
                            <th>Nombre docente</th>
                            <th>Apellido docente</th>
                            <th>Nombre del robot</th>
                            <th>Categoría</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $consulta = "SELECT * FROM competencias INNER JOIN inscribe
                        ON competencias.cod_comp = inscribe.cod_comp INNER JOIN competidores 
                        ON inscribe.cod_competidor = competidores.cod_competidor";
                        $result_comp = mysqli_query($conexion, $consulta);

                        while($fila = mysqli_fetch_array($result_comp)) { ?>
                            <tr>
                                <td><?php echo $fila['nom_comp']?></td>
                                <td><?php echo $fila['fecha_comp']?></td>
                                <td><?php echo $fila['nom_institucion']?></td>
                                <td><?php echo $fila['nom_grupo']?></td>
                                <td><?php echo $fila['nom_docente']?></td>
                                <td><?php echo $fila['apellido_docente']?></td>
                                <td><?php echo $fila['nom_robot']?></td>
                                <td>
                                    <a href="competencia_editar.php?id=<?php echo $fila['cod_comp']?>" class="btn btn-secondary">
                                        Editar
                                    </a>
                                    <a href="competencia_borrar.php?id=<?php echo $fila['cod_comp']?>" class="btn btn-danger">
                                        Borrar
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
    </div>
</div>