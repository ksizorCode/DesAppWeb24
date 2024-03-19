<?php
// cargamos las funciones habituales
require '_functions.php';

// consultamos el id de la URL
$id=$_GET['id'];
// preparamos la consulta a la base de datos
$sql="SELECT * FROM alumnos WHERE id=".$id;
// lanzamos la consulta
$alumnos=consulta($sql);

mostrarArray($alumnos);

//Cargamos título de la web y variable alumno tendrá el mismo valor
$titulo = $alumno = $alumnos[0]['nombre']." ".$alumnos[0]['apellidos'];
$titulo = 'Editar: '.$titulo;
cargar('header'); ?>


<form action="_update-datos.php">

        <input type="hidden" name="id" value="<? e($alumnos[0]['id'])?>" require>


<label>Nombre
        <input type="text" name="nombre" value="<? e($alumnos[0]['nombre'])?>" require>
    </label>
    <label>Apellidos
        <input type="text" name="apellidos"  value="<? e($alumnos[0]['apellidos'])?>" require>
    </label>
    <label>Foto
        <input type="text" name="foto"  value="<? e($alumnos[0]['foto'])?>" require>
    </label>
    <label>Teléfono
        <input type="number" name="telefono"  value="<? e($alumnos[0]['telefono'])?>" require>
    </label>
    <label>Email
        <input type="email" name="email"  value="<? e($alumnos[0]['email'])?>" require>
    </label>
    <label>Dirección
        <input type="text" name="direccion"  value="<? e($alumnos[0]['direccion'])?>" require>
    </label>

    <input type="submit" value="Actualizar datos">


</form>

<? cargar('footer');


//llamar al footer.php ?>