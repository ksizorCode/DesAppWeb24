<?php
// Elementos modificables
const DESARROLLO = 0;


//
include '_datos.php';

// Registro de la ruta de todos los archivos
const RUTA_RECURSOS ='assets/';
const RUTA = [
    'css'=>RUTA_RECURSOS.'css/',
    'js' =>RUTA_RECURSOS.'js/',
    'img'=>RUTA_RECURSOS.'img/',
    'inc'=>RUTA_RECURSOS.'inc/',
];

// cargar bloques html
function cargar($bloque){
    global $conexion;
    global $titulo;

    switch($bloque){
        //include
        case 'header':
            include_once RUTA['inc'].'_header.php';
            break;
        case 'footer':
            include_once RUTA['inc'].'_footer.php';
            break;
        case 'menu':
            include RUTA['inc'].'_menu.php';
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

}

// Función desarrollo -> activa o desactiva notifiaciones para el tecnico
// development('Se ha cargado header correctamente');
function development($texto){

    if(DESARROLLO){
        echo '<div class="desarrollo">'.$texto.'</div>';
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


// img('001.jpg','Mujer mirando al horizonte','La Mona Lisa de Leonardo Davinchi');
// img('001.jpg');
function img($src,$alt='',$title=''){
    echo '<img src="'.RUTA['img'].$src.'" alt="'.$alt.'" title="'.$alt.'">';
}

function tag($tag,$content,$id='',$class=''){
    echo '<'.$tag.' id="'.$id.'" class="'.$class.'">'.$content.'</'.$tag.'>';
}

function consulta($sql, $devolverDatos=true){
    // Datos de la conexión
    define('CONN', [
        'servername'  => 'localhost',
        'username'    => 'root',
        'password'    => 'root',
        'dbname'      => 'miBaseDeDatos'
    ]);

      // Crear conexión
      $conn = new mysqli(CONN['servername'], CONN['username'], CONN['password'], CONN['dbname']);

      // Verificar conexión
      if ($conn->connect_error) {
        die("La Conexión ha fallado: " . $conn->connect_error);
      }
 
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