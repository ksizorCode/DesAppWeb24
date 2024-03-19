<?php require_once 'inc/header.php'?>
<h1>Cartelera Cine uno es a uno: peli - Genero</h1>

<!-- Control buttons -->
<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Mostrar Todos</button>

<?php
// CREAR CONEXIÓN
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cartelera";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>


<?php //CONSULTA PARA GENERAR SELECTS CON OPTIONS
// $sql = "SELECT nombre_genero FROM generos";
$sql ="SELECT DISTINCT generos.nombre_genero
FROM generos
INNER JOIN peliculas
ON generos.id_genero = peliculas.genero_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Se encontraron términos
  while ($dato = $result->fetch_assoc()) {
    echo '<button class="btn" onclick="filterSelection(`'.$dato['nombre_genero'].'`)">'.$dato['nombre_genero'].'</button>';
      }
} else {
  // No se encontraron términos
  echo "<p>No hay términos disponibles</p>";
}
?>
</div>


<ul id="cartelera" class="container">
<?php



// REALIZAR CONSULTA

//$sql = "SELECT * FROM peliculas";
$sql = "SELECT
peliculas.id,
peliculas.titulo,
peliculas.cartel,
peliculas.sinopsis,
peliculas.duracion,
peliculas.calificacion,
peliculas.trailer,
peliculas.estreno,
peliculas.fin,
generos.nombre_genero
FROM peliculas
INNER JOIN generos
ON peliculas.genero_id = generos.id_genero;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo <<<HTML
    <li class="filterDiv {$row['nombre_genero']}">
    <img src="img/{$row['cartel']}">
    <h2>{$row['titulo']}</h2>
    <p>Genero: <button onclick="filterSelection('{$row['nombre_genero']}')">{$row['nombre_genero']}</button>

    <p>Duración:{$row['duracion']}<p>
    <p>Calificación: +{$row['calificacion']}<p>
    </li>
    
    HTML;
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</ul>

    <script src="script.js"></script>
</body>
</html>