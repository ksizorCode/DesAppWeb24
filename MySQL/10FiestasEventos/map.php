<?php require_once '_functions.php'; ?>
<?php include '_header.php'; ?>

<?php
$sql = "SELECT DISTINCT titulo, descripcion, foto, lat, lon, fechainicio, fechafin FROM eventos;";
$datos= consulta($sql, true);


echo '<pre><code>';
print_r($datos);
echo '</code></pre>';

?>

<a href="index.php">Inicio</a>
    


<!-- Incluye Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<!-- Asegúrate de incluir Leaflet JS antes de tu script personalizado -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Contenedor del mapa -->
<div id="mapa" style="height: 600px;"></div>

<script>
    // Arreglo de localizaciones con sus respectivas coordenadas y contenido del marcador
    var locations = [

      <?php foreach($datos as $evento){
        echo "{ lat: ".$evento['lat']." , lon: ". $evento['lon'] .", ";
        echo "title: \"".$evento['titulo']."\", ";
        echo "content: \"".$evento['descripcion']."\"}, \n";
      } ?>
      
    ];
  
    // Creamos el objeto que representará al mapa
  

    console.log(locations);

    // Inicializar el mapa
    var mapa = L.map('mapa', {
        center: [40.416775, -3.703790],
        zoom: 3
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
