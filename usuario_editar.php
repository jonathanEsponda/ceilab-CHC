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
        $cod_u = $_GET['id'];
        $consulta = "SELECT * FROM usuarios WHERE cod_u = '$cod_u'";
        $resultado = mysqli_query($conexion, $consulta);
        if (mysqli_num_rows($resultado) == 1) {
            $fila = mysqli_fetch_array($resultado);
            $nombre_u = $fila['nombre_u'];
            $apellido_u = $fila['apellido_u'];
            $ced_u = $fila['ced_u'];
            $email_u = $fila['email_u'];
            $tel_u = $fila['tel_u'];
        }
    }

    if (isset($_POST['modificar'])) {
        $cod_u = $_GET['id'];
        $nombre_u = $_POST['nombre_u'];
        $apellido_u = $_POST['apellido_u'];
        $ced_u = $_POST['ced_u'];
        $email_u =$_POST['email_u'];
        $tel_u = $_POST['tel_u'];

        $consulta = "UPDATE usuarios SET nombre_u='$nombre_u',`apellido_u`='$apellido_u',`ced_u`='$ced_u',`email_u`='$email_u',`tel_u`='$tel_u' 
        WHERE cod_u = '$cod_u'";
        mysqli_query ($conexion, $consulta);

        if (!$resultado) {
            die("Consulta Fallida");
        }
        $_SESSION['mensaje'] = 'Usuario modificado correctamente';
        $_SESSION['tipo_mensaje'] = 'warning';

        header("Location: usuarios_lista.php");
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
            <div class="row justify-content-center align-items-center p-5">
                <div class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="usuario_editar.php?id=<?php echo $_GET['id']; ?>" method="post">
                            <h3 class="text-center text-success">Modificar usuario</h3>
                            <div class="form-group">
                                <label for="nombre_u" class="text p-1">Nombre: </label><br>
                                <input type="text" name="nombre_u" value="<?php echo $nombre_u;?>" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="apellido_u" class="text p-1">Apellido: </label><br>
                                <input type="text" name="apellido_u" value="<?php echo $apellido_u;?>" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="ced_u" class="text p-1">Cédula de identidad: </label><br>
                                <input type="text" name="ced_u" value="<?php echo $ced_u;?>" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="email_u" class="text p-1">Correo electrónico: </label><br>
                                <input type="email" name="email_u" value="<?php echo $email_u;?>" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="tel_u" class="text p-1">Teléfono: </label><br>
                                <input type="int" name="tel_u" value="<?php echo $tel_u;?>" class="form-control" >
                            </div>
                            <div class="form-group pt-2">
                                <input type="submit" name="modificar" class="btn btn-success btn-md" value="Modificar">
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
       <?php include("includes/footer.php");?>