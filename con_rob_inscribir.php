<?php

include("database/db.php");
include("includes/header.php");



if(isset($_GET['id'])) {
    $cod_comp = $_GET['id'];
    $consulta = "SELECT * FROM competencias WHERE cod_comp = '$cod_comp'";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_array($resultado);
        $nom_comp = $fila['nom_comp'];
        $fecha_comp = $fila['fecha_comp'];
    }
}

if (isset($_POST['competencia_inscribir'])){
    $nom_inst = $_POST['nom_inst'];
    $nom_grupo = $_POST['nom_grupo'];
    $nom_doc = $_POST['nom_doc'];
    $ape_doc = $_POST['ape_doc'];
    $nom_robot = $_POST['nom_robot'];
    $categoria = $_POST['categoria'];

    $consulta = "INSERT INTO competidores(nom_institucion, nom_grupo, nom_docente, apellido_docente, nom_robot, categoria) 
    VALUES ('$nom_inst','$nom_grupo','$nom_doc','$ape_doc','$nom_robot','$categoria')";
    
    
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        die("Consulta fallida");

    }
    session_start();
    $_SESSION['mensaje'] = 'Competidor guardado correctamente';
    $_SESSION['tipo_mensaje'] = 'success';
    

    header("Location: competencias_creadas.php");
   
}

?>



<div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body ">
                    <form action="competencia_inscribir.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form group">
                            <input type="text" name="nom_inst" 
                             class="form-control p-2" placeholder="Nombre de la institución">
                        </div>
                        <div class="form group">
                            <input type="text" name="nom_grupo" 
                             class="form-control p-2" placeholder="Nombre del grupo">
                        </div>
                        <div class="form group">
                            <input type="text" name="nom_doc" 
                             class="form-control p-2" placeholder="Nombre de docente">
                        </div>
                        <div class="form group">
                            <input type="text" name="ape_doc" 
                             class="form-control p-2" placeholder="Apellido de docente">
                        </div>
                        <div class="form group">
                            <input type="text" name="nom_robot" 
                             class="form-control p-2" placeholder="Nombre del robot">
                        </div>
                        <div class="input-group">
                        <select class="form-control" name="categoria">
                            <option value="">Selecciona una categoría</option>
                            <option value="innovacion">Innovación tecnológica</option>
                            <option value="sumo">Sumo</option>
                            <option value="carrera">Carrera</option>
                        </select>
                    </div>
                        
                        <button class="btn btn-success" name="competencia_inscribir">
                            Inscribir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>