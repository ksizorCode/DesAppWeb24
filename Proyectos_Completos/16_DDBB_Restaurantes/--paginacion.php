
<?php
include_once '_functions.php';
$titulo='Paginación';
include '_header.php';?>

<ul class="galeria">
 
<?php
// Conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "restaurantes";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Número de resultados por página
$resultados_por_pagina = 8;

// Página actual (si no se especifica, será la primera página)
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el índice del primer resultado en la página actual
$indice_inicio = ($pagina_actual - 1) * $resultados_por_pagina;

// Consulta para obtener el número total de filas
$total_filas_sql = "SELECT COUNT(*) AS total FROM restaurantes";
$total_filas_result = $conn->query($total_filas_sql);
$total_filas = $total_filas_result->fetch_assoc()['total'];

// Calcular el número total de páginas
$total_paginas = ceil($total_filas / $resultados_por_pagina);

// Consulta para obtener los resultados de la página actual
$sql = "SELECT * FROM restaurantes LIMIT $indice_inicio, $resultados_por_pagina";
$datos=consulta($sql);
// Mostrar los resultados de la página actual
    foreach ($datos as $dato) {
        echo '<li style="background-image:url(assets/img/'.$dato['foto'].')">';
        //echo '<img src="img/'.$dato['foto'].'" alt="'.$dato['nombre'].' - '.$dato['direccion'].'"/><br/>';
        $alt="Restaurante ".$dato['nombre']." en ".$dato['direccion'];
        img($dato['foto'],$alt);

        echo '<div>';
        echo '<h2 id="r_nombre">'.$dato['nombre'].'</h2>';
        echo '<span id="r_extracto" class="extracto">'.$dato['extracto'].'</span>';
        echo '<span id="r_telefono" class="telefono">'.$dato['telefono'].'</span>'; 
        echo '<span id="r_direccion" class="direccion">'.$dato['direccion'].'</span>';
        echo '<span id="r_web" class="web">'.$dato['web'].'</span>';
        echo '<span id="r_email" class="email">'.$dato['email'].'</span>';

        //echo '<a href="info.php?id='.$dato['id'].'" class="btn">Ver más</a>';
        echo '<a href="'.$dato['slug'].'" class="btn">Ver más</a>';
    }

?>

</ul>


<div class="paginacion">

<?php


// Mostrar los controles de navegación entre páginas
if ($pagina_actual > 1) {
    echo "<a href='?pagina=" . ($pagina_actual - 1) . "'>Anterior</a> | ";
}

for ($pagina = 1; $pagina <= $total_paginas; $pagina++) {
    // Agregar la clase 'current' al enlace de la página actual
    $clase_pagina = ($pagina == $pagina_actual) ? 'current' : '';
    echo "<a href='?pagina=$pagina' class='$clase_pagina'>$pagina</a> ";
}

if ($pagina_actual < $total_paginas) {
    echo "| <a href='?pagina=" . ($pagina_actual + 1) . "'>Siguiente</a> ";
}

// Cerrar la conexión
$conn->close();
?>

</div>


<?php include '_footer.php';?>