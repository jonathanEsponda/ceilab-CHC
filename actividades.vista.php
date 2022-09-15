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
          <!-- Icono Home según rol -->
        <?php if($_SESSION['rol'] == 1) {?>
            <a href="home_admin.php"><IMG SRC="images/logo.jpg" ALIGN=LEFT WIDTH=60 HEIGHT=35 HSPACE="10" VSPACE="10" ></a>
              <?php } else { ?>
                <a href="home_user.php"><IMG SRC="images/logo.jpg" ALIGN=LEFT WIDTH=60 HEIGHT=35 HSPACE="10" VSPACE="10" ></a>
                <?php } ?> 
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
<!-- Sección tarjetas de Actividades -->
<h3 class="text-center text-success p-4">Actividades en la sala</h3>
  <div class="row row-cols-1 row-cols-md-3 g-4 pt-5">
        <?php 
        $consulta = "SELECT * FROM actividades" ;
        $resultado = mysqli_query($conexion, $consulta);
        
        // Mostrar tarjetas si la fecha de la competencia es > a hoy
        while($fila = mysqli_fetch_array($resultado)){ 
          $descripcion = $fila['desc_act'];
        
        ?>
      <div class="col">
        <a href="act.php?id=<?php echo $fila['cod_act']?>">
        <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">
                Actividad: <?php echo $descripcion ?>
              </h5>
            </div>
          </div>
        </a>
      </div>
        <?php }  ?> 
  </div><br><br><br><br>
</div>
<?php include("includes/footer.php"); ?>