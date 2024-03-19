<?php $titulo="Reset";?>
<?php require '_functions.php'; ?>

<h1><?echo $titulo;?></h1>
<p>Vamos a resetear todo el contenido de la base de datos.</p>
<p>Para que esto funcine, tienes que tener creada la base de datos "miBaseDeDatos" en tu servidor MySQL</p>
<p>Verifica en functions.php que las claves de acceso a la BBDD son correctas, por defecto: localhost, root y root</p>


<a href="borrarTabla.php" class="btn">Borrar tabla alumnos</a>
<a href="crearTabla.php" class="btn">Crear tabla alumnos</a>
<a href="insertarDatos.php" class="btn">Insertar Datos en tabla alumnos</a>



<?php cargar('footer'); ?>