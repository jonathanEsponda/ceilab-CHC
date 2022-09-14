<?php
include("database/db.php");
session_start();
 
//Obtener el id de la competencia seleccionada
if(isset($_GET['id'])) {
    $cod_con = $_GET['id'];
    $consulta = "SELECT * FROM concursos_rob WHERE cod_con = '$cod_con'";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) == 1) {
        $filas = mysqli_fetch_array($resultado);
        $nom_con = $filas['nom_con'];
        $fecha_con = $filas['fecha_con'];
    }
}

// Recibir los datos del formulario
if (isset($_POST['con_inscribir'])){
    $nom_institucion = $_POST['nom_institucion'];
    $nom_grupo = $_POST['nom_grupo'];
    $nom_docente = $_POST['nom_docente'];
    $nom_robot = $_POST['nom_robot'];
    $cat_concursante = $_POST['cat_concursante'];
    $fecha_inscripcion = date('Y-m-d', time());

    // Insertar datos
    $consulta = "INSERT INTO concursantes(nom_institucion, nom_grupo, nom_docente, nom_robot, cat_concursante) 
    VALUES ('$nom_institucion','$nom_grupo','$nom_docente','$nom_robot','$cat_concursante')";
    $resultado = mysqli_query($conexion, $consulta);
    
        if ($resultado == true) {
            
            //Consultar el ultimo concursante para obtener su ID
            $consulta2 = "SELECT * FROM concursantes WHERE cod_concursante = (SELECT MAX(cod_concursante) from concursantes) ";
            $resultado2 = mysqli_query($conexion, $consulta2);
            $fila = mysqli_fetch_array($resultado2);
            $cod_concursante = $fila[0];
          } else {
            die("Consulta 2 fallida");
             echo "Consulta 2 fallida";
            }
            if ($cod_concursante == true) {
                  
              // Insertar datos en la tabla inscribe
              $consulta3 = "INSERT INTO inscribe(cod_con, cod_concursante, fecha_inscripcion) VALUES ('$cod_con','$cod_concursante','$fecha_inscripcion')";
              $resultado3 = mysqli_query($conexion, $consulta3);
              
              if (!$resultado3) {
                die("Consulta 2 fallida");
                } else{
                  echo'<script>
                  alert("Se regitró correctamente en el concurso");
                  window.location="home_user.php";
                  </script>';
              }
              } else {
             die("Consulta 3 fallida");
             echo "Consulta 3 fallida";
           }
               
        mysqli_free_result($resultado2);
        mysqli_close($conexion);
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
                    Reservar sala
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="reservar.vista.php">Reservar la sala Ceilab</a></li>
                  </ul>  
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Actividades
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="actividades_vista.php">Actividades realizadas en la sala</a></li>
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
                <?php } ?>
                <li class="nav-item">
                  <a class="nav-link" href="nosotros.php">Nosotros</a>
                </li>
              </ul>

              <!-- Nombre y apellido del usuario ingresado -->
              <?php  
              if(isset($_SESSION['id'])){
                $id = $_SESSION['id'];

              $consulta4 = "SELECT * FROM usuarios WHERE cod_u = $id";
              $resultado4 = mysqli_query($conexion, $consulta4);
              $fila = mysqli_fetch_array($resultado4);
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


<div class="container p-4">
        <div class="row">
            <div class="col-md-6 mx-auto">

            <h3 class="text-center text-success">Inscripción a concurso: <?php echo $nom_con;?></h3>
            <br>
                <div class="card card-body ">
                    <form action="con_inscribir.php?id=<?php echo $_GET['id']; mysqli_close($conexion); ?>" method="POST">
                        <div class="form group">
                            <input type="text" name="nom_institucion" 
                             class="form-control p-2" placeholder="Nombre de la institución">
                        </div><br>
                        <div class="form group">
                            <input type="text" name="nom_grupo" 
                             class="form-control p-2" placeholder="Nombre del grupo">
                        </div><br>
                        <div class="form group">
                            <input type="text" name="nom_docente" 
                             class="form-control p-2" placeholder="Nombre de docente">
                        </div><br>
                        <div class="form group">
                            <input type="text" name="nom_robot" 
                             class="form-control p-2" placeholder="Nombre del robot">
                        </div><br>
                        <div class="input-group">
                            <select class="form-control" name="cat_concursante">
                                <option value="">Selecciona una categoría</option>
                                <option value="innovacion">Innovación tecnológica</option>
                                <option value="sumo">Sumo</option>
                                <option value="carrera">Carrera</option>
                            </select>
                        </div><br>
                        
                        <button class="btn btn-success" name="con_inscribir">
                            Inscribir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php")?>