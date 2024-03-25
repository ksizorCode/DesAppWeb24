<?php
// Array de opciones para los checkboxes
$opciones = [
    'opcion1' => 'titulo',
    'opcion2' => 'extracto',
    'opcion3' => 'telefono',
    'opcion4' => 'web',
    'opcion5' => 'whatsapp',
    'opcion6' => 'redes'
];
// Nombre para la cookie que almacenará los estados de los checkboxes
$cookie_name = "checkbox_states";

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicializar array para almacenar el estado de los checkboxes
    $checkbox_states = array();

    // Recorrer las opciones y guardar su estado
    foreach ($opciones as $clave => $valor) {
        // Verificar si el checkbox está marcado
        if (isset($_POST[$clave])) {
            $checkbox_states[$clave] = true;
        } else {
            $checkbox_states[$clave] = false;
        }
    }

    // Convertir el array a formato JSON y guardarlo en una cookie
    setcookie($cookie_name, json_encode($checkbox_states), time() + (86400 * 30), "/"); // 86400 = 1 día
} else {
    // Comprobar si existen datos guardados en la cookie
    if (isset($_COOKIE[$cookie_name])) {
        // Obtener el estado de los checkboxes desde la cookie
        $checkbox_states = json_decode($_COOKIE[$cookie_name], true);
    } else {
        // Si no hay datos guardados, inicializar todos los checkboxes como no marcados
        $checkbox_states = array_fill_keys(array_keys($opciones), false);
    }

     // Activar algunas opciones específicas (por ejemplo, 'opcion1' y 'opcion3')
     $checkbox_states['opcion1'] = true;
     $checkbox_states['opcion3'] = true;
}
?>

<!-- Formulario con los checkboxes -->
<form method="post">
    <?php foreach ($opciones as $clave => $valor) : ?>
        <label>
        <input type="checkbox" name="<?php echo $clave; ?>" <?php if ($checkbox_states[$clave]) echo 'checked'; ?>>
        <?php echo $valor; ?>    
    </label><br>
    <?php endforeach; ?>
    <input type="submit" value="Guardar">
</form>
