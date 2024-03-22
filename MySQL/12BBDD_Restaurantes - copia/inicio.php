<?php
include_once '_functions.php';

$mapaHeader=true;

// Obtener el término de búsqueda si existiese
if(isset($_GET['b']) && !empty($_GET['b'])) {
    $busqueda = $_GET['b'];
    //Definir consulta
    $sql = "SELECT * FROM restaurantes WHERE nombre LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' OR extracto LIKE '%$busqueda%' OR direccion LIKE '%$busqueda%' OR telefono LIKE '%$busqueda%'";
    $placeholder=$busqueda;  
    $titulo='Resultados de búsqueda para '.$busqueda; 
} 
else {
    //Definir consulta
    $sql="SELECT * FROM restaurantes;";
    $placeholder="Buscar restaurantes... ";
    $titulo='Buscar Restaurantes';
}
//Lanzar consulta
$datos=consulta($sql);

include '_header.php';
?>




<form action="" class="formBuscador">
    <label for="inptBuscar" id="labelBuscar">Buscar</label>
    <input type="text" name="b" id="inptBuscar" list="listarestaurantes" placeholder="<?php echo $placeholder; ?>">
    
    <datalist id="listarestaurantes">
        <?php //Construir lista de sugerencias

        $sql="SELECT nombre FROM restaurantes;"; //Definir consulta
        $todoslosrestaurantes=consulta($sql);//Lanzar consulta
        foreach($todoslosrestaurantes as $restaurante){
            echo '<option value="'.$restaurante['nombre'].'"></option>';
        }
        
        ?>
    </datalist>



    <input type="submit" value="Buscar">
</form>







<div class="bntVista">
  <button onclick="cambiarVista(this, 'galeria')" title="Mostrar listado en cuadrícula" class="activo" ><i class="fa-solid fa-grip"></i></button>
  <button onclick="cambiarVista(this, 'lista')" title="Mostrar en lista"><i class="fa-solid fa-grip-lines"></i></button>
  <button onclick="cambiarVista(this, 'tabla')" title="Mostrar en tabla"><i class="fa-solid fa-bars"></i></button>
  <button onclick="cambiarVista(this, 'ficha')" title="Mostrar en Mini-fichas"><i class="fa-solid fa-table-cells"></i></button>
</div>




<ul id="catalogo" class="galeria">
    <?php


if (isset($datos) && !empty($datos)) {

    foreach($datos as $dato){
        echo '<li style="background-image:url(assets/img/'.$dato['foto'].')">';
            //echo '<img src="img/'.$dato['foto'].'" alt="'.$dato['nombre'].' - '.$dato['direccion'].'"/><br/>';
            $alt="Restaurante ".$dato['nombre']." en ".$dato['direccion'];
            img($dato['foto'],$alt);

            echo '<div>';
            echo '<h2>'.$dato['nombre'].'</h2>';
            echo '<span class="extracto">'.$dato['extracto'].'</span>';
            echo '<span class="telefono">'.$dato['telefono'].'</span>'; 
            echo '<span class="direccion">'.$dato['direccion'].'</span>';

            //echo '<a href="info.php?id='.$dato['id'].'" class="btn">Ver más</a>';
            echo '<a href="'.$dato['slug'].'" class="btn">Ver más</a>';
            echo '</div>';

            if(rolAdmin()){
                echo '<a href="'.$dato['slug'].'" class="editar"></a>';
                }

        echo '</li>';
    } //foreach  


    } //if
    else{
        echo "No se han encontrado datos con el término ".$busqueda;
    }
    















    ?>
</ul>


<script>
    // Arreglo de localizaciones con sus respectivas coordenadas y contenido del marcador
    var locations = [

      <?php foreach($datos as $dato){
        echo "{";
        echo "lat:".$dato['lat'].",lon:".$dato['lon'].", ";
        echo "title: \"".$dato['nombre']."\", ";
        echo "content: \" <img src='".RUTA.'assets/img/'.$dato['foto']."'> ".$dato['extracto']." <a href='".$dato['slug']."'>Ver más</a>\"";
      
        echo "}, \n";
      } ?>
      
    ];
  
    // Creamos el objeto que representará al mapa
  

    console.log(locations);

    // Inicializar el mapa
    var mapa = L.map('mapa', {
        center: [43.445813, -5.847552],
        zoom: 9
    });

    // Añadir una capa de mapa de OpenStreetMap
    var capaMapa = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(mapa);

    // Añadir una capa de satélite
    var capaSatelite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Esri, DigitalGlobe, GeoIQ, Earthstar Geographics, CNES/Airbus DS, USDA FSA, USGS, Aerogrid, IGN, IGP, and the GIS User Community'
    });

    // Definir opciones de control de capas
    var baseMaps = {
        "Mapa": capaMapa,
        "Satélite": capaSatelite
    };

    // Añadir control de capas al mapa
    L.control.layers(baseMaps).addTo(mapa);

    // Añadir marcadores para cada ubicación en el arreglo
    locations.forEach(function (location) {
        var marker = L.marker([location.lat, location.lon]).addTo(mapa);
        marker.bindPopup('<b>' + location.title + '</b><br>' + location.content);
    });
</script>





<script>

// function cambiarVista(vista) {
//     let galeria = document.querySelector('#catalogo');

//     // Eliminar todas las clases actuales de la galería
//     galeria.classList.remove('lista');
//     galeria.classList.remove('galeria');
//     galeria.classList.remove('tabla');
//     galeria.classList.remove('ficha');

//     // Agregar la clase correspondiente según la opción seleccionada
//     galeria.classList.add(vista);
//     }



function cambiarVista(boton, vista) {
    let galeria = document.querySelector('#catalogo');
let botones = document.querySelectorAll('.bntVista button');
  
    // Eliminar la clase 'activo' de todos los botones dentro de '.bntVista'
    botones.forEach(function(boton) {
      boton.classList.remove('activo');
    });
  
    // Agregar la clase 'activo' solo al botón clicado
    boton.classList.add('activo');
  
    // Eliminar todas las clases actuales de la galería
    galeria.classList.remove('galeria');
    galeria.classList.remove('lista');
    galeria.classList.remove('tabla');
    galeria.classList.remove('ficha');
  
    // Agregar la clase correspondiente según la opción seleccionada
    galeria.classList.add(vista);
  }
  

</script>

<?php include '_footer.php';?>