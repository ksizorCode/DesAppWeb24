<?php require_once 'inc/header.php'?>
<h1>Cartelera Cine uno es a muchos: peli - generoSSSS</h1>

<!-- Control buttons -->
<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Mostrar Todos</button>

<?php
// CREAR CONEXIÓN
$conn = new mysqli('localhost', 'root', '', 'cartelera2');

$sql ="SELECT DISTINCT generos.nombre_genero 
FROM peliculas
INNER JOIN peliculas_generos ON peliculas.id_peli = peliculas_generos.id_pelicula
INNER JOIN generos ON peliculas_generos.id_genero = generos.id_genero
ORDER BY generos.nombre_genero ASC;
";
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
peliculas.titulo,
peliculas.cartel,
peliculas.sinopsis,
peliculas.duracion,
peliculas.calificacion,
peliculas.trailer,
DATE_FORMAT(peliculas.estreno, '%d/%m/%Y') AS estreno,
DATE_FORMAT(peliculas.fin, '%d/%m/%Y') AS fin,
GROUP_CONCAT(generos.nombre_genero SEPARATOR ', ') AS generos
FROM peliculas
INNER JOIN peliculas_generos ON peliculas.id_peli = peliculas_generos.id_pelicula
INNER JOIN generos ON peliculas_generos.id_genero = generos.id_genero
GROUP BY peliculas.id_peli;";

$result = $conn->query($sql);


while ($row = $result->fetch_assoc()) {
  
  $generos = explode(",", $row['generos']);


  echo '<li class="filterDiv ';
  foreach ($generos as $genero) {
    echo $genero;
    if ($genero != end($generos)) {
      echo ' ';
    }
  }
  echo '">';
  
  echo "<img src='img/".$row['cartel'] . "' alt='Cartel de la película'>";
  echo "<h2>".$row['titulo'] . "</h2>";
  echo "<p>" . $row['sinopsis'] . "</p>";
  echo "<p>Duración: " . $row['duracion'] . " minutos</p>";
  echo "<p>Calificación: " . $row['calificacion'] . "</p>";
  echo "<p>Trailer: <a href='" . $row['trailer'] . "'>Ver trailer</a></p>";
  echo "<p>Estreno: " . $row['estreno'] . "</p>";




  //echo "<p>Fin: " . $row['fin'] . "</p>";
  
  // Despliega géneros:
foreach ($generos as $genero) {
  echo '<button class="btn" onclick="filterSelection(`' . $genero . '`)">' . $genero . '</button>';

  if ($genero != end($generos)) {
    echo '·'; // separa los elementos entre sí
  }
}

  echo '</li>';
}




// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo <<<HTML
//     <li class="filterDiv {$row['generos']}">
//     <img src="img/{$row['cartel']}">
//     <h2>{$row['titulo']}</h2>
//     <!-- <p>Genero: <button onclick="filterSelection('{$row['nombre_genero']}')">{$row['nombre_genero']}</button> -->

//     <p>Duración:{$row['duracion']}<p>
//     <p>Calificación: +{$row['calificacion']}<p>
//     </li>
    
//     HTML;
//   }
// } else {
//   echo "0 results";
// }
$conn->close();
?>
</ul>

    <script src="script.js"></script>
</body>
</html>