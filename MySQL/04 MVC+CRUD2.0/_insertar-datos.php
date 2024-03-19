<?
require '_functions.php';

$nombre = $_GET['nombre'];
$apellidos = $_GET['apellidos'];
$foto = $_GET['foto'];
$email = $_GET['email'];
$telefono = $_GET['telefono'];
$direccion = $_GET['direccion'];


 $sql="INSERT INTO `alumnos` (`nombre`, `apellidos`, `foto`, `email`, `telefono`, `direccion`)
 VALUES ('".$nombre."', '".$apellidos."', '".$foto."', '".$email."', '".$telefono."', '".$direccion."');";

  $alumnos=consulta($sql, false);

echo "<p>Se han insertado los datos: <strong>".$nombre." ".$apellidos." ".$foto." ".$email." ".$telefono." ".$direccion.".</strong>";

header('Location: index.php');
exit;

 ?>