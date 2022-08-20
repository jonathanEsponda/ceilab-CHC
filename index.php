<?php include ("database/db.php"); ?>

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
          <a href="index.php">
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
              <!-- Inicio de sesión -->
              <nav class="navbar navbar-light bg-light">
                <form class="container-fluid justify-content-start">
                <a href="login.vista.php"> 
                <button class="btn btn-outline-success me-2" type="button">Iniciar Sesion</button>
                </a>  
                </form>
              </nav>

              <nav class="navbar navbar-light bg-light">
                <form class="container-fluid justify-content-start">
                <a href="signup.vista.php"> 
                <button class="btn btn-outline-primary me-2" type="button">Registrarse</button>
                </a>  
                </form>
              </nav>

            </div>
          </div>
        </nav>

<div class="container">
<img src="images/panoramica2.jpg" class="d-block w-100 pt-5">
    <!-- Mensajes -->

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



 <!-- Sección tarjetas de competencias -->
 <h3 class="text-center text-success p-4">Concursos de robótica</h3>
  <div class="row row-cols-1 row-cols-md-3 g-4">
  
        <?php 
        $consulta = "SELECT * FROM concursos_rob";
        $resultado = mysqli_query($conexion, $consulta);
        
        // Mostrar tarjetas si la fecha de la competencia es > a hoy
        while($fila = mysqli_fetch_array($resultado)){ 
          $fecha_con = $fila['fecha_con'];
          $fecha_actual = date('Y-m-d', time());
        ?>
      <div class="col">
          <div class="card h-100">
            <img src="images/sumo.jpg" class="card-img-top" alt="vespa">
            <div class="card-body">
              <h5 class="card-title">
                <?php echo $fila['nom_con']; ?>
              </h5>
              <p class="card-text"><?php echo $fila['fecha_con']?></p>
            </div>
          </div>
      </div>
        <?php }?> 
  </div>
  

</div>
<!-- Mantener sesión iniciada -->
<script>
  document.addEventListener("DOMContentLoaded", function(){
  const milisegundos = 5 *1000;
  setInterval(function(){
      fetch("./refrescar.php");
      },milisegundos);
  });
</script>
<?php include("includes/footer.php")?>
