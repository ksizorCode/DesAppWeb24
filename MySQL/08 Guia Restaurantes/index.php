<?php
    $titulo="Inicio";
    require '__functions.php';
    cargar('header');

    $sql="SELECT * FROM restaurantes";
    $datos=consulta($sql);

    echo '<ul class="lista">';
    // Recorrer y mostrar los datos de los alumnos
    foreach ( $datos as $dato) {
        $ruta = RUTA['img'];
        
        echo <<<HTML
        <li>
        <a href="info.php?id={$dato['id']}">
            <img src="{$ruta}{$dato['foto']}" alt="{$dato['nombre']}">
            <h2>{$dato['nombre']}</h2>
        </a>
        </li>
        HTML;
    
    }
    echo '</ul>';

    cargar('footer');
?>