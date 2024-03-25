<?php
include_once '_functions.php';
$titulo='Lista de datos';
include '_header.php';?>

<?php
// Consulta para obtener los datos de los restaurantes y sus categorías
$sql = "SELECT r.nombre AS nombre_restaurante,r.id, r.foto, r.direccion, r.telefono, r.web, r.email, r.descripcion, r.extracto, r.slug, 
GROUP_CONCAT(c.nombre) AS categorias,
GROUP_CONCAT(c.icono) AS iconos
FROM restaurantes AS r
LEFT JOIN restaurantes_categorias AS rc ON r.id = rc.restaurante_id
LEFT JOIN categorias AS c ON rc.categoria_id = c.id
GROUP BY r.id";

$datos = consulta($sql, 1);
debug($sql,'sql');
debug($datos,'array');

// Comprobar si hay datos

    // Mostrar los datos en una tabla
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Foto</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Web</th>
        <th>Email</th>
        <th>Descripción</th>
        <th>Extracto</th>
        <th>Categorías</th>
    </tr>";

    // Recorrer los datoss y mostrar cada fila
    foreach($datos as $fila){
        echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['nombre_restaurante']}</td>
                <td><img src=\"".RUTA."assets/img/{$fila['foto']}\"></td>
                <td>{$fila['direccion']}</td>
                <td>{$fila['telefono']}</td>
                <td>{$fila['web']}</td>
                <td>{$fila['email']}</td>
                <td>{$fila['descripcion']}</td>
                <td>{$fila['extracto']}</td>
                <td>";
        
        // Mostrar las categorías con sus iconos
        if (!empty($fila['categorias'])) { //si el array de categorías no está vacío
            $categorias = explode(',', $fila['categorias']); //separa cada elemento en un array llamado categorias
            
            $lista_categorias = '';
            foreach($categorias as $categoria){
                $lista_categorias .= $categoria.', ';
            }
            echo rtrim($lista_categorias, ', ');



        } else {
            // Mostrar un mensaje si no hay categorías
            echo "Sin categorías";
        }
        
        echo "</td></tr>";
    }

    echo "</table>";



// Liberar el datos
//mysqli_free_result($datos);
?>

<?php include '_footer.php';?>
