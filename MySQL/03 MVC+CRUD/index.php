<?php $titulo="Página de Inicio de Science Company";?>
<?php require '_functions.php'; ?>

<h1><?echo $titulo;?></h1>
<p>Lorem ipsum dolor....</p>


<?
$sql = "SELECT * FROM alumnos";
$datos=['foto'=>'img','nombre'=>'txt','apellidos'=>'txt'];
conectar($sql,$datos,1);
?>


<?php cargar('footer'); ?>