<script>
   // Array multidimensional con los datos a mostrar:
var locations = [
    {lat: 43.53782, lon: -5.66230, title: "El Crespo", content: "<img src='001.jpg'> Restaurante de comida tradicional asturiana. <a href='el-crespo'>Ver más</a>", category: "comida_tradicional"}, 
    {lat: 43.53512, lon: -5.66580, title: "El Cencerro", content: "<img src='002.jpg'> Especialidad en carnes a la brasa y platos caseros. <a href='el-cencerro'>Ver más</a>", category: "carnes"}, 
    {lat: 43.54320, lon: -5.66432, title: "Casa Baizán", content: "<img src='003.jpg'> Ambiente familiar y cocina asturiana de calidad. <a href='casa-baizan'>Ver más</a>", category: "comida_tradicional"}, 
    {lat: 43.53930, lon: -5.64640, title: "Le Menhir", content: "<img src='004.jpg'> Cocina francesa auténtica en un entorno acogedor. <a href='le-menhir'>Ver más</a>", category: "cocina_francesa"}, 
    {lat: 43.24954, lon: -6.01860, title: "L Esbardu", content: "<img src='005.jpg'> Saborea platos tradicionales asturianos con vistas al río. <a href='l-esbardu'>Ver más</a>", category: "comida_tradicional"},
    {lat: 41.3879, lon: 2.1699, title: "Barcelona", content: "<img src='006.jpg'> Ciudad cosmopolita con una gran oferta gastronómica. <a href='barcelona'>Ver más</a>", category: "ciudad"},
    {lat: 40.4168, lon: -3.7038, title: "Madrid", content: "<img src='007.jpg'> Capital de España con una variada oferta culinaria. <a href='madrid'>Ver más</a>", category: "ciudad"},
    {lat: 37.3891, lon: -5.9845, title: "Sevilla", content: "<img src='008.jpg'> Famosa por su gastronomía andaluza y tapas. <a href='sevilla'>Ver más</a>", category: "ciudad"},
    {lat: 28.4636, lon: -16.2518, title: "Tenerife", content: "<img src='009.jpg'> Isla con influencias culinarias canarias y españolas. <a href='tenerife'>Ver más</a>", category: "isla"},
    {lat: 39.4699, lon: -0.3763, title: "Valencia", content: "<img src='010.jpg'> Conocida por la paella y la cocina mediterránea. <a href='valencia'>Ver más</a>", category: "ciudad"},
    {lat: 43.2627, lon: -2.9253, title: "Bilbao", content: "<img src='011.jpg'> Destino gastronómico con pintxos y cocina vasca. <a href='bilbao'>Ver más</a>", category: "ciudad"}
];


// Inicializar el mapa
var mapa = L.map('mapa', {
    center: [43.445813, -5.847552],
    zoom: 7
});

// Añadir una capa de mapa de OpenStreetMap
var capaMapa = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(mapa);

// Definir opciones de marcador para cada tipo de restaurante
var markerOptions = {};


// TIPOS DE ICONOS:
// Icono para restaurantes de comida tradicional
markerOptions['comida_tradicional'] = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/15502/15502752.png',
    iconSize: [30, 30]
});

// Icono para restaurantes de carnes
markerOptions['carnes'] = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/12707/12707233.png',
    iconSize: [30, 30]
});

// Icono para restaurantes de cocina francesa
markerOptions['cocina_francesa'] = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/3190/3190845.png',
    iconSize: [30, 30]
});

// Icono para CIUDADES
markerOptions['ciudad'] = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/128/6944/6944237.png',
    iconSize: [130, 130]
});

// Icono para ISLA
markerOptions['isla'] = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/128/3025/3025894.png',
    iconSize: [30, 30]
});



// CONFIGURAR CADA ICONITO A CADA TIPO DE MARCADOR
// Añadir marcadores para cada ubicación en el arreglo
locations.forEach(function (location) {
    var marker = L.marker([location.lat, location.lon], {icon: markerOptions[location.category]}).addTo(mapa);
    marker.bindPopup('<b>' + location.title + '</b><br>' + location.content);
});




</script>