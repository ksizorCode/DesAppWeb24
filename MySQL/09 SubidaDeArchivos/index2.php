<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
//Si llega info via metodo POST
if(isset($_POST['submit'])){
  // Carpeta donde se guardarán los archivos
  $carpeta = "files/";

  // Obtener el nombre de archivo y la ubicación temporal del archivo en el servidor
  $rutaArchivo = $carpeta . basename($_FILES["image"]["name"]);
  $tipoArchivoImagen = strtolower(pathinfo($rutaArchivo,PATHINFO_EXTENSION));
  $archivoTemporal = $_FILES["image"]["tmp_name"];

  // Comprobar si la imagen es válida
  $check = getimagesize($archivoTemporal);
  if($check === false) {
    echo "<p>El archivo seleccionado no es una imagen.</p>";
    exit();
  }

  $image_url = $carpeta . basename($_FILES["image"]["name"]);

  // Comprobar si el archivo ya existe en la carpeta de destino
  if (file_exists($rutaArchivo)) {
    echo "<p><img src='$image_url'></p>";
    echo "<p>El archivo  ". basename( $_FILES["image"]["name"]). " ya existe.</p>";
    echo '<a href="index.php">Volver a Cargar otra imagen</a>';
    exit();
  }

  // Comprobar el tamaño máximo del archivo (en bytes)
  $max_size = 1000000; // 1MB
  if ($_FILES["image"]["size"] > $max_size) {
    echo "<p>El archivo es demasiado grande.</p>";
    exit();
  }

  // Permitir solo ciertos tipos de archivo
  $allowed_types = array("jpg", "jpeg", "png", "gif");
  if(!in_array($tipoArchivoImagen, $allowed_types)) {
    echo "<p>Solo se permiten archivos JPG, JPEG, PNG y GIF.</p>";
    exit();
  }

   // Comprobar la resolución máxima permitida de la imagen (en píxeles)
  $max_width = 1900;
  $max_height = 1200;
  if($check[0] > $max_width || $check[1] > $max_height) {
    echo "<p>La resolución de la imagen no puede superar los 1900x1200 píxeles.</p>";
    exit();
  }

  // Subir la imagen al servidor y Mostrarla en pantalla en caso de que la carga sea correcta
  if (move_uploaded_file($archivoTemporal, $rutaArchivo)) {
    // Mostramos la imagen subida
    echo "<p class='imagen'><img src='$image_url'></p>";
    echo "Ruta del archivo es: <a href='{$rutaArchivo}'>{$rutaArchivo}</a>";
    echo "<p>La imagen ". basename( $_FILES["image"]["name"]). " ha sido subida correctamente:</p>";


  } else {
    echo "Error al subir la imagen.";

  }
} // fin del if de POST Submit
?>

    <form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <label for="image">Seleccionar imagen:</label>
      <input type="file" name="image" id="image">
      <input type="submit" name="submit" value="Subir imagen">
      <p>La imagen (JPG, JPEG, GIF o PNG) ha de ser menor de 1MB y no superar los 1900x1200 píxeles.</p>
    </form>
    

<?php
// Curiosidad para trastear. 
// Saber la ruta de la URL
$base_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo $base_url;
?>