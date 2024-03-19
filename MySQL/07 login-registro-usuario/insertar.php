<?php require '_functions.php';?>
<?php include '_header.php';?>

<form action="registrarUsuario.php"  method="post">
    <label>Nombre usuario:
        <input type="text" name="usuario" placeholder="nombre" >
    </label><br>
    <label>Contraseña:
        <input type="password" name="pass1" placeholder="*********">
        </label><br>    
    <label>Repite Contraseña:
        <input type="password" name="pass2" placeholder="*********">
        </label><br>
    <label>Email:
        <input type="email" name="email" placeholder="tu@email.com">
    </label><br>
    <button onclick="validar()">Ingresar</button>
</form>