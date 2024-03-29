<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lector XML</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <ul>
<?php
// Cargar el XML
$xml = simplexml_load_file('xml.xml');

// Verificar si la carga fue exitosa
if ($xml) {
    // Recorrer cada libro
    $i=0;
    foreach ($xml->libro as $libro) {   
            echo "<li>
            <img src='{$libro->imagen}'>
            <h2>" . $libro->titulo . "</h2>
            <p>Autor: " . $libro->autor . "</p>
            <p>Género: " . $libro->genero . "</p>
            <p>Año de publicación: ".$libro->publicacion->anio."</p>
            <p>Editorial: ".$libro->publicacion->editorial."</p>
            <a href='info.php?v={$i}'>Ver más</a>
            </li>";
            $i++;
    }
} else {
    // Mensaje de error si no se puede cargar el archivo
    echo "<p>Error al cargar el archivo XML.</p>";
}
?>
</ul>

<a href="insertar.php">Insertar</a>
</body>
</html>