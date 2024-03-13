<?php
//Debug Mode
const DEBUG = 1;
const COMPRESS = 0;

//Cargar datos
include_once '_data.php';

//FUNCIONES - - - - - - - - - - 


//Crear Menú
function menuBuilder($menuitems = MENU)
{
    echo '<nav><ul class="menu">';
    foreach ($menuitems as $menu) {
        echo '<li><a href="' . $menu['url'] . '" title="' . $menu['title'] . '"';
        echo ($menu['class']) ? ' class="' . $menu['class'] . '"' : '';
        echo ($menu['target']) ? ' target="_blank"' : '';
        echo '>' . $menu['nombre'] . '</a></li>';
    }
    echo '</ul></nav>';
}


//Consultas SQL
function consulta($sql, $devolverDatos = true)
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "restaurantes";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checkear conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lanzar consulta y recepcionar datos en $result
    $result = $conn->query($sql);
    # if(!$result=$db->query($sql))die('Error');


    // Cerrar la conexión
    $conn->close(); // Cerrar conexión

    // - - - - - Manejar datos recibidos 
    if ($devolverDatos) {
        $datos = []; // Inicializa array para almacenar los resultados
        if ($result->num_rows > 0) { // Si la cantidad de datos es mayor a 0
            while ($row = $result->fetch_assoc()) { //recorremos los datos
                $datos[] = $row; // Almacenar cada fila en el array  resultados
            }
            return $datos; // devolver datos
            debug($datos, 'array');
        } else {
            return $result; // devolver posibles errores
            debug($result);
        }
    }
}



// Debug
function debug($txt, $formato = "alerta")
{
    if (DEBUG) {
        switch ($formato) {
            case 'array':
                echo '<div class="debug array"><span>Array</span>';
                echo '<pre>' . print_r($txt, true) . '</pre>';
                echo '</div>';
                break;
            case 'code':
                echo '<div class="debug code"><span>/* Fragmento de Código */:</span>';
                echo '<pre><code>' . htmlspecialchars($txt, ENT_QUOTES, 'UTF-8') . '</code></pre>';
                echo '</div>';
                break;
            case 'sql':
                echo '<div class="debug sql"><span># CONSULTA MySQL:</span>';
                echo '<pre><code>' . nl2br(htmlspecialchars($txt, ENT_QUOTES, 'UTF-8')) . '</code></pre>';
                echo '</div>';
                break;
            default:
                echo '<div class="debug alert"><span>Aviso:</span>';
                echo $txt;
                echo '</div>';
        }
    }
}



//Compresión HTML   -   -   -   -   -   -   -   -   -   -   -   -
function ob_html_compress($buffer)
{
    // Eliminar saltos de línea, tabulaciones y espacios en blanco redundantes.
    return str_replace(array("\n", "\r", "\t", "  "), '', $buffer);
}

function inicioCompresion()
{
    ob_start("ob_html_compress");
}

function finCompresion()
{
    ob_end_flush();
}




//Cargar imagen
// Carga y verifica que la imagen existe
function img($urlimagen, $alt="", $class="",$title=""){

    // Verificar si la imagen existe
    $imagenRuta = 'assets/img/'.$urlimagen;

	#if (@getimagesize($imagenRuta)) {
    if (file_exists($imagenRuta) && is_file($imagenRuta)) {

    	echo "<img src=\"{$imagenRuta}\" alt=\"{$alt}\" title=\"{$title}\" class=\"{$class}\">";
        } else {
        	echo "<p>No se pudo cargar la imagen: {$urlimagen}</p>";
        };
};




// Body ID

// Ejemplo de uso: $body_id = agregarIdAlBody($tu_variable, $titulo);
function idBody($titulo) {
    if(isset($titulo)){
       // $id=strtolower(str_replace(' ', '-', $titulo));
        $id = formatTXT($titulo);
        echo 'id="'.$id.'"';
    }
}



// Limpiar texto formato URL o ID o CLASS
function formatTXT($txt){
        return strtolower(str_replace(' ', '-', $txt));
}