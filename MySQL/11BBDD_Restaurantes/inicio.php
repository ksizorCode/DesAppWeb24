<?php
include_once '_functions.php';
$titulo='Inicio';
include '_header.php';?>

<ul class="lista">
    <?php
    $sql="SELECT * FROM restaurantes;";
    $datos=consulta($sql);

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
    }   

    ?>
</ul>




<h2>Mapa de localizaciones</h2>





<!-- Incluye Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<!-- Asegúrate de incluir Leaflet JS antes de tu script personalizado -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Contenedor del mapa -->
<div id="mapa" style="height: 600px;"></div>

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
        zoom: 10
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



<?php include '_footer.php';?>