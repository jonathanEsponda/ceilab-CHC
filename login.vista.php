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
              
              <span></span>
            </div>
          </div>
        </nav>
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center p-5">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="login.php" method="POST">
                       
                            <h3 class="text-center text-info">Ingresar</h3>
                            <div class="form-group">
                                <label for="ced_u" class="text-info p-1">Cedula de usuario:</label><br>
                                <input type="text" name="ced_u" id="ced_u" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="clave_u" class="text-info p-1">Contraseña:</label><br>
                                <input type="password" name="clave_u" id="clave_u" class="form-control" required>
                            </div>
                            <br>
                            <!-- Mensajes -->
                            <ul>
                              <?php if (!empty($mensajes)): ?>
                              <?php echo $mensajes ?>
                              <?php endif; ?>
                            </ul> 
                            
                            <div class="form-group pt-2">
                                <input type="submit" name="ingresar" class="btn btn-info btn-md" value="Ingresar">
                            </div>
                            <a href="<?php echo 'signup.vista.php' ?>" class="login-link">¿No tienes cuenta?</a>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php") ?>