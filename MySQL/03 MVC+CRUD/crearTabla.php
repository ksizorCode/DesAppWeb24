<?php
$titulo="Crear Tabla";
require '_functions.php'; 


$sql = "-- Crear tabla con sus índices
CREATE TABLE `alumnos` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(32) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `foto` varchar(32) NOT NULL
);";
conectar($sql);
/*

// Cómo sería todo esto sin la función conectar();

define('CONN', [
    'servername'  => 'localhost',
    'username'    => 'root',
    'password'    => 'root',
    'dbname'      => 'miBaseDeDatos'
]);
// Create connection
$conn = new mysqli(CONN['servername'], CONN['username'], CONN['password'], CONN['dbname']);
// Check connection
if ($conn->connect_error) {
die("La Conexión ha fallado: " . $conn->connect_error);
}

$sql = "-- Crear tabla con sus índices
CREATE TABLE `alumnos` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(32) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `foto` varchar(32) NOT NULL
);";
$result = $conn->query($sql);

*/

echo "La tabla Alumnos se ha creado correctamente";

cargar('footer');

