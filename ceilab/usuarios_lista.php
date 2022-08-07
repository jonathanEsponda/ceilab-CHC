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
    <?php  if(isset($_SESSION['mensaje'])){?>
            <div class="alert alert-<?=$_SESSION['tipo_mensaje'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php }?>
    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cédula</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Tipo de usuario</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $consulta = "SELECT * FROM usuarios";
                        $result_comp = mysqli_query($conexion, $consulta);

                        while($fila = mysqli_fetch_array($result_comp)) { ?>
                            <tr>
                                <td><?php echo $fila['cod_u']?></td>
                                <td><?php echo $fila['nombre_u']?></td>
                                <td><?php echo $fila['apellido_u']?></td>
                                <td><?php echo $fila['ced_u']?></td>
                                <td><?php echo $fila['email_u']?></td>
                                <td><?php echo $fila['tel_u']?></td>
                                <td><?php echo $fila['cod_tipo']?></td>
                                <td>
                                    <a href="usuario_editar.php?id=<?php echo $fila['cod_u']?>" class="btn btn-secondary">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
    </div>
</div>
<?php include("includes/footer.php");?>