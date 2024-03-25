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

// Consulta para obtener la estructura de la tabla
$sql = "DESCRIBE restaurantes";
$result = $conn->query($sql);

// Cerrar conexión
$conn->close();


if ($result->num_rows > 0) {
    // Crear el formulario
    echo "<form action='procesar_formulario.php' method='post'>";

    // Iterar sobre cada columna
    while ($row = $result->fetch_assoc()) {
        $columnName = $row["Field"];
        $columnType = $row["Type"];

        // Determinar el tipo de entrada según el tipo de columna
        $inputType = "text"; // Por defecto, tipo texto
        if ($columnType === "tinyint(1)" || $columnType === "bool" || $columnType === "boolean") {
            $inputType = "checkbox";
        } elseif (strpos($columnType, "int") !== false) {
            $inputType = "number";
        } elseif (strpos($columnType, "varchar") !== false) {
            $inputType = "text";
        } elseif (strpos($columnType, "text") !== false) {
            $inputType = "textarea";
        }

        // Crear etiqueta y entrada según el tipo de columna
        echo '<div class="labelpack it-'.$inputType.'">';
        echo "<label for='$columnName'>$columnName:</label>";
        if ($inputType == "textarea") {
            echo "<textarea name='$columnName'></textarea>";
        } elseif ($inputType == "checkbox") {
            echo "<input type='checkbox' name='$columnName' value='1'>";
        } else {
            echo "<input type='$inputType' name='$columnName'>";
        }
        echo "</div>";
    }

    // Botón de enviar
    echo "<input type='submit' value='Enviar'>";
    echo "</form>";
} else {
    echo "La tabla no tiene columnas.";
}


?>




    <?php include '_footer.php';?>