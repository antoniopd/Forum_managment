<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>

<?php

if ($_POST) {
    // print_r($_POST);
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    $fecha = new DateTime();

//nombre de la imagen con la fecha y hora concatenada
    $imagen = $fecha->getTimestamp()."_".$_FILES["archivo"]["name"];

    $imagen_temporal = $_FILES["archivo"]["tmp_name"];

    move_uploaded_file($imagen_temporal, "img/$imagen");

    $objConexion = new conexion();
    $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, ' $nombre', '$imagen', '$descripcion');";
    $objConexion->ejecutar($sql);

    header("location:portafolio.php"); //redirecciona a la página portafolio.php
}

if ($_GET) {    
    
    $id = $_GET["borrar"]; // recupero el id del proyecto a borrar
    $objConexion = new conexion(); // creo un objeto de la clase conexion

    $imagen = $objConexion->consultar("SELECT imagen FROM proyectos WHERE id = $id"); // consulto la imagen del proyecto a borrar

    unlink("img/".$imagen[0]["imagen"]); // borro la imagen del proyecto a borrar

    $sql = "DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id; // creo la instrucción sql para borrar el proyecto
    $objConexion->ejecutar($sql); // ejecuto la instrucción sql

    header("location:portafolio.php"); //redirecciona a la página portafolio.php
}

$objConexion = new conexion();
$proyectos = $objConexion->consultar("SELECT * FROM proyectos");

// print_r($proyectos);

?>

<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        Nombre del proyecto:
                        <input required class="form-control" type="text" name="nombre" id="" >
                        <br>
                        Imagen del proyecto:
                        <input required class="form-control" type="file" name="archivo" id="" >
                        <br>
                        Descripción del proyecto:
                        <textarea class="form-control" name="descripcion" id="" rows="3" ></textarea>
                        <br>
                        <input required class="btn btn-success" type="submit" value="Enviar proyecto">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        <!--// recorro el arreglo de proyectos  -->
                        <?php foreach ($proyectos as $proyecto) { ?>
                            <tr>
                                <td><?php echo $proyecto["id"]; ?></td>
                                <td><?php echo $proyecto["nombre"]; ?></td>
                                <td>
                                    <img width="60" src="img/<?php echo $proyecto["imagen"]; ?>" alt="" srcset="">
                                    
                                </td>
                                <td><?php echo $proyecto["descripcion"]; ?></td>
                                <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto["id"] ?>">Eliminar</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>








<?php include("pie.php"); ?>