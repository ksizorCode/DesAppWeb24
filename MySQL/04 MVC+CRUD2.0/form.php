<?
$titulo="Insertar Nuevo Alumno";
require '_functions.php';
cargar('header');
?>

<form action="_insertar-datos.php" method="get">
    <label>Nombre
        <input type="text" name="nombre" require>
    </label>
    <label>Apellidos
        <input type="text" name="apellidos" require>
    </label>
    <label>Foto
        <input type="text" name="foto" require>
    </label>
    <label>Teléfono
        <input type="number" name="telefono" require>
    </label>
    <label>Email
        <input type="email" name="email" require>
    </label>
    <label>Dirección
        <input type="text" name="direccion" require>
    </label>

    <input type="submit" value="Guardar Alumno">


</form>

<? cargar('footer');


//llamar al footer.php ?>