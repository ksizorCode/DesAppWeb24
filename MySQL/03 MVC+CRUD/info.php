<?php $titulo="Página de Inicio de Science Company";?>
<?php require '_functions.php'; ?>

<?
$id = $_GET['id'];

$sql = 'SELECT * FROM alumnos WHERE id='.$id;
$datos=['foto'=>'img','nombre'=>'txt','apellidos'=>'txt'];
conectar($sql,$datos,0,'info');
?>

<?php cargar('footer'); ?>