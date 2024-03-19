<?
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

cargar('header'); ?>

<a class="btn" href="form_edit.php?id=<? e($id)?>"><i class="fa-solid fa-pen"></i>Editar</a>
<a class="btn" onclick="confirm('¿Quieres eliminar a este alumno?') ? window.location.href = '_delete.php?id=<? e($id)?>&nombre=<? e($alumno)?>' : null;"><i class="fa-solid fa-trash"></i> Eliminar Alumno</a>


<div class="info">
    <div>
        <p><i class="fa-regular fa-envelope"></i>Correo electrónico: <a href="mailto:<?e($alumnos[0]['email'])?>"><?e($alumnos[0]['email'])?></a></p>
        <p><i class="fa-solid fa-phone"></i>Teléfono: <a href="tel:<?e($alumnos[0]['telefono'])?>"><?e($alumnos[0]['telefono'])?></a></p>
        <p><i class="fa-brands fa-whatsapp"></i>Whatsapp: <a target="_blank" href="https://wa.me/<?e($alumnos[0]['telefono'])?>">Enviar whatsapp</a></p>
        <p><i class="fa-solid fa-map-pin"></i>Dirección: <?e($alumnos[0]['direccion'])?></p>
        <a class="btn" target="_blank" href="https://www.openstreetmap.org/search?query=<? echo urlencode($alumnos[0]['direccion']); ?>">Ver en Open Maps</a>
        <a class="btn" target="_blank" href="https://www.google.es/maps/place/<? echo urlencode($alumnos[0]['direccion']); ?>">Ver en Google Maps</a>
        <a class="btn" target="_blank" href="https://duckduckgo.com/?t=h_&q=<? echo urlencode($alumnos[0]['direccion']); ?>&ia=web&iaxm=maps">Ver en Apple Maps</a>
    </div>
    <img src="<?e(RUTA['img'].$alumnos[0]['foto'])?>" alt="<?e($alumno)?>">
</div>
<? echo generarIframe($alumnos[0]['direccion']); ?>

<? cargar('footer');


//llamar al footer.php ?>