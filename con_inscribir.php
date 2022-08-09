<?php
include("database/db.php");


$mensajes = '';

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
            $consulta2 = "SELECT cod_concursante FROM concursantes";
            $resultado2 = mysqli_query($conexion, $consulta2);
            $fila = mysqli_fetch_array($resultado2);
            $cod_concursante = $fila[count($fila)-1];
            } else {
                die("Consulta 2 fallida");
                 echo "Consulta 2 fallida";
                 if ($resultado2 == true) {
                     // Insertar datos en la tabla inscribe
                     $consulta3 = "INSERT INTO inscribe(cod_con, cod_concursante, fecha_inscripcion) VALUES ('$cod_con','$cod_concursante','$fecha_inscripcion')";
                     $resultado3 = mysqli_query($conexion, $consulta3);

                 } else {
                    die("Consulta 3 fallida");
                    echo "Consulta 3 fallida";
                     
                  
                     if (!$resultado3) {
                     die("Consulta 2 fallida");
                     } 
                     $mensajes .= "<li class='mensajeVerde'>concursante registrado correctamente</li>"; 
                    require "index.php";

             }
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
                    <li><a class="dropdown-item" href="con_rob_vista_usuario.php">Inscripción a concursos</a></li>
                  </ul> 
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="nosotros.php">Nosotros</a>
                </li>
              </ul>

              <!-- Nombre y apellido del usuario ingresado -->
              
              
                
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
            <!-- Mensajes -->
            <ul>
                <?php if (!empty($mensajes)): ?>
                <?php echo $mensajes ?>
                <?php endif; ?>
            </ul>
            <div class="col-md-6 mx-auto">
            <h3 class="text-center text-success">Inscripción a concurso: <?php echo $nom_con;?></h3>
                <div class="card card-body ">
                    <form action="con_inscribir.php?id=<?php echo $_GET['id']; ?>" method="POST">
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