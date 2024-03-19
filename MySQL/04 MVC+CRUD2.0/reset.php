<?
$titulo="Reset";
require '_functions.php';
cargar('header');


 $sql="SELECT * FROM alumnos";
 $alumnos=consulta($sql);
?>


<a href="borraTabla.php" class="btn">Borrar Tabla</a>
<a href="crearTabla.php" class="btn">Crear Tabla</a>
<a href="inserTabla.php" class="btn">Insertar Datos</a>

<h2>Estos son los datos actuales de la tabla:</h2>
<?


  if(!empty($alumnos)){
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

}
else{
  echo "No se han podido encontrar datos de alumnos en la base de datos. <a href='inserTabla.php'>Click aquí para crear datos</a>";
}
cargar('footer');?>