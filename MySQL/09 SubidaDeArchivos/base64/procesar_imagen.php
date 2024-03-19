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

// Procesar la imagen
if ($_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
    // Obtener datos de la imagen
    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
    $imagen = base64_encode($imagen);

    // Insertar la imagen en la base de datos utilizando una declaración preparada
    $sql = "INSERT INTO images (base64) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $imagen);

    if ($stmt->execute()) {
        echo 'Imagen subida correctamente a la base de datos.';
    } else {
        echo 'Error al subir la imagen a la base de datos: ' . $stmt->error;
    }

    $stmt->close();
} else {
    echo 'Error al cargar la imagen.';
}

// Cerrar la conexión
$conn->close();
?>
