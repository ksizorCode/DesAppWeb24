<?php
// Elementos modificables
const DESARROLLO = 1;



//----- desde aquí no tocar ----- //

$conexion=0;

// Enrutamiento de archivos
define('RUTA_RECURSOS', 'assets/');

define('RUTA', [
    'img' => RUTA_RECURSOS.'img/',
    'css' => RUTA_RECURSOS.'css/',
    'js'  => RUTA_RECURSOS.'js/',
    'inc' => RUTA_RECURSOS.'inc/'
]);


// Función desarrollo -> activa o desactiva notifiaciones para el tecnico
// development('Se ha cargado header correctamente');
function development($texto){

    if(DESARROLLO){
        echo '<div class="desarrollo">'.$texto.'</div>';
    }

}



// conexión con la base de datos
// conectar($consultaSQL, $arrayElementosAMostrar, $linkSiNO);
/*
$sql = "SELECT * FROM alumnos";
$datos=['foto'=>'img','nombre'=>'txt','apellidos'=>'txt'];
conectar($sql,$datos,true);
*/


function conectar($sql, $datos, $link=0){
    // CONEXIÓN CON BASE DE DATOS
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
    if ($conn->connect_error) { die("La Conexión ha fallado: " . $conn->connect_error);    }
    // Almacenamos en la variable conexión que la conexión está abierta
    $conexion=1;
    // mensaje para desarrolladores
    development('conexión con Base de Datos establecida correctamente');
   

    // CONSULTA SQL
    // Se obtiente como parámetro a través de la variable $sql
    $result = $conn->query($sql);

    // DESPLIEGUE DE DATOS
    // Se optinenen los datos a mostrar a partir de la variable $datos y %link
    
    // si $datos tiene algo, mostrará la lista de elementos solicitados, si no no se ejecutará
        if (!empty($datos)) {
            if ($result->num_rows > 0) {
            // output data of each row
            $i=0;
            while($row = $result->fetch_assoc()) {
                echo '<li>';
                    foreach($datos as $clave => $valor){
                        if($link){
                            echo '<a href="info.php?id='.$row["id"].'">';
                        }
                        if($valor=='img'){
                            echo '<img src="'.$row[$clave].'">';
                        }
                        else{
                        echo $row[$clave]." " ;
                        }
                        if($link){
                            echo '</a>';
                        }
                    }
                echo '</li>';
                $i++;
            }
            } else {
            echo "0 results";
            }

        } // cierre de if $datos !empty
    
    
    
} // cierre de función







// carga de bloques en el HTML
function cargar($cosa){
    global $titulo;
    global $conexion;

    switch($cosa){
        //includes
        case 'header':
        case 'cabecera':
        case 'header.php':
            include RUTA['inc'].'_header.php';
            development('Se ha cargado: '.$cosa);
            break;
        case 'footer':
        case 'footer.php':
        case 'pie':
            include RUTA['inc'].'_footer.php';
            development('Se ha cargado: '.$cosa);
            break;
        case 'menu':
            include RUTA['inc'].'_menu.php';
            development('Se ha cargado: '.$cosa);
            break;
        // echo    
        case 'style':
            echo RUTA['css'].'style.css';
            break;
        case 'script':
            echo RUTA['js'].'script.js';
            break;
            
        default:
            include RUTA['inc'].$cosa;
    }

    
}






// --- CARGAR PÁGINA
cargar('header');




/*
-- Borrar Base de datos
DROP TABLE miBasedeDatos.alumnos;

-- Crear tabla con sus índices
CREATE TABLE `alumnos` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(32) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `foto` varchar(32) NOT NULL
);




-- Insertar información
INSERT INTO `alumnos` (`nombre`, `apellidos`, `foto`) VALUES
('Elena', 'Luna', '001.jpg'),
('Alejandro', 'Soleado', '002.jpg'),
('Lucía', 'Estelar', '003.jpg'),
('David', 'Aurora', '004.jpg'),
('Mia', 'Cielo', '005.jpg'),
('Samuel', 'Galaxia', '006.jpg'),
('Valentina', 'Nebula', '007.jpg'),
('Mateo', 'Luminoso', '008.jpg'),
('Sofía', 'Celestial', '009.jpg'),
('Liam', 'Estrella', '010.jpg'),
('Isabella', 'Cosmos', '011.jpg'),
('Noah', 'Cometa', '012.jpg'),
('Emma', 'Orbita', '013.jpg'),
('Oliver', 'Astralis', '014.jpg'),
('Ava', 'Quasar', '015.jpg'),
('James', 'Astro', '016.jpg'),
('Emily', 'Sideral', '017.jpg'),
('Benjamin', 'Supernova', '018.jpg'),
('Charlotte', 'Eclíptica', '019.jpg'),
('Ethan', 'Nébula', '020.jpg'),
('Amelia', 'Luz', '021.jpg'),
('Mason', 'Cometario', '022.jpg'),
('Harper', 'Interstelar', '023.jpg'),
('Logan', 'Estelar', '024.jpg'),
('Aria', 'Cosmica', '025.jpg');




*/