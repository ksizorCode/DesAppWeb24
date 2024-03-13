<?php require_once '_functions.php'; ?>
<?php include '_header.php'; ?>
<ul class="galeria">

<?php


$sql = "SELECT DISTINCT id, fechainicio, fechafin, titulo, descripcion FROM eventos WHERE fechainicio >= '2024-01-01' AND fechafin <= '2024-12-31' ORDER BY fechainicio ASC;";
$datos= consulta($sql, true);

foreach($datos as $dato){
    echo '<div class="evento">';
        echo '<h3>' . $dato['titulo'] . '</h3>';
        echo '<p>inicio: ' . date('d/m/Y', strtotime($dato['fechainicio'])) . '</p>';
        echo '<p>fin: ' . date('d/m/Y', strtotime($dato['fechafin'])) . '</p>';
    echo '</div>';
}
?>

</ul>

<?php





//Generador de Calendarios

// Nombres de los días de la semana en español
$dias_semana = array(
    "L",
    "M",
    "X",
    "J",
    "V",
    "S",
    "D"
);

// Nombres de los meses en español
$meses = array(
    1 => "Enero",
    2 => "Febrero",
    3 => "Marzo",
    4 => "Abril",
    5 => "Mayo",
    6 => "Junio",
    7 => "Julio",
    8 => "Agosto",
    9 => "Septiembre",
    10 => "Octubre",
    11 => "Noviembre",
    12 => "Diciembre"
);

$year = date("Y");

echo "<h1>Calendario Anual $year</h1>";
echo '<div class="anio">';
// Bucle para cada mes del año
for ($month = 1; $month <= 12; $month++) {
    // Obtener el primer día del mes y el número de días en el mes
    $firstDay = mktime(0, 0, 0, $month, 1, $year);
    $numDays = date("t", $firstDay);

    // Obtener el nombre del mes
    $monthName = $meses[$month];

    echo '<div class="mes '.strtolower($monthName).'">';
    // Imprimir el nombre del mes
    echo "<h2>$monthName</h2>";

    // Crear la tabla del calendario para el mes actual
    echo "<table>";
    echo "<tr>";
    foreach ($dias_semana as $dia) {
        echo "<th>$dia</th>";
    }
    echo "</tr>";

    // Bucle para cada día del mes
    for ($day = 1; $day <= $numDays; $day++) {
        // Obtener el día de la semana para el día actual
        $dayOfWeek = date("N", mktime(0, 0, 0, $month, $day, $year));

        // Si es el primer día del mes, añadir celdas vacías para completar la fila
        if ($day == 1) {
            echo "<tr>";
            for ($i = 1; $i < $dayOfWeek; $i++) {
                echo "<td></td>";
            }
        }


        // Imprimir el número del día --------- CADA DÍA -----
            //constructor formato fecha
            // if($month<10){
            //     $mimonth='0'.$month;
            // }
            // else{ $mimonth=$month;}

            $mimonth = ($month < 10) ? '0'.$month : $month;
            $miday = ($day < 10) ? '0'.$day : $day;


            $fecha="$year-$mimonth-$miday";


               
//construye la celda con la info de el día de hoy
        diacalendario($fecha, $datos, $day);
       

        // ------------------------------------------------------------------

        // Si es el último día de la semana, cerrar la fila
        if ($dayOfWeek == 7) {
            echo "</tr>";
        }

        // Si es el último día del mes, añadir celdas vacías para completar la fila
        if ($day == $numDays) {
            for ($i = $dayOfWeek; $i < 7; $i++) {
                echo "<td></td>";
            }
            echo "</tr>";
        }
    }
    echo "</table>";
    echo "</div>";
}
echo '</div>';

?>
