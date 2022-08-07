<?php include ("includes/header.php");
session_start();
?>
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center p-5">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="login_backend.php" method="POST">
                       
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
                            <?php if(isset($_SESSION['mensaje'])){?>
                            <div class="alert alert-<?=$_SESSION['tipo_mensaje'];?> alert-dismissible fade show" role="alert">
                                <?= $_SESSION['mensaje'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php session_unset(); }?> 
                            
                            <div class="form-group pt-2">
                                <input type="submit" name="ingresar" class="btn btn-info btn-md" value="Ingresar">
                            </div>
                            
                        </form>
                    </div>
                    <a href="<?php echo 'signup.php' ?>" class="login-link">¿No tienes cuenta?</a>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php") ?>
