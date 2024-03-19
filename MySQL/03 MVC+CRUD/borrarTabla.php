<?php
$titulo="Borrar Tabla";
require '_functions.php'; 


$sql = "DROP TABLE miBasedeDatos.alumnos;";
conectar($sql);



/*
// Cómo sería esto a mano sin la función conectar();


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

$sql = "-- Borrar Base de datos
DROP TABLE miBasedeDatos.alumnos;";
$result = $conn->query($sql);

*/

echo "La tabla Alumnos se ha borrado correctamente";

cargar('footer');

