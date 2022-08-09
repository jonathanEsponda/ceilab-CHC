<?php 
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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link  rel="stylesheet" href="css/bootstrap.css">
    <link  rel="stylesheet" href="css/style.css">

    <title>CEILAB</title>
  </head>
  <body>
    <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a href="home_admin.php">
          <IMG SRC="images/logo.jpg" ALIGN=LEFT WIDTH=60 HEIGHT=35 HSPACE="10" VSPACE="10" >   
          </a>
          <div class="container-fluid">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item">
                  <a class="nav-link" href="nosotros.php">Nosotros</a>
                </li>
              </ul>

              <!-- Cerrar sesión -->
              <nav class="navbar navbar-light bg-light">
                <form class="container-fluid justify-content-start">
                <a href="cerrar_sesion.php"> 
                <button class="btn btn-outline-danger me-2" type="button">Cerrar Sesion</button>
                </a>  
                </form>
              </nav>
              
              <span></span>
            </div>
          </div>
        </nav>

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
                            <th>Grupo</th>
                            <th>Docente</th>
                            <th>Área de trabajo</th>
                            <th>Propuesta</th>
                            <th>Fecha de la reserva</th>
                            <th>Hora de inicio</th>
                            <th>Hora de fin.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $consulta = "SELECT * FROM reservas INNER JOIN usuarios ON reservas.cod_u = usuarios.cod_u 
                        INNER JOIN areas_reserva ON reservas.cod_area = areas_reserva.cod_area ORDER BY reservas.fecha_res";
                        $result_comp = mysqli_query($conexion, $consulta);

                        while($fila = mysqli_fetch_array($result_comp)) { ?>
                            <tr>
                                <td><?php echo $fila['cod_res']?></td>
                                <td><?php echo $fila['grupo_res']?></td>
                                <td><?php echo $fila['apellido_u']?></td>
                                <td><?php echo $fila['nom_area']?></td>
                                <td><?php echo $fila['propuesta_res']?></td>
                                <td><?php echo $fila['fecha_res']?></td>
                                <td><?php echo $fila['hora_ini_res']?></td>
                                <td><?php echo $fila['hora_fin_res']?></td> 
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
    </div>
</div>
<?php include("includes/footer.php");?>