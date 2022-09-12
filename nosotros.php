<?php
include('database/db.php');
session_start();



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
        
        <!-- Direccionamiento de Icono principal -->
        <?php if(!isset($_SESSION['id'])){ ?>  
        <a href="index.php">
          <?php } else if($_SESSION['rol'] == 1) {?>
            <a href="home_admin.php">
              <?php } else { ?>
                <a href="home_user.php">
                <?php } ?>
          <IMG SRC="images/logo.jpg" ALIGN=LEFT WIDTH=60 HEIGHT=35 HSPACE="10" VSPACE="10" >   
          </a>
          <div class="container-fluid">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
              
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <?php if(isset($_SESSION['id'])) { ?>
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

                <li class="nav-item">
                  <a class="nav-link" href="materiales.php">Materiales</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                  <a class="nav-link" href="nosotros.php">Nosotros</a>
                </li>
              
                </ul>
                <!-- Nombre y apellido del usuario ingresado -->
              <?php 
              if(isset($_SESSION['id'])){
                $id = $_SESSION['id'];
                 
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
              <?php } else {?>
                 
                <!-- Inicio de sesión -->
              <nav class="navbar navbar-light bg-light">
                <form class="container-fluid justify-content-start">
                <a href="login.vista.php"> 
                <button class="btn btn-outline-success me-2" type="button">Iniciar Sesion</button>
                </a>  
                </form>
              </nav>

              <!-- Registro -->
              <nav class="navbar navbar-light bg-light">
                <form class="container-fluid justify-content-start">
                <a href="signup.vista.php"> 
                <button class="btn btn-outline-primary me-2" type="button">Registrarse</button>
                </a>  
                </form>
              </nav>
              <?php }?>
              <span></span>
              
            </div>
          </div>
        </nav>

<div class="container p4">
        <h1>CEILAB </h1>
        <P>Laboratorio de robotica</P>
          <h5>¿Como inicio CEILAB?</h5>
            <P>En el año 2018 en el marco de un concurso, Plan Ceibal recibió propuestas para conformar laboratorios de robótica (CEILAB) en instituciones educativas de todo el país. 
              De esta forma es que surge el actual Laboratorio de robótica en la Escuela Catalina Harriague de Castaños, conjuntamente con la iniciativa de los docentes  Mauricio Ferreira 
              y Fitzgeral Ferrari que presentaron un proyecto para concretar dicho laboratorio. El mismo fue aprobado por Ceibal y a fines del 2019 se otorga físicamente el laboratorio a la  Escuela.  
              El proyecto, llamado “APLICACIÓN DE LA TECNOLOGÍAS CEIBAL LAB EN EL FPB DE ROBÓTICA Y EN LA FORMACIÓN DE DOCENTES EN EL ÁREA TÉCNICA-TECNOLÓGICA y de ALUMNOS de la ESCUELA”, se propuso 
              como innovación metodológica, el uso y aplicación de las tecnologías de Ceibal Lab en las prácticas de laboratorio que se desarrollan en los cursos de formación. Los objetivos de dichas 
              prácticas se basan en potenciar la fase de investigación, diseño y desarrollo de productos técnicos relacionados con las áreas de formación y/o especialización de los estudiantes.</P> 
              <p>Los laboratorios de Plan Ceibal permiten incorporar el Pensamiento computacional aplicado a los proyectos de resolución de problemas y prototipado. Entre los temas factibles de desarrollo 
              y aplicación se encuentra la implementación de tecnología 3D.  
              </P>
            
            </div>


<?php include("includes/footer.php")?>