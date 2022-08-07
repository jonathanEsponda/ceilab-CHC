<?php

    include("database/db.php");
    include("includes/header.php");
    
    session_start();
    if(!isset($_SESSION['rol'])){
        header('location:login.php');
    } else{
        if($_SESSION['rol'] != 1){
            header('location: login.php');
        }
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