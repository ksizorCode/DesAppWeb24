<?
$titulo="Borrar tabla";
require '_functions.php';
cargar('header');

 $sql="DROP TABLE mibasededatos.alumnos;";
consulta($sql,false);
?>

<p>Tabla Borrada correctamente</p>


<a href="crearTabla.php" class="btn">Crear Tabla</a>


<?cargar('footer');?>