<?php
include_once '../_functions.php';

//Creamos una sesión de tipo admin;
crearSesion('rol','admin');


//cargamos el contenidos del resto de la web:
$titulo='Acceder';
include '../_header.php';
?>





<div class="box">

<form>
    <label><span>usuario</span>
        <input type="text" name="usuario" placeholder="email, nombre de usuario o teléfono">
    </label>
    <label><span>contraseña</span>
        <input type="password" name="password" placeholder="contraseña">
    </label>

    <input type="submit" value="Entrar">
</form>

<a href="forgot.php">Olvidé mi contraseña</a>

</div>

<?php include '../_footer.php';?>