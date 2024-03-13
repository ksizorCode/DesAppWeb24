<?php require_once '_functions.php'; ?>
<?php include '_header.php'; ?>


<ul class="galeria">
<?php

 $id= $_GET['id'];


 $sql = "SELECT * FROM eventos WHERE id=$id;";
$datos= consulta($sql, true);

foreach($datos as $dato){
        echo '<li class="evento">';
        echo '<h3>' . $dato['titulo'] . '</h3>';
        echo '<p>Fecha: ' . date('d/m/Y', strtotime($dato['fechainicio'])) . '</p>';
        echo "<p>latitud: ".$dato['lat']."</p>";
        echo "<p>longitud: ".$dato['lon']."</p>";
        echo "<p>texto: ".$dato['descripcion']."</p>";
        echo "<p>imagen: ".$dato['foto']."</p>";
        echo "<p>inicio: ".$dato['fechainicio']."</p>";
        echo "<p>fin: ".$dato['fechafin']."</p>";
        echo '</li>';
}
?>
</ul>