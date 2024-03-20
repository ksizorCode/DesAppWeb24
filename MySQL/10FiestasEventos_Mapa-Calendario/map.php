<?php require_once '_functions.php'; ?>
<?php include '_header.php'; ?>

<?php
$sql = "SELECT * FROM eventos;";
$datos= consulta($sql, true);

echo '<pre><code>';
print_r($datos);
echo '</code></pre>';

?>

<a href="index.php">Inicio</a>
