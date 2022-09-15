<?php include ("database/db.php");
session_start();
 if(!isset($_SESSION['rol'])){
   header('location: login.vista.php');
 }else{
   if($_SESSION['rol'] != 2){
       header('location: login.vista.php');
   }
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
          
        <?php if($_SESSION['rol'] == 1) {?>
            <a href="home_admin.php"><IMG SRC="images/logo.jpg" ALIGN=LEFT WIDTH=60 HEIGHT=35 HSPACE="10" VSPACE="10" ></a>
              <?php } else { ?>
                <a href="home_user.php"><IMG SRC="images/logo.jpg" ALIGN=LEFT WIDTH=60 HEIGHT=35 HSPACE="10" VSPACE="10" ></a>
                <?php } ?><a href="#">

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
                    <li><a class="dropdown-item" href="actividades.vista.php">Actividades realizadas en la sala</a></li>
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
                <div class="col-md-6 mx-auto">
                    <?php 
                    if(isset($_GET['id'])){
                        $cod_act = $_GET['id'];
                        
                        $consulta = "SELECT * FROM actividades 
                        INNER JOIN reservas ON actividades.cod_res = reservas.cod_res 
                        INNER JOIN usuarios ON reservas.cod_u = usuarios.cod_u 
                        INNER JOIN areas_reserva ON reservas.cod_area = areas_reserva.cod_area
                        WHERE cod_act = $cod_act";
                         $resultado = mysqli_query($conexion, $consulta);
                         if (mysqli_num_rows($resultado) == 1) {
                            $fila = mysqli_fetch_array($resultado);
                            $desc_act = $fila['desc_act'];
                            $nombre_u = $fila['nombre_u'];
                            $apellido_u = $fila['apellido_u'];
                            $grupo_res = $fila['grupo_res'];
                            $nom_area = $fila['nom_area'];
                            //$nom_mat = $fila['nom_mat'];
                         }
                          
                    }
                    ?>
                    <div class="card h-100 pt-5">
          
                        <div class="card-body">
                        
                            <h3 class="card-title">Descripción de la actividad: </h3>
                            <h4 class="card-title"> <?php echo $desc_act?></h4><br>
                            <h4 class="card-title">Docente: <?php echo $nombre_u." ".$apellido_u?></h4><br>
                            <h4 class="card-title">Grupo: <?php echo $grupo_res?></h4><br>
                            <h4 class="card-title">Area de trabajo: <?php echo $nom_area?></h4>
                      
                        </div>
                      </div>
                      </div>
                      <div class="col-md-4">
                      <table class="table table-bordered ">
                    <thead class="table-light">
                        <tr>
                            <th>Actividad</th>
                            <th>Materiales utilizados</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                          $consulta2 = "SELECT * FROM actividades 
                          INNER JOIN utiliza ON actividades.cod_act = utiliza.cod_act
                          INNER JOIN materiales ON utiliza.cod_mat = materiales.cod_mat
                          WHERE cod_act = $cod_act";
                          $resultado2 = mysqli_query($conexion, $consulta2);
                          
                          while($fila2 = mysqli_fetch_array($resultado)) { ?>
                          <tr>
                                <td><?php echo $fila2['desc_act']?></td>
                                <td><?php echo $fila2['nom_mat']?></td>
                          <tr>
                            <?php } ?>
                    </tbody>
                      </table>
                            </div>
                    

                
                </div>
        </div>
        <?php include("includes/footer.php"); ?>