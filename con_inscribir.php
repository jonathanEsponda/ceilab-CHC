<?php

include("database/db.php");
include("includes/header.php");


//Obtener el id de la competencia seleccionada
if(isset($_GET['id'])) {
    $cod_con = $_GET['id'];
    $consulta = "SELECT * FROM concursos_rob WHERE cod_con = '$cod_con'";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) == 1) {
        $filas = mysqli_fetch_array($resultado);
        $nom_con = $filas['nom_con'];
        $fecha_con = $filas['fecha_con'];
    }
}

// Recibir los datos del formulario
if (isset($_POST['con_inscribir'])){
    $nom_institucion = $_POST['nom_institucion'];
    $nom_grupo = $_POST['nom_grupo'];
    $nom_docente = $_POST['nom_docente'];
    $nom_robot = $_POST['nom_robot'];
    $cat_concursante = $_POST['cat_concursante'];
    $fecha_inscripcion = date('Y-m-d', time());

    // Insertar datos
    $consulta = "INSERT INTO concursantes(nom_institucion, nom_grupo, nom_docente, nom_robot, cat_concursante) 
    VALUES ('$nom_institucion','$nom_grupo','$nom_docente','$nom_robot','$cat_concursante')";
    $resultado = mysqli_query($conexion, $consulta);
    
        if (!$resultado) {
            die("Consulta fallida");
            } else {
                //Consultar el ultimo concursante para obtener su ID
                $consulta2 = "SELECT max(cod_concursante) FROM concursantes";
                $resultado2 = mysqli_query($conexion, $consulta2);
                $fila = mysqli_fetch_row($resultado2);
                $cod_concursante = trim($fila[0]);
                if (!$resultado2) {
                    die("Consulta fallida");

                } else {
                    // Insertar datos en la tabla inscribe
                    $consulta3 = "INSERT INTO inscribe(cod_con, cod_concursante, fecha_inscripcion) VALUES ('$cod_con','$cod_concursante','$fecha_inscripcion')";
                    $resultado3 = mysqli_query($conexion, $consulta3);
                    
                    if (!$resultado3) {
                    die("Consulta 2 fallida");
                    } 
                    session_start();
                        $_SESSION['mensaje'] = 'Inscripción realizada correctamente';
                        $_SESSION['tipo_mensaje'] = 'success';
    

                        header("Location: index.php");
            }
        }
}       
?>



<div class="container p-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body ">
                    <form action="con_inscribir.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form group">
                            <input type="text" name="nom_institucion" 
                             class="form-control p-2" placeholder="Nombre de la institución">
                        </div>
                        <div class="form group">
                            <input type="text" name="nom_grupo" 
                             class="form-control p-2" placeholder="Nombre del grupo">
                        </div>
                        <div class="form group">
                            <input type="text" name="nom_docente" 
                             class="form-control p-2" placeholder="Nombre de docente">
                        </div>
                        <div class="form group">
                            <input type="text" name="nom_robot" 
                             class="form-control p-2" placeholder="Nombre del robot">
                        </div>
                        <div class="input-group">
                        <select class="form-control" name="cat_concursante">
                            <option value="">Selecciona una categoría</option>
                            <option value="innovacion">Innovación tecnológica</option>
                            <option value="sumo">Sumo</option>
                            <option value="carrera">Carrera</option>
                        </select>
                    </div>
                        
                        <button class="btn btn-success" name="con_inscribir">
                            Inscribir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>