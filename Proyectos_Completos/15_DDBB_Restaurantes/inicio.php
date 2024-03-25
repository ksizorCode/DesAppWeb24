    <?php
include_once '_functions.php';

$mapaHeader=true;

// Obtener el término de búsqueda si existiese
if(isset($_GET['b']) && !empty($_GET['b'])) {
    $busqueda = $_GET['b'];
    //Definir consulta
    // $sql = "SELECT * FROM restaurantes WHERE nombre LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' OR extracto LIKE '%$busqueda%' OR direccion LIKE '%$busqueda%' OR telefono LIKE '%$busqueda%'";
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
WHERE 
    r.nombre LIKE '%$busqueda%' OR 
    r.descripcion LIKE '%$busqueda%' OR 
    r.extracto LIKE '%$busqueda%' OR 
    r.direccion LIKE '%$busqueda%' OR 
    r.telefono LIKE '%$busqueda%'
GROUP BY 
    r.id;";
    $placeholder=$busqueda;  
    $titulo='Resultados de búsqueda para <span class="destacado">'.$busqueda.'</span>'; 
} 
else {
    //Definir consulta
    $sql="SELECT r.nombre AS nombre_restaurante,r.id, r.nombre, r.foto, r.direccion, r.telefono, r.lat, r.lon, r.web, r.email, r.descripcion, r.extracto, r.slug, 
    GROUP_CONCAT(c.nombre) AS categorias,
    GROUP_CONCAT(c.icono) AS iconos
    FROM restaurantes AS r
    LEFT JOIN restaurantes_categorias AS rc ON r.id = rc.restaurante_id
    LEFT JOIN categorias AS c ON rc.categoria_id = c.id
    GROUP BY r.id";
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
    <nav>
  <button onclick="cambiarVista(this, 'galeria')" title="Mostrar listado en cuadrícula" class="activo" ><i class="fa-solid fa-grip"></i></button>
  <button onclick="cambiarVista(this, 'lista')" title="Mostrar en lista"><i class="fa-solid fa-grip-lines"></i></button>
  <button onclick="cambiarVista(this, 'tabla')" title="Mostrar en tabla"><i class="fa-solid fa-bars"></i></button>
  <button onclick="cambiarVista(this, 'ficha')" title="Mostrar en Mini-fichas"><i class="fa-solid fa-table-cells-large"></i></button>
  <button onclick="cambiarVista(this, 'reticula')" title="Mostrar en Retícula"><i class="fa-solid fa-table-cells"></i></button>
    </nav>
  <details>
    <summary title="Opciones"><i class="fa-solid fa-sliders"></i></summary>
  <input type="range" min="10" max="100"  id="slider">

  <span>Vista tipo: <span id="textoVista" class="corporativo">galeria</span> a un <span id="textoVistaValue" class="corporativo">24%</span></span>

  <?php include '---cosa2.php'; ?>

  </details>
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
            echo '<h2 id="r_nombre">'.$dato['nombre'].'</h2>';
            echo '<span id="r_extracto" class="extracto">'.$dato['extracto'].'</span>';
            echo '<span id="r_telefono" class="telefono">'.$dato['telefono'].'</span>'; 
            echo '<span id="r_direccion" class="direccion">'.$dato['direccion'].'</span>';
            echo '<span id="r_web" class="web">'.$dato['web'].'</span>';
            echo '<span id="r_email" class="email">'.$dato['email'].'</span>';

            //echo '<a href="info.php?id='.$dato['id'].'" class="btn">Ver más</a>';
            echo '<a href="'.$dato['slug'].'" class="btn">Ver más</a>';

            
  // Mostrar las categorías con sus iconos
  if (!empty($dato['categorias'])) { //si el array de categorías no está vacío
    $categorias = explode(',', $dato['categorias']); //separa cada elemento en un array llamado categorias
    
    $lista_categorias = '';
    foreach($categorias as $categoria){
        $lista_categorias .= $categoria.', ';
    }
    echo rtrim($lista_categorias, ', ');



} else {
    // Mostrar un mensaje si no hay categorías
    echo "Sin categorías";
}


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




<!-- Carga JS slider -->
<script src="<?php echo RUTA.'/assets/js/catalogo_slider.js'?>"></script>
<!-- Carga JS filtro visualización -->
<script src="<?php echo RUTA.'/assets/js/catalogo_filtro_visualizaciones.js'?>"></script>



<?php cargarMapa($datos);?> 







<script>
window.addEventListener('DOMContentLoaded', function() {
    // Obtener todos los checkboxes
    var checkboxes = document.querySelectorAll('#checkboxForm input[type=checkbox]');

    // Obtener el elemento a mostrar
    var elementoAMostrar = document.getElementById('elemento_a_mostrar');

    // Función para verificar si algún checkbox está desactivado
    function verificarCheckboxes() {
        var algunoDesactivado = false;

        // Verificar cada checkbox
        checkboxes.forEach(function(checkbox) {
            if (!checkbox.checked) {
                algunoDesactivado = true;
            }
        });

        // Mostrar u ocultar el elemento según el estado de los checkboxes
        if (algunoDesactivado) {
            elementoAMostrar.style.display = 'block';
        } else {
            elementoAMostrar.style.display = 'none';
        }
    }

    // Verificar los checkboxes al cargar la página
    verificarCheckboxes();

    // Agregar un evento de cambio a todos los checkboxes
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', verificarCheckboxes);
    });
});
</script>


<?php include '_footer.php';?>