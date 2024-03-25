    <?php
    include_once '_functions.php';
    $titulo='Formulario';
    include '_header.php';?>


<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "restaurantes";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener los nombres y tipos de datos de los campos de la tabla usuarios
$consulta = "DESCRIBE restaurantes";
$resultado = $conn->query($consulta);

// Comprobar si la consulta fue exitosa
if ($resultado) {
    // Crear el formulario HTML
    echo '<form action="procesar_formulario.php" method="post">';
    while ($fila = $resultado->fetch_assoc()) {
        // Mostrar un campo de entrada para cada columna de la tabla usuarios
        echo '<label>' . $fila['Field'] . ':';
        
        // Si el tipo de datos es BOOLEAN, mostrar un checkbox
        if (strpos($fila['Type'], 'BOOLEAN') !== false) {
            echo '<input type="checkbox" name="' . $fila['Field'] . '"><br>';
        } else {
            // De lo contrario, mostrar un campo de texto
            echo '<input type="text" name="' . $fila['Field'] . '"><br>';
        }
        echo '</label>';
    }
    echo '<input type="submit" value="Enviar">';
    echo '</form>';
} else {
    echo "Error al obtener los campos de la tabla usuarios";
}

// Cerrar la conexión
$conn->close();
?>





    <?php include '_footer.php';?>