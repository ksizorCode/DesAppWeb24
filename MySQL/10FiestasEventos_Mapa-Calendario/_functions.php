<?php



function consulta($sql, $devolverDato = true)
{

    //Datos de conexión
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "eventon";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Chequear conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lanza la consulta
    $result = $conn->query($sql);

    // Devolver datos?
    if ($devolverDato) {
        // Si hay resultados...
        if ($result->num_rows > 0) {
            // Crea un array para almacenar los registros encontrados
            $registros = [];

            while ($row = $result->fetch_assoc()) {
                // Agrega el registro a nuestro array
                $registros[] = $row;
            }

            return $registros;
        }
    }

    //Cerramos conexión
    $conn->close();
}



function diacalendario($fecha, $datos, $day)
{

    $return = "";
    $class = "";
    $fiesta = false;
    $nombrefiesta = "";
    $descripcionfiesta = "";
    $id = "";

    //Formatear $fecha a formato fecha
    $fecha = strtotime($fecha);

    //Revisar si hoy hay algún evento
    foreach ($datos as $evento) {


        //Entre fechas
        if (strtotime($evento['fechainicio']) <= $fecha && strtotime($evento['fechafin']) >= $fecha) {
            //if($evento['fechainicio'] <= $fecha && $evento['fechafin'] >= $fecha){
            $class = "fiesta";
            $fiesta = true;

            $nombrefiesta = $evento["titulo"];
            $descripcionfiesta = $evento["descripcion"];
            $id = $evento["id"];

            //Fecha Inicio
            if (strtotime($evento['fechainicio']) == $fecha) {
                $class .= " fiestainicio";
            }

            //Fecha Fin
            if (strtotime($evento['fechafin']) == $fecha) {
                $class .= "  fiestafin";
            }
        }
    }

    //Devolver datos:

    echo "<td class='$fecha $class'>";

    if ($fiesta) {
        echo "<a href='info.php?id=$id' title='$nombrefiesta'>$day</a>";
    } else {
        echo $day;
    }


    echo "</td>";
}
