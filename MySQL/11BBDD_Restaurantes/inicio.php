<?php
include_once '_functions.php';
$titulo='Inicio';
include '_header.php';?>

<ul class="lista">
    <?php
    $sql="SELECT * FROM restaurantes;";
    $datos=consulta($sql);

    foreach($datos as $dato){
        echo '<li>';
            //echo '<img src="img/'.$dato['foto'].'" alt="'.$dato['nombre'].' - '.$dato['direccion'].'"/><br/>';
            $alt="Restaurante ".$dato['nombre']." en ".$dato['direccion'];
            img($dato['foto'],$alt);
            
            echo '<h2>'.$dato['nombre'].'</h2>';
            echo '<span>Dirección: '.$dato['direccion'].'</span>';
            echo '<span>Teléfono: '.$dato['telefono'].'</span>'; 
            echo '<a href="info.php?id='.$dato['id'].'" class="btn">Ver más</a>';
        echo '</li>';
    }   

    ?>
</ul>


<?php include '_footer.php';?>