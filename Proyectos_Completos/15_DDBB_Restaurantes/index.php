<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalación del sistema</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
</head>
<body id="instalacion-inicial">
    <main>

<div>
<?include 'assets/includes/personaje.php'?>

</div>


    <div>
    <h1>Hola!</h1>
    <h2>Si estas viendo esto es que hay algo mal configurado en el sistema</h2>
    <p>Voy a guiarte a cerca de cómo puedes llevar a cabo la instalación de esta plataforma. Es importante que sigas cada paso en el orden adecuado:</p>
    <h2>Instalación</h2>
    <p>Asegúrate de que:</p>

    <h3>En los archivos de .php ( del Servidor FTP o en tu Servidor Local)</h3>
    <div class="debug">
        <ol>
        <li>Estás usando <mark>Apache</mark> y no Nginx</li>
        <li>El contenido está en la raiz de toda la estructura y no es un subdirectorio o subcarpeta</li>
        <li>Inserta en functions.php la <mark>RUTA</mark> de la raiz. Algo tipo: <code>http://localhost:1005/</code></li>
    </ol>
</div>
    <h3>En el  la Base de datos</h3>
    <div class="debug">
        <ol>
        <li>Crea la base de datos llamada <mark>'restaurantes'</mark>. Revisa contraseña y usuario (localhost, root, root si usas localwp | localhost, root, , si usas Xampp)</li>
        <li>Resetea la información de la base de datos. Puedes hacerlo directamente desde aquí <a href="reset.php">reset.php</a></li>
    </ol>
</div>


    <div class="debug code">

por último acuérdate de desactivar el modo Debug en functions.php, que viene activado por defecto.</div>

    <p>También puedes intentar forzar la visualización de la página de incio, pero sin haber hecho los pasos anteriores, es muy probable que no funcione, ya que elemnentos importantes como definir cual es la RAIZ del sitio es un elemento clave para armar toda al estructura de enlaces a contenidos en la web. <a href="inicio.php">inicio.php</a></p>

    </div>
    </main>
   
</body>
</html>