<?php 
include("includes/header.php");
include("database/db.php");

session_start();
if(!isset($_SESSION['rol'])){
    header('location: login.php');
  }else{
    if($_SESSION['rol'] != 2){
        header('location: login.php');
    }
  }

  if(isset($_GET['id'])){
    $id = $_GET['id'];

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