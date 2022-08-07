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
                <form action="materiales_guardar.php" method="POST">
                <h3 class="text-center text-info">Ingresar nuevo material</h3>
                    <div class="form-group">
                        <input type="text" name="nom_mat" class="form-control"
                        placeholder="Nombre del material">
                    </div> <br>
                    <div class="form-group">
                        <input type="int" name="cantidad"  class="form-control"
                        placeholder="Cantidad"></input>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block" name="materiales_guardar" 
                    value="Guardar">
                </form>
            </div>
        </div>

        <!-- Tabla -->
        <div class= "col-md-8">
        <h3 class="text-center text-info">Materiales del laboratorio</h3>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Fecha de ingreso</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $consulta = "SELECT * FROM materiales";
                        $result_comp = mysqli_query($conexion, $consulta);

                        while($fila = mysqli_fetch_array($result_comp)) { ?>
                            <tr>
                                <td><?php echo $fila['cod_mat']?></td>
                                <td><?php echo $fila['nom_mat']?></td>
                                <td><?php echo $fila['cantidad']?></td>
                                <td><?php echo $fila['fecha_ingreso']?></td>
                                <td>
                                    <a href="materiales_editar.php?id=<?php echo $fila['cod_mat']?>" class="btn btn-secondary">
                                        Editar
                                    </a>
                                    <a href="materiales_borrar.php?id=<?php echo $fila['cod_mat']?>" class="btn btn-danger">
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