    <?php
include_once '_functions.php';

$mapaHeader=true;

// Obtener el término de búsqueda si existiese
if(isset($_GET['b']) && !empty($_GET['b'])) {
    $busqueda = $_GET['b'];
    //Definir consulta
    $sql = "SELECT * FROM restaurantes WHERE nombre LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' OR extracto LIKE '%$busqueda%' OR direccion LIKE '%$busqueda%' OR telefono LIKE '%$busqueda%'";
    $placeholder=$busqueda;  
    $titulo='Resultados de búsqueda para <span class="destacado">'.$busqueda.'</span>'; 
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

  <form action="" id="menu_opciones">
    <label><input type="checkbox" name="titulo" id="titulo" checked>titulos</label>
    <label><input type="checkbox" name="extracto" id="extracto" checked>extracto</label>
    <label><input type="checkbox" name="telefono" id="telefono" checked>teléfono</label>
    <label><input type="checkbox" name="direccion" id="direccion" checked>dirección</label>
    <label><input type="checkbox" name="web" id="web">web</label>
    <label><input type="checkbox" name="redessociales" id="redessociales">redes</label>

    <label for="whatsapp" class="customCheckboxLabel">
    <input type="checkbox" name="whatsapp" id="whatsapp" class="customCheckbox">
    Whatsapp
</label>
  </form>

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




<!-- Carga JS slider -->
<script src="<?php echo RUTA.'/assets/js/catalogo_slider.js'?>"></script>
<!-- Carga JS filtro visualización -->
<script src="<?php echo RUTA.'/assets/js/catalogo_filtro_visualizaciones.js'?>"></script>



<?php cargarMapa($datos);?> 


<?php include '_footer.php';?>