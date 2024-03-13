<?php
//Debug Mode
const DEBUG=0;

//Cargar datos
include_once '_data.php';


//FUNCIONES - - - - - - - - - - 


//Crear Menú
function menuBuilder($menuitems=MENU){
    echo '<nav><ul class="menu">';
    foreach( $menuitems as $menu){
        echo '<li><a href="'.$menu['url'].'" title="'.$menu['title'].'"';
        echo ($menu['class']) ? ' class="'.$menu['class'].'"' :'';
        echo ($menu['target']) ? ' target="_blank"' : '';
        echo '>'.$menu['nombre'].'</a></li>';
    }
    echo '</ul></nav>';
}   





function consulta($sql, $devolverDatos = true) {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "restaurantes";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checkear conexión
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}
   
    // Lanzar consulta y recepcionar datos en $result
    $result = $conn->query($sql);
    $conn->close(); // Cerrar conexión

    // - - - - - Manejar datos recibidos 

    $datos = []; // Inicializa el array para almacenar los resultados

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $datos[] = $row; // Agrega cada fila al array de resultados
        }
    } else {
        return false; // O maneja la ausencia de resultados de otra manera
    }

    return $datos; // devolver datos
}

















    //Compresión HTML   -   -   -   -   -   -   -   -   -   -   -   -
    function ob_html_compress($buffer) {
        // Eliminar saltos de línea, tabulaciones y espacios en blanco redundantes.
        return str_replace(array("\n", "\r", "\t", "  "), '', $buffer);
    }
    
    function inicioCompresion() {
        ob_start("ob_html_compress");
    }
    
    function finCompresion() {
        ob_end_flush();
    }
    