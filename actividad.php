<?php 
include("database/db.php");

if (isset($_POST['registrar'])){
    
    $desc_act = $_POST['desc_act'];
    $foto_act = $_POST['foto_act'];
    $cod_res = $_POST['cod_res'];
    
    if(isset($_POST['cod_mat10'])){
    $cod_mat10 = $_POST['cod_mat10'];
    }
    if(isset($_POST['cod_mat11'])){
        $cod_mat11 = $_POST['cod_mat11'];
    }
    if(isset($_POST['cod_mat12'])){
        $cod_mat12 = $_POST['cod_mat12'];
    }
    if(isset($_POST['cod_mat13'])){
        $cod_mat13 = $_POST['cod_mat13'];
    }
    if(isset($_POST['cod_mat14'])){
        $cod_mat14 = $_POST['cod_mat14'];
    }
    if(isset($_POST['cod_mat15'])){
        $cod_mat15 = $_POST['cod_mat15'];
    }
    if(isset($_POST['cod_mat16'])){
        $cod_mat16 = $_POST['cod_mat16'];
    }
    if(isset($_POST['cod_mat17'])){
        $cod_mat17 = $_POST['cod_mat17'];
    }
    if(isset($_POST['cod_mat18'])){
        $cod_mat18 = $_POST['cod_mat18'];
    }
    if(isset($_POST['cod_mat19'])){
        $cod_mat19 = $_POST['cod_mat19'];
    }
    if(isset($_POST['cod_mat20'])){
        $cod_mat20 = $_POST['cod_mat20'];
    }
    if(isset($_POST['cod_mat21'])){
        $cod_mat21 = $_POST['cod_mat21'];
    }
    if(isset($_POST['cod_mat23'])){
        $cod_mat23 = $_POST['cod_mat23'];
    }
    if(isset($_POST['cod_mat24'])){
        $cod_mat24 = $_POST['cod_mat11'];
    }
    if(isset($_POST['cod_mat25'])){
        $cod_mat25 = $_POST['cod_mat25'];
    }
    
       
    

    $foto_act = addslashes($foto_act);

    $consulta = "INSERT INTO actividades(desc_act, foto_act, cod_res) VALUES ('$desc_act','$foto_act','$cod_res')";
    $resultado = mysqli_query($conexion, $consulta);

    if($resultado) {
        //Consultar la ultimo actividad para obtener su ID
        $consulta2 = "SELECT * FROM actividades WHERE cod_act = (SELECT MAX(cod_act)FROM actividades)";
        $resultado2 = mysqli_query($conexion, $consulta2);
        $fila = mysqli_fetch_array($resultado2);
        $cod_act = $fila['cod_act'];
    } else {
        die("Consulta 2 fallida");
         echo "Consulta 2 fallida";
    } if ($cod_act == true){
        
        // Insertar datos en la tabla utiliza
    if(isset($_POST['cod_mat10'])){
    $consulta3 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat10', '$cod_act')";
    $resultado3 = mysqli_query($conexion, $consulta3);
    } 
    if(isset($_POST['cod_mat11'])){
        $consulta4 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat11', '$cod_act')";
        $resultado4 = mysqli_query($conexion, $consulta4);
    }    
    if(isset($_POST['cod_mat12'])){
        $consulta5 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat12', '$cod_act')";
        $resultado5 = mysqli_query($conexion, $consulta5);
    }
    if(isset($_POST['cod_mat13'])){
        $consulta6 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat13', '$cod_act')";
        $resultado6 = mysqli_query($conexion, $consulta6);
    }    
    if(isset($_POST['cod_mat14'])){
        $consulta7 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat14', '$cod_act')";
        $resultado7 = mysqli_query($conexion, $consulta7);
    }    
    if(isset($_POST['cod_mat15'])){
        $consulta8 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat15', '$cod_act')";
        $resultado8 = mysqli_query($conexion, $consulta8);
    }    
    if(isset($_POST['cod_mat16'])){
        $consulta9 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat16', '$cod_act')";
        $resultado9 = mysqli_query($conexion, $consulta9);
    }    
    if(isset($_POST['cod_mat17'])){
        $consulta10 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat17', '$cod_act')";
        $resultado10 = mysqli_query($conexion, $consulta10);
    }    
    if(isset($_POST['cod_mat18'])){
        $consulta11 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat18', '$cod_act')";
        $resultado11 = mysqli_query($conexion, $consulta11);
    }    
    if(isset($_POST['cod_mat19'])){
        $consulta12 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat19', '$cod_act')";
        $resultado12 = mysqli_query($conexion, $consulta12);
    }    
    if(isset($_POST['cod_mat20'])){
        $consulta13 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat20', '$cod_act')";
        $resultado13 = mysqli_query($conexion, $consulta13);
    } 
    if(isset($_POST['cod_mat21'])){
        $consulta14 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat21', '$cod_act')";
        $resultado14 = mysqli_query($conexion, $consulta14);
    }
    if(isset($_POST['cod_mat23'])){
        $consulta15 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat23', '$cod_act')";
        $resultado15 = mysqli_query($conexion, $consulta15);
    }
    if(isset($_POST['cod_mat24'])){
        $consulta16 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat24', '$cod_act')";
        $resultado16 = mysqli_query($conexion, $consulta16);
    }
    if(isset($_POST['cod_mat25'])){
        $consulta17 = "INSERT INTO utiliza(cod_mat, cod_act) VALUES ('$cod_mat25', '$cod_act')";
        $resultado17 = mysqli_query($conexion, $consulta17);
    }

    
    
    if(!$resultado3){
            die("Consulta 3 fallida");
        } else {
            echo'<script>
                  alert("Se regitró correctamente la actividad");
                  window.location="home_user.php";
                  </script>';
        }
    }
  } else {
    echo'<script>
        alert("No se pudo registrar la actividad");
        window.location="actividades_registrar.php";
      </script>';  
  }



?>