<script>
    //MAPA -- OPEN MAPS -- //
    // Arreglo de localizaciones con sus respectivas coordenadas y contenido del marcador
    var locations = [

      <?php foreach($datos as $dato){
        echo "{";
        echo "lat:".$dato['lat'].",lon:".$dato['lon'].", ";
        echo "title: \"".$dato['nombre']."\", ";
        echo "content: \" <img src='".RUTA.'assets/img/'.$dato['foto']."'> ".$dato['extracto']." <a href='".$dato['slug']."'>Ver más</a>\", ";
        echo "category: \"".$dato['icono']."\"";
        echo "}, \n";
      } ?>
    ];

    console.log(locations);
  
    // Creamos el objeto que representará al mapa
  
    // Inicializar el mapa
    var mapa = L.map('mapa', {
        center: [43.445813, -5.847552],
        zoom: 9
    });

    //TIPOS DE MAPAS:
    // Añadir una capa de mapa de OpenStreetMap
    var capaMapa = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(mapa);

    // Añadir una capa de satélite
    var capaSatelite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Esri, DigitalGlobe, GeoIQ, Earthstar Geographics, CNES/Airbus DS, USDA FSA, USGS, Aerogrid, IGN, IGP, and the GIS User Community'
    });

// Añadir una capa topográfica de OpenStreetMap
var capaTopografico = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
});


// Añadir una capa de mapa de carreteras
var capaCarreteras = L.tileLayer('https://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(mapa);

// Añadir una capa de mapa de ciclo
var capaCiclo = L.tileLayer('https://{s}.tile.thunderforest.com/cycle/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(mapa);

// Añadir una capa de mapa de transporte
var capaTransporte = L.tileLayer('https://{s}.tile.thunderforest.com/transport/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(mapa);

// Añadir una capa de mapa de paisaje
var capaPaisaje = L.tileLayer('https://{s}.tile.thunderforest.com/landscape/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(mapa);

/*  *  *  *  *  *  */

// Añadir una capa de mapa de senderos para caminatas
var capaSenderos = L.tileLayer('https://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(mapa);



// Añadir una capa de mapa de carreteras principales
var capaCarreterasPrincipales = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
    attribution: '© OpenStreetMap contributors'
}).addTo(mapa);

// Añadir una capa de mapa de relieve
var capaRelieve = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Shaded_Relief/MapServer/tile/{z}/{y}/{x}', {
    attribution: '© OpenStreetMap contributors'
}).addTo(mapa);


// Definir opciones de control de capas
var baseMaps = {
    "Satélite": capaSatelite,
    "Carreteras": capaCarreteras,
    "Topográfico": capaTopografico,
    "Bici": capaCiclo,
    "Transporte": capaTransporte,
    "Paisaje": capaPaisaje,
    "Senderismo":capaSenderos,
    "Carreteras":capaCarreterasPrincipales,
    "Relieve":capaRelieve,
    "Mapa": capaMapa
};

// Añadir control de capas al mapa
L.control.layers(baseMaps).addTo(mapa);

// Establecer "Mapa" como el mapa activo por defecto
capaMapa.addTo(mapa);


    // Definir opciones de marcador para cada tipo de restaurante
var markerOptions = {};


// TIPOS DE ICONOS:
// Icono para restaurantes
markerOptions['restaurante'] = L.icon({
    iconUrl: '<?php echo RUTA ?>/assets/icon/icon_fork.png', // URL del icono
    iconSize: [30, 30]
});

// Icono para CasaComidas
markerOptions['italiano'] = L.icon({
    iconUrl: '<?php echo RUTA ?>/assets/icon/icon_fork-italiano.png',
    iconSize: [30, 30]
});

// Icono para pastelerías
markerOptions['pasteleria'] = L.icon({
    iconUrl: '<?php echo RUTA ?>/assets/icon/icon_fork-pasteleria.png',
    iconSize: [30, 30]
});

// Icono bio / saludable
markerOptions['bio'] = L.icon({
    iconUrl: '<?php echo RUTA ?>/assets/icon/icon_fork-bio.png',
    iconSize: [30, 30]
});


// Icono para sitios de copas
markerOptions['copas'] = L.icon({
    iconUrl: '<?php echo RUTA ?>/assets/icon/icon_fork-copas.png',
    iconSize: [30, 30]
});



// CONFIGURAR CADA ICONITO A CADA TIPO DE MARCADOR
// Añadir marcadores para cada ubicación en el arreglo
locations.forEach(function (location) {
    var marker = L.marker([location.lat, location.lon], {icon: markerOptions[location.category]}).addTo(mapa);
    marker.bindPopup('<b>' + location.title + '</b><br>' + location.content);
});

</script>