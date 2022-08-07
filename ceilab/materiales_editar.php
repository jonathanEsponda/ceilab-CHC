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
        $cod_mat = $_GET['id'];
        $consulta = "SELECT * FROM materiales WHERE cod_mat = '$cod_mat'";
        $resultado = mysqli_query($conexion, $consulta);
        if (mysqli_num_rows($resultado) == 1) {
            $fila = mysqli_fetch_array($resultado);
            $nom_mat = $fila['nom_mat'];
            $cantidad = $fila['cantidad'];
            $fecha_ingreso = $fila['fecha_ingreso'];
        }
    }

    if (isset($_POST['materiales_editar'])) {
        $cod_mat = $_GET['id'];
        $nom_mat = $_POST['nom_mat'];
        $cantidad = $_POST['cantidad'];
        $fecha_ingreso = date('Y-m-d', time());

        $consulta = "UPDATE materiales SET nom_mat = '$nom_mat', cantidad = '$cantidad', fecha_ingreso ='$fecha_ingreso' WHERE cod_mat = $cod_mat";
        $resultado = mysqli_query ($conexion, $consulta);

        if (!$resultado) {
            die("Consulta Fallida");
        }
        $_SESSION['mensaje'] = 'Material modificado correctamente';
        $_SESSION['tipo_mensaje'] = 'warning';

        header("Location: materiales.php");
    }
    
?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body ">
                    <form action="materiales_editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <h3 class="text-center text-info">Editar datos del material</h3>
                    <br>
                        <div class="form group">
                            <input type="text" name="nom_mat" value="<?php echo $nom_mat; ?>"
                             class="form-control p-2" placeholder="Modificar nombre">
                        </div>
                        <br>
                        <div class="form group">
                            <input type="int" name="cantidad" value="<?php echo $cantidad; ?>"
                             class="form-control p-2" placeholder="Modificar cantidad">
                        </div>
                        <br>
                        <button class="btn btn-success" name="materiales_editar">
                            Modificar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php");?> 