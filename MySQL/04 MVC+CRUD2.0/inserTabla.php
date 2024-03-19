<?
$titulo="Insertar datos en tabla";
require '_functions.php';
cargar('header');




// Constructor aleatorio de datos

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

$emails = ['@yahoo.es','@gmail.com','@hotmail.com','@icloud.com'];

$direcciones =[
    "Calle los Moros, 32, Gijón, Asturias",
    "Calle Corrida, 27, Gijón, Asturias",
    "Calle Uría, 7, Oviedo, Asturias",
    "Calle Pablo Iglesias, 37, Gijón, Asturias",
    "Calle Cienfuegos, 37, Gijón, Asturias"
    
];



$sql="INSERT INTO `alumnos` (`nombre`, `apellidos`, `foto`, `email`,`telefono`,`direccion`) \n VALUES ";

// Generar alumnos aleatorios
$elementos=32;

for($i=0;$i<$elementos;$i++){
    $nombre = $nombres[array_rand($nombres)];
    $apellido = $apellidos[array_rand($apellidos)];
    $foto = $fotos[array_rand($fotos)];


    $email = aURL($nombre.$apellido).$emails[array_rand($emails)];
    $telefono=768586567;
    $direccion= $direcciones[array_rand($direcciones)];

 

    $sql .= "('$nombre', '$apellido', '$foto','$email','$telefono','$direccion')";

    if($i==$elementos-1){
        $sql .=";";
    }
    else{
        $sql .=",";
    }
}



//Lanzamos la consulta
consulta($sql,false);
?>


<p>Datos insertardos correctamente</p>

<a href="inserTabla.php" class="btn">Insertar más datos</a>
<a href="index.php" class="btn">Volver al Inicio</a>

<? cargar('footer');?>