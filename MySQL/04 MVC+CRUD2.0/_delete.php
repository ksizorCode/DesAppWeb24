<?
$titulo="Alumno Eliminado";
require '_functions.php';
cargar('header');

$id = $_GET['id'];
$nombre = $_GET['nombre'];


 $sql="DELETE FROM `alumnos`
 WHERE ((`id` = '".$id."'));";

  $alumnos=consulta($sql, false);
?>

<h2><? e($nombre)?> se ha borrado correctamente.</h2>
<a href="index.php" class="btn">Volver al Inicio</a>

<? cargar('footer'); ?>

 