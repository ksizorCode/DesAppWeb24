<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subir Imagen</title>
</head>
<body>

  <h2>Subir Imagen</h2>
  
  <form action="procesar_imagen.php" method="post" enctype="multipart/form-data">
    <label for="imagen">Selecciona una imagen:</label>
    <input type="file" name="imagen" id="imagen" accept="image/*">
    <br>
    <input type="submit" value="Subir Imagen">
  </form>

  <h2>Mostrar imágenes existentes</h2>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "lista-imagenes";
  
  // Crear conexión
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Validar conexión
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  // Consulta para seleccionar todas las imágenes
  $sql = "SELECT `base64` FROM images";
  $result = $conn->query($sql);
  
  // Mostrar las imágenes
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          // Asegúrate de que la columna base64 contiene datos codificados en base64
          echo '<img src="data:image/jpeg;base64,' . $row['base64'] . '" alt="Imagen">';
      }
  } else {
      echo "No hay imágenes en la base de datos.";
  }
  
  // Cerrar la conexión
  $conn->close();
  ?>

</body>
</html>
