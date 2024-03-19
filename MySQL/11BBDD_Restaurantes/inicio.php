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
    }   

    ?>
</ul>


<?php include '_footer.php';?>