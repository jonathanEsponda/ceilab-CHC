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
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- Mensajes -->
            <?php  if(isset($_SESSION['mensaje'])){?>
            <div class="alert alert-<?=$_SESSION['tipo_mensaje'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php }?>    
                
            <!-- Formulario -->
            <div class="card card-body">
                <form action="con_rob_guardar.php" method="POST">
                <h3 class="text-center text-info">Crear nuevo concurso</h3>
                    <div class="form-group">
                        <input type="text" name="nom_con" class="form-control"
                        placeholder="Nombre del concurso" autofocus>
                    </div> <br>
                    <div class="form-group">
                        <input type="date" name="fecha_con"  class="form-control"
                        placeholder="Fecha de la competencia"></input>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block" name="con_rob_guardar" 
                    value="Guardar">
                </form>
            </div>
        </div>

        <!-- Tabla -->
        <div class= "col-md-8">
        <h3 class="text-center text-info">Lista de concursos de robótica</h3>
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
                        $consulta = "SELECT * FROM concursos_rob";
                        $result_comp = mysqli_query($conexion, $consulta);

                        while($fila = mysqli_fetch_array($result_comp)) { ?>
                            <tr>
                                <td><?php echo $fila['cod_con']?></td>
                                <td><?php echo $fila['nom_con']?></td>
                                <td><?php echo $fila['fecha_con']?></td>
                                <td>
                                    <a href="con_rob_editar.php?id=<?php echo $fila['cod_con']?>" class="btn btn-secondary">
                                        Editar
                                    </a>
                                    <a href="con_rob_borrar.php?id=<?php echo $fila['cod_con']?>" class="btn btn-danger">
                                        Borrar
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>         
        </div>        

    </div>
</div>






<?php
include("includes/footer.php");
?>