<?php
include('database/db.php');
include('includes/header.php')

?>


<div class="container p-4">
<h3 class="text-center text-success">Inscripción a competencias</h3>
    <div class="row">
        <!-- Mensajes -->
        <?php session_start(); if(isset($_SESSION['mensaje'])){?>
            <div class="alert alert-<?=$_SESSION['tipo_mensaje'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset(); }?>   
    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $consulta = "SELECT * FROM competencias";
                        $result_comp = mysqli_query($conexion, $consulta);

                        while($fila = mysqli_fetch_array($result_comp)) { ?>
                            <tr>
                                <td><?php echo $fila['cod_comp']?></td>
                                <td><?php echo $fila['nom_comp']?></td>
                                <td><?php echo $fila['fecha_comp']?></td>
                                <td>
                                    <a href="competencia_inscribir.php?id=<?php echo $fila['cod_comp']?>" class="btn btn-secondary">
                                        Inscripción
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>  
    
    </div>
</div>