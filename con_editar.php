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
    
    if(isset($_GET['id'])) {
        $cod_con = $_GET['id'];
        $consulta = "SELECT * FROM concursos_rob WHERE cod_con = '$cod_con'";
        $resultado = mysqli_query($conexion, $consulta);
        if (mysqli_num_rows($resultado) == 1) {
            $fila = mysqli_fetch_array($resultado);
            $nom_con = $fila['nom_con'];
            $fecha_con = $fila['fecha_con'];
        }
    }

    if (isset($_POST['con_rob_editar'])) {
        $cod_con = $_GET['id'];
        $nom_con = $_POST['nom_con'];
        $fecha_con = $_POST['fecha_con'];
        $fecha_actual = date('Y-m-d', time());

        if($fecha_con < $fecha_actual) { 
            $_SESSION['mensaje'] = 'La fecha debe ser mayor a la de hoy';
            $_SESSION['tipo_mensaje'] = 'danger';
            header("Location: con_rob.php");
            
        } else {

        $consulta = "UPDATE concursos_rob SET nom_con = '$nom_con', fecha_con ='$fecha_con' WHERE cod_con = $cod_con";
        $resultado = mysqli_query ($conexion, $consulta);

        if (!$resultado) {
            die("Consulta Fallida");
        }
        $_SESSION['mensaje'] = 'Competencia actualizada correctamente';
        $_SESSION['tipo_mensaje'] = 'warning';

        header("Location: con_rob.php");
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

    <div class="container p-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body ">
                    <form action="con_editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <h3 class="text-center text-info">Editar concurso de robótica</h3>
                    <br>
                        <div class="form group">
                            <input type="text" name="nom_con" value="<?php echo $nom_con; ?>"
                             class="form-control p-2" placeholder="Actualizar nombre">
                        </div>
                        <br>
                        <div class="form group">
                            <input name="fecha_con" type="date" class="form-control" rows="2" value= "<?php echo $fecha_con;?>">
                               
                            </input>
                        </div>
                        <br>
                        <button class="btn btn-success" name="con_rob_editar">
                            Modificar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php");?> 