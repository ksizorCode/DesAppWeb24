<?
$titulo="Inicio";
require '_functions.php';
cargar('header');

 $sql="SELECT * FROM alumnos";
 $alumnos=consulta($sql);

echo '<ul class="lista">';
// Recorrer y mostrar los datos de los alumnos
foreach ( $alumnos as $alumno) {
    $ruta = RUTA['img'];
    
    echo <<<HTML
    <li>
      <a href="info.php?id={$alumno['id']}">
        <img src="{$ruta}{$alumno['foto']}" alt="{$alumno['nombre']} {$alumno['apellidos']}">
        {$alumno['nombre']} {$alumno['apellidos']}
      </a>
    </li>
    HTML;
  
  }
echo '</ul>';


cargar('footer');?>