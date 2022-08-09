<?php 
include("database/db.php");

session_start();
if(!isset($_SESSION['rol'])){
    header('location: login.vista.php');
  }else{
    if($_SESSION['rol'] != 2){
        header('location: login.vista.php');
    }
  }

  if(isset(($_SESSION['id']))){
    $id = $_SESSION['id'];

    $consulta = "SELECT * FROM usuarios WHERE cod_u = '$id'";
    $datos =mysqli_query($conexion, $consulta);
    
    $filas = mysqli_fetch_array($datos);

       if($filas == true){
         $nombre_u = $filas['nombre_u'];
         $apellido_u = $filas['apellido_u'];
         $ced_u = $filas['ced_u'];
         $email_u = $filas['email_u'];
         $tel_u = $filas['tel_u'];
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
                    <li><a class="dropdown-item" href="#">Actividades realizadas en la sala</a></li>
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

              
              <nav>
                <form class="container-fluid justify-content-start"><?php echo $nombre_u.' '.$apellido_u?></form>
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
            <div id="login-row" class="row justify-content-center align-items-center p-5">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="reservar.php?id=<?php echo $id;?>" method="post">
                            <h3 class="text-center text-success">Solicitud de uso de la sala</h3>
                            <div class="form-group">
                                <label for="nombre_u" class="text p-1">Nombre: </label><br>
                                <input type="text" name="nombre_u" value="<?php echo $nombre_u?>" class="form-control" >
                            </div>
                            <div class="form-group pt-2">
                                <label for="apellido_u" class="text p-1">Apellido: </label><br>
                                <input type="text" name="apellido_u" value="<?php echo $apellido_u?>" class="form-control" >
                            </div>
                            <div class="form-group pt-2">
                                <label for="ced_u" class="text p-1">Cédula de identidad: </label><br>
                                <input type="int" name="ced_u" value="<?php echo $ced_u?>" class="form-control" >
                            </div>
                            <div class="form-group pt-2">
                                <label for="tel_u" class="text p-1">Teléfono:</label><br>
                                <input type="int" name="tel_u" value="<?php echo $tel_u?>" class="form-control" >
                            </div>
                            <div class="form-group pt-2">
                                <label for="email_u" class="text p-1">Correo electrónico: </label><br>
                                <input type="email" name="email_u" value="<?php echo $email_u?>" class="form-control" >
                            </div>
                            <div class="form-group pt-2">
                                <label for="fecha_res" class="text p-1">Fecha solicitada: </label><br>
                                <input type="date" name="fecha_res" placeholder="aaaa/mm/dd" class="form-control" >
                            </div>
                            <div class="form-group pt-2">
                                <label for="hora_ini_res" class="text p-1">Hora de inicio: </label><br>
                                <input type="time" name="hora_ini_res" placeholder="--:--" class="form-control" >
                            </div>
                            <div class="form-group pt-2">
                                <label for="hora_fin_res" class="text p-1">Hora final: </label><br>
                                <input type="time" name="hora_fin_res" placeholder="--:--" class="form-control" >
                            </div>
                            <div class="form-group pt-2">
                                <label for="cod_area" class="text p-1">Área: </label><br>
                                <div class="form-check pt-2">
                                    <input class="form-check-input" type="radio" name="cod_area" value="1">
                                    <label class="form-check-label" for="flexRadio">
                                    Mecánica
                                    </label>
                                </div>
                                <div class="form-check pt-2">
                                    <input class="form-check-input" type="radio" name="cod_area" value="2">
                                    <label class="form-check-label" for="flexRadio">
                                    Informática
                                    </label>
                                </div>
                                <div class="form-check pt-2">
                                    <input class="form-check-input" type="radio" name="cod_area" value="3">
                                    <label class="form-check-label" for="flexRadio">
                                    Robótica
                                    </label>
                                </div>
                                <div class="form-check pt-2">
                                    <input class="form-check-input" type="radio" name="cod_area" value="4">
                                    <label class="form-check-label" for="flexRadio">
                                    Electricidad
                                    </label>
                                </div>
                                <div class="form-check pt-2">
                                    <input class="form-check-input" type="radio" name="cod_area" value="4">
                                    <label class="form-check-label" for="flexRadio">
                                    Otro
                                    </label>
                                </div>
                            </div>
                            <div class="form-group pt-2">
                                <label for="grupo_res" class="text p-1">Grupo: </label><br>
                                <input type="text" name="grupo_res" class="form-control" >
                                </div>
                                <div class="form-group pt-2">
                                <label for="propuesta_res" class="text p-1">Propuesta: </label><br>
                                <textarea type="text" name="propuesta_res" class="form-control" rows="2"></textarea>
                            </div><br>
                            <div class="form-group pt-2">
                                <input type="submit" name="reservar" class="btn btn-success btn-block" value="Solicitar">
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div> 