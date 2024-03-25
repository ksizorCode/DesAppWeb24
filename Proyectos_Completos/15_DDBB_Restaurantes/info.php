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
// $sql='SELECT * FROM restaurantes WHERE slug="'.$slug.'"';
$sql = "SELECT 
r.nombre AS nombre_restaurante,
r.id, 
r.nombre,
r.foto, 
r.direccion, 
r.telefono, 
r.lat,
r.lon,
r.web, 
r.email, 
r.descripcion, 
r.extracto, 
r.slug, 
GROUP_CONCAT(c.nombre) AS categorias,
GROUP_CONCAT(c.icono) AS iconos
FROM 
restaurantes AS r
LEFT JOIN 
restaurantes_categorias AS rc ON r.id = rc.restaurante_id
LEFT JOIN 
categorias AS c ON rc.categoria_id = c.id
WHERE slug='".$slug."'
GROUP BY 
r.id;";
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


<?php
// Mostrar las categorías con sus iconos
if (!empty($dato['categorias'])) { //si el array de categorías no está vacío
    $categorias = explode(',', $dato['categorias']); //separa cada elemento en un array llamado categorias
    
    $lista_categorias = '';
    foreach($categorias as $categoria){
        // Agregar cada categoría como un enlace
       // $lista_categorias .=
        echo  '<a href="ruta_a_tu_pagina?categoria=' . urlencode($categoria) . '" class="btn">' . $categoria . '</a>';
    }
    //echo rtrim($lista_categorias, ', '); //elimina la cóma del último elemento
} else {
    // Mostrar un mensaje si no hay categorías
    echo "Sin categorías";
}



?>


<!-- Contenedor del mapa -->
<div id="mapa" style="height: 460px;"></div>
<?php cargarMapa($datos);?> 





<?php include '_footer.php';?>