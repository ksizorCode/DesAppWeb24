<?php

// Elementos modificables
const DESARROLLO = 1;

//
include '__datos.php';

// Registro de la ruta de todos los archivos
const RUTA_RECURSOS ='assets/';
const RUTA = [
    'css'=>RUTA_RECURSOS.'css/',
    'js' =>RUTA_RECURSOS.'js/',
    'img'=>RUTA_RECURSOS.'img/',
    'font'=>RUTA_RECURSOS.'font/',
    'inc'=>RUTA_RECURSOS.'inc/',
];
// cargar bloques html
function cargar($bloque){
    global $titulo;

    switch($bloque){
        //include
        case 'header':
            include_once RUTA['inc'].'header.php';
            break;
        case 'footer':
            include_once RUTA['inc'].'footer.php';
            break;
        case 'menu':
            include RUTA['inc'].'menu.php';
            break;
        // echo
        case 'css':
            echo RUTA['css'].'style.css';
            break;
        case 'js':
            echo RUTA['js'].'script.js';
            break;
        default:
            include 'assets/inc/'.$bloque;
    }
    development('<strong> '.$bloque.'</strong> cargado correctamente');

}


/* DESARROLLO
 * -------------------------------------------------------
 * 
 * activa o desactiva notifiaciones para el tecnico
 * 
 * Ejemplo de uso:
 * development('Se ha cargado header correctamente');
 * 
 *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  */
 
function d($texto){development($texto);}

function development($texto,$lenguaje=null) {
    if(DESARROLLO){
        if(isset($lenguaje)){
            echo <<<HTML
                <pre class="desarrollo">
                    <code class="language-{$lenguaje}">{$texto}</code>
                </pre>
                HTML;
            }
            else{
                echo '<div class="desarrollo">';
                echo $texto;
                echo '</div>';
            }
    }
}


function mostrarArray($array){
    if(DESARROLLO){
    echo '<div class="desarrollo">';
            echo '<pre>';
            print_r($array);
            echo '</pre>';
            echo '</div>';
        }
}




// e('Lo que quieres escribir')
function e($txt){
    echo $txt;
}


// IMAGENES
    // img('001.jpg','Mujer mirando al horizonte','La Mona Lisa de Leonardo Davinchi');
    // img('001.jpg');
    function img($src,$alt='',$title=''){
        echo '<img src="'.RUTA['img'].$src.'" alt="'.$alt.'" title="'.$alt.'">';
    }

// ETIQUETAS HTML
    function tag($tag,$content,$id='',$class=''){
        echo '<'.$tag.' id="'.$id.'" class="'.$class.'">'.$content.'</'.$tag.'>';
    }



/* CONSULTAR A BASE DE DATOS
 * -------------------------------------------------------
 * 
 * Envia una consulta a la Base de datos
 * 
 * Ejemplo de uso:
 * consulta(variable_con_consulta,devoler_datos_como_array,mostrar_datos);
 * 
 *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  */

function consulta($sql, $devolverDatos=true){

      // Crear conexión
      $conn = new mysqli(CONN['servername'], CONN['username'], CONN['password'], CONN['dbname']);

      // Verificar conexión
      if ($conn->connect_error){die("La Conexión ha fallado: " . $conn->connect_error);}
 
      // Consulta SQL
      $result = $conn->query($sql);

      if (!$result) {
        die("Error al ejecutar la consulta: " . $conn->error);
        }
        
    if($devolverDatos){
        $datos = [];

        while ($fila = $result->fetch_assoc()) {
            $datos[] = $fila;
        }
        //devuelve un array con los datos solicitados de la consulta
        return $datos;
    }

    if(DESARROLLO){
        // Developer está activo vemos la consulta realizada
        development($sql,"sql");
    }

    //cerrar conexión base de datos.
    $conn->close();
}





// Convierte texto en URL
function aURL($texto) {
       // Convierte a minúsculas
       $url = strtolower($texto);

       // Reemplaza espacios y caracteres especiales con guiones
       $url = str_replace(' ', '-', $url);
       $url = preg_replace('/[^a-z0-9\-]/', '', $url); // Elimina caracteres no alfanuméricos excepto guiones
   
       return $url;
}




// Función para generar el iframe de Google Maps
function generarIframe($direccion) {
     // Puedes personalizar el tamaño y otros parámetros según tus necesidades
     $iframe = '<iframe width="100%" height="400" src="https://maps.google.com/maps?hl=en&amp;q='. urlencode($direccion) . '(undefined)&amp;ie=UTF8&amp;t=&amp;z=15&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>';
     return $iframe;
}

