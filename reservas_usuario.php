<?php 
include("database/db.php");
session_start();

if(!isset($_SESSION['rol'])){
    header('location:login.vista.php');
} 

if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
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
          <a href="home_user.php">
          <IMG SRC="images/logo.jpg" ALIGN=LEFT WIDTH=60 HEIGHT=35 HSPACE="10" VSPACE="10" >   
          </a>
          <div class="container-fluid">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Reservar sala
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="reservar.vista.php">Reservar la sala Ceilab</a></li>
                    <li><a class="dropdown-item" href="reservas_usuario.php">Mis reservas</a></li>
                  </ul>
                  
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Actividades
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="actividades.vista.php">Actividades realizadas</a></li>
                    <li><a class="dropdown-item" href="act_res.php">Registrar actividad</a></li>
                  </ul>  
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Concursos Ceilab
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="concursos.vista.php">Inscripción a concursos</a></li>
                  </ul> 
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="nosotros.php">Nosotros</a>
                </li>
              </ul>

              <!-- Nombre y apellido del usuario ingresado -->
              <?php 
              $consulta = "SELECT * FROM usuarios WHERE cod_u = $id";
              $resultado = mysqli_query($conexion, $consulta);
              $fila = mysqli_fetch_array($resultado);
              $nombre = $fila['nombre_u'];
              $apellido = $fila['apellido_u'];
              ?>
              
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $nombre.' '.$apellido?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="usuario_editar.php?id=<?php echo $id?>">Editar usuario</a></li>
                  </ul>
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


        <div class="container pt-5">

<div class="row pt-5">
    
            <h3 class="text-center text-success">Mis reservas de la sala Ceilab</h3><br><br><br><br>
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
                            <th>Hora de fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $consulta = "SELECT * FROM reservas INNER JOIN usuarios ON reservas.cod_u = usuarios.cod_u 
                        INNER JOIN areas_reserva ON reservas.cod_area = areas_reserva.cod_area 
                        WHERE reservas.validacion = 1 AND reservas.cod_u = $id ORDER BY reservas.fecha_res DESC";
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
                        <?php } mysqli_close($conexion);?>
                    </tbody>
                </table>
    </div>
</div><br><br><br><br>
<?php include("includes/footer.php"); ?>