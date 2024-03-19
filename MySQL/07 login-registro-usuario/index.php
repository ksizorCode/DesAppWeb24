<?php require '_functions.php';?>
<?php include '_header.php';?>

<form action="revisarDatos.php"  method="post">
    <label>Usuario:
        <input type="text" name="usuario" placeholder="nombre" >
    </label><br>
    <label>Contraseña:
        <input type="password" name="contrasena" placeholder="*********"><br>
    </label>
    <button onclick="validar()">Ingresar</button>
</form>  

</body>
</html>