<script>
    //MAPA -- OPEN MAPS -- //
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

// Añadir una capa topográfica de OpenStreetMap
var capaTopografico = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
});




    // Definir opciones de control de capas
    var baseMaps = {
        "Mapa": capaMapa,
        "Satélite": capaSatelite,
        "Mapa Topográfico": capaTopografico
    };

    // Añadir control de capas al mapa
    L.control.layers(baseMaps).addTo(mapa);

// Definir opciones de marcador
var markerOptions = {
    icon: L.icon({
        iconUrl: '/assets/icon/icon_fork.png', // URL del icono
        iconSize: [30, 30],           // Tamaño del icono
    })
};

// Añadir marcadores para cada ubicación en el arreglo
locations.forEach(function (location) {
    var marker = L.marker([location.lat, location.lon], markerOptions).addTo(mapa);
    marker.bindPopup('<b>' + location.title + '</b><br>' + location.content);
});

</script>