<?php
// Array de opciones para los checkboxes
$opciones = [
    // class => texto
    'nombre' => 'Nombre',
    'extracto' => 'Extracto',
    'telefono' => 'Telefono',
    'web' => 'Web',
    'whatsapp' => 'Whatsapp',
    'redes' => 'Redes Sociales',
    'foto' => 'Foto',
    'categorias' => 'Categorias',
    'vermas' => 'Botón',
    'direccion' => 'Direccion'

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
        // Activar algunas opciones específicas (por ejemplo, 'opcion1' y 'opcion3')
        $checkbox_states['nombre'] = true;
        $checkbox_states['extracto'] = true;
        $checkbox_states['telefono'] = true;
        $checkbox_states['direccion'] = true;
        $checkbox_states['vermas'] = true;
        $checkbox_states['foto'] = true;

    }

}
?>

<!-- Formulario con los checkboxes -->
<form id="checkboxForm" method="post">
    <?php foreach ($opciones as $clave => $valor) : ?>
        <label>
            <input type="checkbox" name="<?php echo $clave; ?>" class="checkboxMostrarOcultar" data-clase="r_<?php echo $clave; ?>" <?php if ($checkbox_states[$clave]) echo 'checked'; ?>>
            <?php echo $valor; ?>    
        </label>
    <?php endforeach; ?>
</form>

<script>
// Función para guardar el estado de los checkboxes en la cookie
function guardarEstadoCheckboxes() {
    // Obtener todos los checkboxes del formulario
    var checkboxes = document.querySelectorAll('#checkboxForm input[type=checkbox]');
    var checkboxStates = {};

    // Iterar sobre los checkboxes y guardar su estado
    checkboxes.forEach(function(checkbox) {
        checkboxStates[checkbox.name] = checkbox.checked;
    });

    // Convertir el objeto a formato JSON
    var checkboxStatesJSON = JSON.stringify(checkboxStates);

    // Guardar el JSON en la cookie
    document.cookie = "<?php echo $cookie_name; ?>=" + checkboxStatesJSON + "; path=/";
}

// Agregar un evento de cambio a todos los checkboxes para llamar a la función de guardarEstadoCheckboxes
document.querySelectorAll('#checkboxForm input[type=checkbox]').forEach(function(checkbox) {
    checkbox.addEventListener('change', guardarEstadoCheckboxes);
});





// OCULTAR MOSTRAR
document.addEventListener('DOMContentLoaded', function() { //ejecutar al finalizar la carga del DOM

        // Función para mostrar u ocultar elementos en la lista
        function mostrarOcultarEnLista(clase, activado) {
            // Obtener todos los elementos de la lista con la clase a mostrar/ocultar
            var elementos = document.querySelectorAll('ul *.' + clase);

            // Recorrer todos los elementos de la lista
            for (var i = 0; i < elementos.length; i++) {
                // Dependiendo del valor de activado, mostrar u ocultar los elementos de la lista
                if (activado) {
                    elementos[i].style.display = 'list-item'; // Mostrar el elemento en la lista
                } else {
                    elementos[i].style.display = 'none'; // Ocultar el elemento en la lista
                }
            }
        }

    // Ocultar inicialmente los elementos no marcados
    var checkboxes = document.getElementsByClassName('checkboxMostrarOcultar');
    for (var i = 0; i < checkboxes.length; i++) {
        var clase = checkboxes[i].getAttribute('data-clase');
        if (!checkboxes[i].checked) {
            mostrarOcultarEnLista(clase, false);
        }
    }


        // Obtener todos los checkboxes
        var checkboxes = document.getElementsByClassName('checkboxMostrarOcultar');

        // Recorrer todos los checkboxes
        for (var i = 0; i < checkboxes.length; i++) {
            // Adjuntar el evento 'change' a cada checkbox
            checkboxes[i].addEventListener('change', function () {
                // Obtener la clase asociada al checkbox
                var clase = this.getAttribute('data-clase');
                // Verificar si el checkbox está marcado
                if (this.checked) {
                    // Si está marcado, ejecutar la función mostrarOcultarEnLista con activado=true
                    mostrarOcultarEnLista(clase, true);
                } else {
                    // Si no está marcado, ejecutar la función mostrarOcultarEnLista con activado=false
                    mostrarOcultarEnLista(clase, false);
                }
            });
        }

});

</script>
