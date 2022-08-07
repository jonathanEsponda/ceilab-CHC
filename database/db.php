
<?php
//session_start();

//$conn = mysqli_connect(
//   'localhost', //IP servidor
//   'root', // Probar con % en servidor mysql(en la parte que dice localhost), si funciona, cambiar por ip del WS
//  '', //root no tiene clave
//    'ceilab',  //nombre de la base de datos
//);
?>

<?php 
   $conexion = mysqli_connect(
    'localhost',
    'root',
    '',
    'db_ceilab'
    );
    
?>

<?php 


//try {
//    $conexion = new PDO("mysql:host=$server; dbname=$database;",$username, $password );
//} catch(PDOException $e){
//    die("Conexion fallida: ". $e->getMessage());
//}

?>


