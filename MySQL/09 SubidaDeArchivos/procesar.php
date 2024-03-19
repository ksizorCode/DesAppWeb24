<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

    //OBTENER Y PROCESAR DATOS
    
    //Tratar los datos del Post:
    $nombre =$_POST['nombre'];

    //Imagen llega por Post:
    $imagen= $_FILES['imagen']['name'];
    $imagen_temporal=$_FILES['imagen']['tmp_name'];
    $ruta = "files/".$imagen;

    //Mover la imagen a la carpeta correspondiente
    if(move_uploaded_file($imagen_temporal, $ruta)){
    echo "<p>La imagen <strong>".$imagen."</strong> se ha cargado correctamente</p>";
    echo '<img  src="'.$ruta.'"/>';
    }
    else{ 
        echo 'No se pudo subir el archivo: '.$imagen;  
    }
    


    // CONSULTA A BASE DE DATOS:

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "lista-imagenes";
    
    // Crear coneción
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Validar conexión
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    
   echo  $sql = "INSERT INTO images (nombre, imagen)
    VALUES ('$nombre', '$imagen')";
    
    if ($conn->query($sql) === TRUE) {
      echo "Valores insertados correctamente";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
    ?>
    <a class='volver' href='index.php'>Volver</a></div>
</body>
</html>

<?php
/*

CREATE TABLE `images` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
);
*/

?>
 