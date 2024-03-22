<?php
include_once '_functions.php';

//Capturamos los datos que llegan via GET
if(isset($_GET['slug'])){
$slug=$_GET['slug'];
}
else{
    header('Location: error.html');
}

//Consulta a BBDD
$sql='SELECT * FROM restaurantes WHERE slug="'.$slug.'"';
$datos=consulta($sql);
debug($sql,'code');

if($datos=='ERROR'){
    header('Location: error');
}
//Convertimos los valore de la consulta a un array limpio
$dato = $datos[0];
debug($dato,'array');

//Inicializamos la variable titulo
$titulo =$dato['nombre'];
?>

<?php include '_header.php';?>


<?php
//Construimos la estructura de contenido de la ficha del restaurante
$alt="Restaurante ".$dato['nombre']." en ".$dato['direccion'];
img($dato['foto'],$alt,'portada');
?>

<address><?php echo $dato['direccion'];?></address>
<p><a href="tel:<?php echo $dato['telefono'];?>"><?php echo $dato['telefono'];?></a></p>
<p><a href="https://wa.me/<?php echo $dato['telefono'];?>" target="_blank">Enviar un Whatsapp a <?php echo $dato['nombre'] ?></a></p>








<!-- Contenedor del mapa -->
<div id="mapa" style="height:40vh"></div>

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





<?php include '_footer.php';?>