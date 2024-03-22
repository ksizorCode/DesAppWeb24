<?php
include_once '_functions.php';

//Capturamos los datos que llegan via GET
if(isset($_GET['slug'])){
$slug=$_GET['slug'];
}
else{
    header('Location: error.html');
}

//Consulta a BBDD
$sql='SELECT * FROM restaurantes WHERE slug="'.$slug.'"';
$datos=consulta($sql);
debug($sql,'code');

if($datos=='ERROR' || $datos== '' || isset( $datos[1] )) { 
    header('Location: error');
}
//Convertimos los valore de la consulta a un array limpio
$dato = $datos[0];
debug($dato,'array');

//Inicializamos la variable titulo
$titulo =$dato['nombre'];
?>

<?php include '_header.php';?>


<?php
//Construimos la estructura de contenido de la ficha del restaurante
$alt="Restaurante ".$dato['nombre']." en ".$dato['direccion'];
img($dato['foto'],$alt,'portada');
?>

<address><?php echo $dato['direccion'];?></address>
<p><a href="tel:<?php echo $dato['telefono'];?>"><?php echo $dato['telefono'];?></a></p>
<p><a href="https://wa.me/<?php echo $dato['telefono'];?>" target="_blank">Enviar un Whatsapp a <?php echo $dato['nombre'] ?></a></p>








<!-- Contenedor del mapa -->
<div id="mapa" style="height:40vh"></div>

<?php
cargarMapa($datos);
?>




<?php include '_footer.php';?>