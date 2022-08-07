<?php include ("includes/header.php");
session_start();
// if(!isset($_SESSION['usuario'])){
//     header('location:login.php');
// }

 if(!isset($_SESSION['rol'])){
   header('location: login.php');
 }else{
   if($_SESSION['rol'] != 2){
       header('location: login.php');
   }
 }
?>



<!-- Contenedor de las tarjetas -->
<div class="container my-5" >

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

<div class="row row-cols-1 row-cols-md-3 g-4">

    <!-- TARJETA 1 -->
  <div class="col">
    <div class="card h-100">
      <img src="images/moto.jpg" class="card-img-top" alt="moto">
      <div class="card-body">
        <h5 class="card-title">Reserva del laboratorio Ceilab</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a href="#" class="btn btn-primary">Reservar</a>
      </div>
    </div>
  </div>

    <!-- TARJETA 2 -->
  <div class="col">
    <div class="card h-100">
      <img src="images/vespa.jpg" class="card-img-top" alt="vespa">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
    <!-- TARJETA 3 -->
  <div class="col">
    <div class="card h-100">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      </div>
    </div>
  </div>
</div>
</div>


<?php include("includes/footer.php")?>