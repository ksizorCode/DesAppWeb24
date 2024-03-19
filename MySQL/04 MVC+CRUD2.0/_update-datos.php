<?
require '_functions.php';

$id = $_GET['id'];
$nombre = $_GET['nombre'];
$apellidos = $_GET['apellidos'];
$foto = $_GET['foto'];
$email = $_GET['email'];
$telefono = $_GET['telefono'];
$direccion = $_GET['direccion'];


 $sql="UPDATE `alumnos` SET
 `id` = '".$id."',
 `nombre` = '".$nombre."',
 `apellidos` = '".$apellidos."',
 `foto` = '".$foto."',
 `email` = '".$email."',
 `telefono` = '".$telefono."',
 `direccion` = '".$direccion."'
 WHERE ((`id` = '".$id."'));";

  $alumnos=consulta($sql, false);

echo "<p>Se han actualizado los datos: <strong>".$nombre." ".$apellidos." ".$foto." ".$email." ".$telefono." ".$direccion.".</strong>";

header('Location: info.php?id='.$id);
exit;

 ?>