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
          <a href="home_admin.php">
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

<div class="container">
    <div class="row p-5">
    <table class="table table-bordered ">
                    <thead class="table-light">
                        <tr>
                            <th>Código conc.</th>
                            <th>Nombre del concurso</th>
                            <th>Fecha</th>
                            <th>Categoría</th>
                            <th>Institución</th>
                            <th>Grupo</th>
                            <th>Docente</th>
                            <th>Nombre del robot</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $consulta = "SELECT * FROM inscribe INNER JOIN concursantes ON inscribe.cod_concursante = concursantes.cod_concursante
                        RIGHT JOIN concursos_rob ON inscribe.cod_con = concursos_rob.cod_con ORDER BY concursos_rob.fecha_con, cat_concursante";
                        
                        $result = mysqli_query($conexion, $consulta);

                        while($fila = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $fila['cod_con']?></td>
                                <td><?php echo $fila['nom_con']?></td>
                                <td><?php echo $fila['fecha_con']?></td>
                                <td><?php echo $fila['cat_concursante']?></td>
                                <td><?php echo $fila['nom_institucion']?></td>
                                <td><?php echo $fila['nom_grupo']?></td>
                                <td><?php echo $fila['nom_docente']?></td>
                                <td><?php echo $fila['nom_robot']?></td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
    </div>
</div>

<?php
include("includes/footer.php");
?>