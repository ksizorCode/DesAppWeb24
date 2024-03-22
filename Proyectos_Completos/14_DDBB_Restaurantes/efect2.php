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
            echo '<span>Dirección: '.$dato['direccion'].'</span>';
            echo '<span>Teléfono: '.$dato['telefono'].'</span>'; 
            echo '<a href="info.php?id='.$dato['id'].'" class="btn">Ver más</a>';
            echo '</div>';

        echo '</li>';
    }   

    ?>
</ul>


<video autoplay muted loop id="bgVideo">
  <source src="assets/video/bg.mp4" type="video/mp4">
  Tu navegador no soporta video
</video>


<?php include '_footer.php';?>






