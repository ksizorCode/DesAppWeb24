<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="procesar.php" method="post" enctype="multipart/form-data">
    <label>Nombre
        <input type="text" name="nombre">
    </label>
    <br>
    <label>    
    Selecciona imagen a cargar:
    <input type="file" name="imagen" accept="image/*">
    </label>
    <br>
    <input type="submit" value="Cargar Imagen">
</form>


<h1>Imágenes cargadas previamente:</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lista-imagenes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Validar conexión
if ($conn->connect_error) { die("Conexión fallida: " . $conn->connect_error);}

$sql = "SELECT * FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<thead><tr><td>Imagen</td><td>Archivo</td><td>Nombre</td></tr></thead>';
    while($dato = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td><img src="files/'.$dato['imagen'].'"></td>';
        echo '<td><a href="files/'.$dato['imagen'].'" target="_blank">'.$dato['imagen'].'</a></td>';
        echo '<td>'.$dato['nombre'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
  echo "0 resultados";
}


?>
<a class='volver' href='index2.php'>Ver también versión 2</a></div>


</body>
</html>
    
