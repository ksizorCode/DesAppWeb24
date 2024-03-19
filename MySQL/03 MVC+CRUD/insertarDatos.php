<?php
$titulo="Crear Tabla";
require '_functions.php'; 

//Lista para datos aleatorios:
$nombres = [ 'Adrián', 'Alejandro', 'Alonso', 'Amelia', 'Ana', 'Andrés', 'Antonio', 'Aurora',
'Beatriz', 'Carlos', 'Carmen', 'Daniel', 'David', 'Diego', 'Elena', 'Emma', 'Enrique',
'Fernando', 'Francisco', 'Gabriel', 'Guillermo', 'Isabella', 'Isaac', 'Javier', 'Juan',
'Julia', 'Laura', 'Luis', 'Lucía', 'Manuel', 'María', 'Mario', 'Marta', 'Miguel', 'Natalia',
'Nicolás', 'Olivia', 'Pablo', 'Patricia', 'Raúl', 'Roberto', 'Sara', 'Sofía', 'Tomás',
'Valentina', 'Víctor', 'Victoria', 'Xavier', 'Yolanda', 'Zoe'];

$apellidos = ['Álvarez','García', 'Fernández', 'Rodríguez', 'López', 'Martínez', 'Sánchez', 'Pérez', 'Gómez',
'Martín', 'Jiménez', 'Ruiz', 'Hernández', 'Díaz', 'Moreno', 'Álvarez', 'Muñoz',
'Romero', 'Alonso', 'Gutiérrez', 'Esteban','Meana','Navarro', 'Torres', 'Domínguez', 'Vázquez', 'Ramos',
'Gil', 'Ramírez', 'Serrano', 'Blanco', 'Suárez', 'Molina', 'Morales', 'Ortega', 'Delgado',
'Castro', 'Ortiz', 'Rubio', 'Marín', 'Sanz', 'Iglesias', 'Nuñez', 'Medina', 'Garrido',
'Cruz', 'Cabrera', 'Calvo', 'León', 'Herrera', 'Marquez', 'Cano', 'Prieto', 'Reyes'];

$fotos = ['001.png', '002.png', '003.png', '004.png', '005.png', '006.png', '007.png', '008.png', '009.png', '010.png', '011.png', '012.png', '013.png', '014.png', '015.png', '016.png', '017.png', '018.png', '019.png', '020.png', '021.png', '022.png', '023.png', '024.png', '025.png'];


$sql="INSERT INTO `alumnos` (`nombre`, `apellidos`, `foto`) \n VALUES ";

// Generar alumnos aleatorios
$elementos=32;

for($i=0;$i<$elementos;$i++){
    $nombre = $nombres[array_rand($nombres)];
    $apellido = $apellidos[array_rand($apellidos)];
    $foto = $fotos[array_rand($fotos)];

    $sql .= "('$nombre', '$apellido', '$foto')";

    if($i==$elementos-1){
        $sql .=";";
    }
    else{
        $sql .=",";
    }
}





// echo "<pre>";
// echo $sql;
// echo "</pre>";


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

$sql = "
-- Insertar información
INSERT INTO `alumnos` (`nombre`, `apellidos`, `foto`) VALUES
('Manu', 'Luna', '001.png'),
('Jose', 'Soleado', '002.png'),
('Hugo', 'Estelar', '003.png'),
('David', 'Aurora', '004.png'),
('Mia', 'Cielo', '005.png'),
('Samuel', 'Galaxia', '006.png'),
('Valentina', 'Nebula', '007.png'),
('Mateo', 'Luminoso', '008.png'),
('Sofía', 'Celestial', '009.png'),
('Liam', 'Estrella', '010.png'),
('Isabella', 'Cosmos', '011.png'),
('Noah', 'Cometa', '012.png'),
('Emma', 'Orbita', '013.png'),
('Oliver', 'Astralis', '014.png'),
('Ava', 'Quasar', '015.png'),
('James', 'Astro', '016.png'),
('Emily', 'Sideral', '017.png'),
('Benjamin', 'Supernova', '018.png'),
('Charlotte', 'Eclíptica', '019.png'),
('Ethan', 'Nébula', '020.png'),
('Amelia', 'Luz', '021.png'),
('Mason', 'Cometario', '022.png'),
('Harper', 'Interstelar', '023.png'),
('Logan', 'Estelar', '024.png'),
('Aria', 'Cosmica', '025.png');
";
$result = $conn->query($sql);
*/


echo "La tabla Alumnos se ha creado correctamente";
?>

<a href="index.php" class="btn">Volver a Inicio</a>

<?
cargar('footer');

