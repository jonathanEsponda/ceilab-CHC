<?php include ("includes/header.php");
     include ("database/db.php");
      session_start();
?>
<!-- Mantener sesión iniciada -->
<script>
  document.addEventListener("DOMContentLoaded", function(){
  const milisegundos = 5 *1000;
  setInterval(function(){
      fetch("./refrescar.php");
      },milisegundos);
  });
</script>

<div class="container">
    <!-- Mensajes -->
    <?php  if(isset($_SESSION['mensaje'])){?>
    <div class="alert alert-<?=$_SESSION['tipo_mensaje'];?> alert-dismissible fade show" role="alert">
      <?= $_SESSION['mensaje'] ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     <?php session_unset();}?>
    <!-- Sección carrusel -->
  <div id="carousel" class="carousel slide p-5" data-bs-ride="carousel" data-interval="100">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/moto.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="images/vespa.jpg" class="d-block w-100">
      </div>
    </div> 
  

    <!-- Controles del carrusel-->
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  
    <!-- Indicadores del carrusel -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>

  </div>



 <!-- Sección tarjetas de competencias -->
  <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php 
        $consulta = "SELECT * FROM concursos_rob";
        $resultado = mysqli_query($conexion, $consulta);
        
        // Mostrar tarjetas si la fecha de la competencia es > a hoy
        while($fila = mysqli_fetch_array($resultado)){ 
          $fecha_con = $fila['fecha_con'];
          $fecha_actual = date('Y-m-d', time());
            if($fecha_con > $fecha_actual) { 
        ?>
      <div class="col">
        <a href="con_inscribir.php?id=<?php echo $fila['cod_con']?>">
          <div class="card h-100">
            <img src="images/vespa.jpg" class="card-img-top" alt="vespa">
            <div class="card-body">
              <h5 class="card-title">
                <?php echo $fila['nom_con']; ?>
              </h5>
              <p class="card-text"><?php echo $fila['fecha_con']?></p>
            </div>
          </div>
        </a>
      </div>
        <?php } }?> 
  </div>
</div>
<?php include("includes/footer.php")?>
