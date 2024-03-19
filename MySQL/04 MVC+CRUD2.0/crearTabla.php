<?
$titulo="Crear Tabla Alumnos";
require '_functions.php';
cargar('header');


$sql = "-- Crear tabla con sus índices
CREATE TABLE `alumnos` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(32) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `foto` varchar(32) NULL,
  `email` varchar(32) NOT NULL,
  `telefono` int NULL,
  `direccion` varchar(255) NULL

);";

consulta($sql,false);?>

<p>Tabla creada correctamente</p>
<a href="inserTabla.php" class="btn">Insertar Datos</a>



<? cargar('footer');?>