<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php
$objConexion = new conexion();
$proyectos = $objConexion->consultar("SELECT * FROM proyectos");
?>

<div class="p-5 bg-light">
    <div class="container">
      <h1 class="display-3">Bienvenid@s</h1>
      <p class="lead">Este es un portafolio privado</p>
      <hr class="my-2">
      <p>Más información</p>      
    </div>
  </div>


  <!--// recorro el arreglo de proyectos  -->

  <div class="row row-cols-1 row-cols-md-3 g-4">

  <?php foreach ($proyectos as $proyecto) { ?>   

<div class="col">
  <a href="portafolio.php" style="text-decoration: none; color:black">
  <div class="card">
    <img src="img/<?php echo $proyecto["imagen"]; ?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?php echo $proyecto["nombre"]; ?></h5>
      <p class="card-text"><?php echo $proyecto["descripcion"]; ?></p>
    </div>
  </div>
  </a>
</div>

  <?php } ?>  

</div>

<?php include("pie.php"); ?>