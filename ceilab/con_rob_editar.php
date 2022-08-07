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
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body ">
                    <form action="con_rob_editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
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