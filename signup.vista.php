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

              <span></span>
            </div>
          </div>
        </nav>


        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center p-5">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="signup.php" method="post">
                            <h3 class="text-center text-success">Registrarse</h3>
                            <div class="form-group">
                                <label for="nombre_u" class="text p-1">Nombre: </label><br>
                                <input type="text" name="nombre_u" id="nombre_u_signup" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="apellido_u" class="text p-1">Apellido: </label><br>
                                <input type="text" name="apellido_u" id="apellido_u_signup" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="ced_u" class="text p-1">Cédula de identidad: </label><br>
                                <input type="text" name="ced_u" id="ced_u_signup" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="tel_u" class="text p-1">Teléfono:</label><br>
                                <input type="text" name="tel_u" id="tel_u_signup" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="email_u" class="text p-1">Correo electrónico: </label><br>
                                <input type="email" name="email_u" id="email_u_signup" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="clave_u" class="text p-1">Contraseña:</label><br>
                                <input type="password" name="clave_u" id="clave_u_signup" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="cod_tipo" class="text p-1">Tipo de usuario: </label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cod_tipo" id="cod_tipo_prof" 
                                    value="2"  checked>
                                    <label class="form-check-label" for="flexRadio">
                                    Usuario
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cod_tipo" id="tipo_u_admin"
                                    value="1">
                                    <label class="form-check-label" for="flexRadio">
                                    Administrador
                                    </label>
                                </div>
                            </div>
                            <ul>
                              <?php if (!empty($mensajes)): ?>
                              <?php echo $mensajes ?>
                              <?php endif; ?>
                            </ul>
                            <div class="form-group pt-2">
                                <input type="submit" name="registrar" class="btn btn-success btn-md" value="Registrar">
                            </div>
                        </form>  
                    </div>
                    <a href="<?php echo 'login.vista.php' ?>" class="login-link">¿Ya tienes cuenta?</a>
                </div>
            </div>
        </div>



<?php include("includes/footer.php")?>