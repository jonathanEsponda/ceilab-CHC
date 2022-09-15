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

if(isset($_GET['id'])) {
  $cod_res = $_GET['id'];
  $consulta = "SELECT * FROM reservas INNER JOIN usuarios ON reservas.cod_u = usuarios.cod_u 
  INNER JOIN areas_reserva ON reservas.cod_area = areas_reserva.cod_area WHERE cod_res = '$cod_res'";
  $resultado = mysqli_query($conexion, $consulta);
  if (mysqli_num_rows($resultado) == 1) {
      $fila = mysqli_fetch_array($resultado);
      $fecha_res = $fila['fecha_res'];
      $apellido_u = $fila['apellido_u'];
      $email_u = $fila['email_u'];
      $nom_area = $fila['nom_area'];
      $grupo_res = $fila['grupo_res'];
      $propuesta_res = $fila['propuesta_res'];
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
                    <li><a class="dropdown-item" href="reservas_usuario.php">Mis reservas</a></li>
                  </ul>
                  
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Actividades
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="actividades.vista.php">Actividades realizadas</a></li>
                    <li><a class="dropdown-item" href="act_res.php">Registrar actividad</a></li>
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

        <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center p-5">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="actividad.php" method="post">
                            <h3 class="text-center text-success">Registrar actividad</h3>
                            <div class="form-group pt-2">
                                <label for="cod_res" class="text p-1">Código de la reserva: </label><br>
                                <input type="text" name="cod_res" value="<?php echo $cod_res?>" class="form-control" readonly>
                            </div>
                            <div class="form-group pt-2">
                                <label for="nombre_u" class="text p-1">Docente: </label><br>
                                <input type="text" name="nombre_u" value="<?php echo $apellido_u?>" class="form-control" readonly>
                            </div>
                            <div class="form-group pt-2">
                                <label for="nombre_u" class="text p-1">Correo electrónico: </label><br>
                                <input type="text" name="email_u" value="<?php echo $email_u?>" class="form-control" readonly>
                            </div>
                            <div class="form-group pt-2">
                                <label for="fecha_res" class="text p-1">Fecha de la reserva: </label><br>
                                <input type="text" name="fecha_res" value="<?php echo $fecha_res?>" class="form-control" readonly>
                            </div>
                            <div class="form-group pt-2">
                                <label for="area_act" class="text p-1">Área de la actividad: </label><br>
                                <input type="text" name="area_act" class="form-control" value="<?php echo $nom_area ?>" readonly>
                            </div>
                            <div class="form-group pt-2">
                                <label for="grupo_res" class="text p-1">Grupo: </label><br>
                                <input type="text" name="grupo_res" class="form-control" value="<?php echo $grupo_res?>" disabled>
                              </div>
                            <div class="form-group pt-2">
                                <label for="desc_act" class="text p-1">Descripción de la actividad: </label><br>
                                <input type="text" name="desc_act" class="form-control" >
                            </div>
                            <div class="form-group pt-2">
                                <label for="foto_act" class="text p-1">Foto de la actividad </label><br>
                                <input type="file" name="foto_act" class="form-control" >
                            </div><br>
                            
                            <div class="form-group pt-2">
                              <label for="mat" class="text p-1">Materiales utilizados </label><br>
                              
                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat10" value="10">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Tablets Ceibal
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat11" value="11">
                                <label class="form-check-label" for="flexCheckDefault">
                                  PC Ceibal
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat12" value="12">
                                <label class="form-check-label" for="flexCheckDefault">
                                  PC del laboratorio
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat13" value="13">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Placas programables arduino
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat14" value="14">
                                <label class="form-check-label" for="flexCheckDefault">
                                Placas programables micro:bit
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat15" value="15">
                                <label class="form-check-label" for="flexCheckDefault">
                                Placas makey makey
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat16" value="16">
                                <label class="form-check-label" for="flexCheckDefault">
                                Sensor físico químico Globilab
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat17" value="17">
                                <label class="form-check-label" for="flexCheckDefault">
                                Sensor de PH
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat18" value="18">
                                <label class="form-check-label" for="flexCheckDefault">
                                Impresora 3D
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat19" value="19">
                                <label class="form-check-label" for="flexCheckDefault">
                                Herramientas en general (pinzas, destornilladores, morza, guantes, lentes, etc)
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat20" value="20">
                                <label class="form-check-label" for="flexCheckDefault">
                                Fuente regulable
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat21" value="21">
                                <label class="form-check-label" for="flexCheckDefault">
                                Estación de soldadura
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat23" value="23">
                                <label class="form-check-label" for="flexCheckDefault">
                                Kit de Lego EV3
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat24" value="24">
                                <label class="form-check-label" for="flexCheckDefault">
                                Lonas de actividades (seguidor de línea)
                                </label>
                              </div>

                              <div class="form-chec pt-2">
                                <input class="form-check-input" type="checkbox" name ="cod_mat25" value="25">
                                <label class="form-check-label" for="flexCheckDefault">
                                Kit de sensores electrónicos
                                </label>
                              </div>

                            </div>
                            <br>
                            <div class="form-group pt-2">

                                <input type="submit" name="registrar" class="btn btn-success btn-block" value="Registrar">
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>