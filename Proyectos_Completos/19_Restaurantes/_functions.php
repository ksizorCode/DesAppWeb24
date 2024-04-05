<?php


$Alertas=[]; // almancenarár todas las aleartas dle proceso para mostrarlas al final (en caso de Debug esté activado)

function iniciarSesion(){
    //Si la sesión no se ha iniciado: iníciala.
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

iniciarSesion();


// LOADING
function kdploading(){
    echo '<div id="kdp-loading"></div>';
}

// ---



// SESION
// Comprobar si la sesión se ha iniciado cada vez que se carga una página nueva
function rolAdmin() {
    global $Alertas; // Declarar $Alertas como global
    if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') {
        $Alertas[]='Estás logueado como Administrador';
        return true;
    } else {
        $Alertas[]='No estás logueado como Admin: yes un nadie!';
        return false;
    }
}







// define('DS', DIRECTORY_SEPARATOR); //Separador de directorios
// $config['base']=RUTA.basename(dirname(__FILE__));
// $config['view']=$config['base'].DS.'views'.DS;
// $config['model']=$config['base'].DS.'models'.DS;
// $config['controller']=$config['base'].DS.'controllers'.DS;
// include($config['controller'].'mainController.php');


//Cargar datos
include_once '_data.php';

//FUNCIONES - - - - - - - - - - 


//Crear Menú
function menuBuilder($menuitems = MENU)
{
    echo '<nav><ul class="menu">';
    foreach ($menuitems as $menu) {
        echo '<li><a href="'.RUTA . $menu['url'] . '" title="' . $menu['title'] . '"';
        echo ($menu['class']) ? ' class="' . $menu['class'] . '"' : '';
        echo ($menu['target']) ? ' target="_blank"' : '';
        echo '>' . $menu['nombre'] . '</a></li>';
    }

    if(rolAdmin()){
            echo '<li><a href="'.RUTA.'reset">Reset</a> </li>';
        }



    if(!rolAdmin()){
        echo '<li><a href="'.RUTA.'login">Acceder</a></li>';}
        else{
            echo '<li><a href="'.RUTA.'cerrar-sesion">Cerrar Sesión</a> </li>';
        }


    echo '</ul></nav>';
}


//Consultas SQL
function consulta($sql, $devolverDatos = true)
{
    // $servername = "localhost";
    // $username = "root";
    // $password = "root";
    // $dbname = "restaurantes";
    // $username = "mymigueles";
    // $password = "g1juiHoq";
    // $dbname = "restaurantesme";

    // Crear conexión
    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    //$conn-> set_charset("utf8"); //forzar que devuelva los datos en UTF-8

//    // Checkear conexión
//    if ($conn->connect_error) {
//     // Si la conexión falla, redirigir a otra página
//     header("Location: /index.php"); // Cambia "error.php" por la URL de la página a la que quieres redirigir
//     exit; // Es importante salir del script después de redirigir para evitar que el resto del código se ejecute
// }



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
            return 'ERROR'; // devolver posibles errores
            debug($result);
        }
    }
}



/*  
 * DEBUGIN Y DESARROLLO  -  -  -  -
 */

// Si el modo Debug está activado mostrar todos los posibles errores / si no no..
if (DEBUG) { error_reporting(E_ALL);}
else { error_reporting(0);}


// Mostrar mensajes de errores
function debug($txt, $formato = "alerta")
{
    if (DEBUG) {
        $html='';
        switch ($formato) {
            case 'array':
                $html.= '<div class="debug array"><span>/*print_r del Array */</span>';
                $html.= '<pre>' . htmlspecialchars(print_r($txt, true)) . '</pre>';
                $html.= '</div>';
                break;
            case 'code':
                $html.= '<div class="debug code"de><span>/* Fragmento de Código */:</span>';
                $html.= '<pre><code>' . htmlspecialchars($txt, ENT_QUOTES, 'UTF-8') . '</code></pre>';
                $html.= '</div>';
                break;
            case 'sql':
                $html.= '<div class="debug sql"><span># CONSULTA MySQL:</span>';
                $html.= '<pre><code>' . nl2br(htmlspecialchars($txt, ENT_QUOTES, 'UTF-8')) . '</code></pre>';
                $html.= '</div>';
                break;
            default:
                $html.= '<div class="debug alert"><span>Aviso:</span>';
                $html.= $txt;
                $html.= '</div>';
        }



        echo $html;
    }
}




// Añadir a la lista de Alertas que se van a mostrar al final
function addAlert($texto){
    global $Alertas;
        $Alertas[] =$texto;
}


// Imprimir y recorrer lista de  Alertas para mostrarlas en el footer.
function listarAlertas(){
    if(DEBUG){
        global $Alertas;
        echo '<div class="debug">';
        echo '<span><strong>LISTADO DE TODAS LAS ALERTAS DE ESTE APARTADO:</strong></span>';

        // Limpia los elementos duplicados en el array $Alertas para que no salga una misma alerta dos veces si se hubiera dado el caso.
        $Alertas = array_unique($Alertas);

        foreach( $Alertas as $alerta){
            debug($alerta);
        }
        echo '</div>';

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
    if(COMPRESS){    ob_start("ob_html_compress"); }
}

function finCompresion(){
    if(COMPRESS){ob_end_flush();}
}



//Cargar imagen
// Carga y verifica que la imagen existe
function img($urlimagen, $alt="", $class="",$title=""){

    // Verificar si la imagen existe
    $imagenRuta = 'assets/img/'.$urlimagen;

	#if (@getimagesize($imagenRuta)) {
    if (file_exists($imagenRuta) && is_file($imagenRuta)) {


    	//echo "<img src=\"{$imagenRuta}\" alt=\"{$alt}\" title=\"{$title}\" class=\"{$class}\">";
        echo "<img src=\"" . RUTA . "{$imagenRuta}\" alt=\"{$alt}\" title=\"{$title}\" class=\"{$class}\">";
    
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



function crearSesion($nombre,$valor){
    $_SESSION[$nombre] = $valor;
    addAlert('Sesión: '.$nombre.' craeda con el valor:'.$valor);

}


function cerrarSesion(){
    // elimina todas las variables de las sesiones creadas
    session_unset();

    // destruye la sesión
    session_destroy();
}



/*   *   *   *   *   *   *   *   *   *   *   *   */
/* MAPA 
===============================*/

function cargarMapa($datos){
    include 'assets/includes/mapa.php';    
}







// Función para colorear el logo
function colorearLogo($texto) {
    // Dividir el texto del logo en partes
    $parte1 = substr($texto, 0, 8);
    $parte2 = substr($texto, 8, 2);
    $parte3 = substr($texto, 10);

    // Colorear la parte central del texto
    $texto_coloreado = $parte1 . '<span class="subrayado">' . $parte2 . '</span>' . $parte3;

    return $texto_coloreado;
}