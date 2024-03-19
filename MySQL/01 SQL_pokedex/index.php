<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <ul>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pokedex";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT
foto,
    p.nombre AS pokemon,
    t.nombre_tipo AS tipo,
    g.nombre_generacion AS generacion
FROM
    pokemons p
JOIN tipo t ON
    p.tipo = t.id
JOIN generacion g ON
    p.generacion = g.id;
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<li>";
    echo "<h2>". $row["pokemon"]."</h2>";
    echo "<p>". $row["tipo"]."</p>";
    echo "<p>". $row["generacion"]."</p>";
    echo "<img src='img/". $row["foto"]."' alt='". $row["pokemon"]."'>";
    echo "</li>";
  }
} else {
  echo "0 resultados a mostrar";
}
$conn->close();
?>


</ul>
</body>
</html>