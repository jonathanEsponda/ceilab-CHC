<?php include('database/db.php');
session_start();

  if(!isset($_SESSION['rol'])){
          header('location: login.vista.php');
      }else{
          if($_SESSION['rol'] != 1){
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
          <a href="#">
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
                    Reservas
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="reservas_lista.php">Reservas a la sala</a></li>
                  </ul>  
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Actividades
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="actividades_lista.php">Actividades realizadas</a></li>
                  </ul>  
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuarios
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="usuarios_lista.php">Usuarios registrados</a></li>
                  </ul>  
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Concursos Ceilab
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="con_rob.php">Administrar concursos</a></li>
                    <li><a class="dropdown-item" href="con_inscriptos.php">Inscriptos</a></li>
                  </ul> 
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Materiales
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="materiales.php">Administrar materiales</a></li>
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
              <nav>
                <form class="container-fluid justify-content-start"><?php echo $nombre.' '.$apellido?></form>
              </nav>
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

        <div class="container">
<img src="images/panoramica2.jpg" class="d-block w-100 pt-5">
    <!-- Sección carrusel -->
    <div id="carousel" class="carousel slide p-5" data-bs-ride="carousel" data-interval="100">
    <div class="carousel-inner">
      
    <div class="carousel-item active">
        <img src="images/sumo1.jpg" class="d-block w-100">
      </div>
      
      <div class="carousel-item">
        <img src="images/impresora.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="images/muestra.jpg" class="d-block w-100">
      </div>      
      <div class="carousel-item">
        <img src="images/herramientas.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="images/sumo.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="images/rack.jpg" class="d-block w-100">
      </div>
    </div> 
  

    <!-- Controles del carrusel-->
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  
  </div>

 <!-- Sección tarjetas de concursos -->
 <h3 class="text-center text-success p-4">Concursos de robótica</h3>
  <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php 
        $consulta = "SELECT * FROM concursos_rob";
        $resultado = mysqli_query($conexion, $consulta);
        
        // Mostrar tarjetas si la fecha de la competencia es > a hoy
        while($fila = mysqli_fetch_array($resultado)){ 
          $fecha_con = $fila['fecha_con'];
          $fecha_actual = date('Y-m-d', time());
            if($fecha_con > $fecha_actual) { 
        ?>
      <div class="col">
        <a href="con_inscribir.php?id=<?php echo $fila['cod_con']?>">
          <div class="card h-100">
            <img src="images/sumo.jpg" class="card-img-top" alt="vespa">
            <div class="card-body">
              <h5 class="card-title">
                <?php echo $fila['nom_con']; ?>
              </h5>
              <p class="card-text"><?php echo $fila['fecha_con']?></p>
            </div>
          </div>
        </a>
      </div>
        <?php } }?> 
  </div>
  

</div>

<?php
include("includes/footer.php");
?>